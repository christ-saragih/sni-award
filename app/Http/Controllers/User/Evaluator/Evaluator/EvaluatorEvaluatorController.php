<?php

namespace App\Http\Controllers\User\Evaluator\Evaluator;

use App\Http\Controllers\Controller;
use App\Models\AssessmentKategori;
use App\Models\Dokumen;
use App\Models\Peserta;
use App\Models\Registrasi;
use App\Models\RegistrasiDokumen;
use App\Models\RegistrasiEvaluator;
use App\Models\RegistrasiPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class EvaluatorEvaluatorController extends Controller
{
    public function index(Request $request) {
        $user = Auth::user();
        // dd($user->jenis_role->nama);
        $registrasi = Registrasi::get();

        $tahun_registrasi = Registrasi::distinct()->pluck('tahun');
        $all_registrasi_id = Registrasi::distinct()->pluck('id');

        if ($request->tahun) $all_registrasi_id = Registrasi::where('tahun', $request->tahun)->distinct()->pluck('id');

        $desk_evaluation = RegistrasiEvaluator::where('evaluator_id', $user->id)
            ->where('stage', 3)
            ->whereIn('registrasi_id', $all_registrasi_id)
            ->get();
        $site_evaluation = RegistrasiEvaluator::where('evaluator_id', $user->id)
            ->where('stage', 4)
            ->whereIn('registrasi_id', $all_registrasi_id)
            ->get();

        return view('evaluator.evaluator.index', [
            'tahun_registrasi' => $tahun_registrasi,
            'registrasi' => $registrasi,
            'desk_evaluation' => $desk_evaluation,
            'site_evaluation' => $site_evaluation,
        ]);
    }

    public function detailProfil(Request $request, $registrasi_id) {
        $registrasi_id = Crypt::decryptString($registrasi_id);
        $registrasi = Registrasi::find($registrasi_id);
        // dd($registrasi_id);
        $registrasi_dokumen = $registrasi->registrasi_dokumen;
        $peserta = Peserta::find($registrasi->peserta_id);
        $dokumen = Dokumen::get();

        $desk_evaluation = RegistrasiEvaluator::where('registrasi_id', $registrasi->id)->where(['stage' => 3])->first();

        // dd($desk_evaluation->registrasi->sekretariat_id);
        $penilaian_evaluator = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->internal_id])->first();
        $penilaian_lead_evaluator = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->lead_evaluator_id])->first();
        $penilaian_sekretariat = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->registrasi->sekretariat_id])->first();
        // dd($penilaian_lead_evaluator);

        $site_evaluation = RegistrasiEvaluator::where('registrasi_id', $registrasi->id)->where(['stage' => 4])->get();

        $assessment_kategori = AssessmentKategori::get();
        $selected_assessment_kategori = AssessmentKategori::where('nama', 'Kepemimpinan')->get();
        if ($request->assessment_kategori) {
            $selected_assessment_kategori = AssessmentKategori::where('nama', $request->assessment_kategori)->get();
            // dd($assessment_kategori);
        }
        return view('evaluator.evaluator.profil', [
            'peserta' => $peserta,
            'registrasi' => $registrasi,
            'registrasi_dokumen' => $registrasi_dokumen,
            'dokumen' => $dokumen,
            'assessment_kategori' => $assessment_kategori,
            'selected_assessment_kategori' => $selected_assessment_kategori,
            'desk_evaluation' => $desk_evaluation,
            'penilaian_evaluator' => $penilaian_evaluator,
            'penilaian_lead_evaluator' => $penilaian_lead_evaluator,
            'penilaian_sekretariat' => $penilaian_sekretariat,
            'site_evaluation' => $site_evaluation,
        ]);
    }

    public function sendFeedback(Request $request, $registrasi_id) {
        $request->validate([
            'feedback' => 'required',
        ], [
            'feedback.required' => 'tidak ada feedback',
        ]);
        $registrasi_id = Crypt::decryptString($registrasi_id);
        $registrasi_dokumen = RegistrasiDokumen::where('registrasi_id', $registrasi_id)->get();
        if (count($registrasi_dokumen) > 0) {
            $feedback = str_replace("\n", "<br/>", $request->feedback);
            $feedback = trim($feedback, ' ');
            foreach ($registrasi_dokumen as $key=>$rd) {
                $rd->update([
                    'feedback' => $feedback,
                ]);
            }
            return back()->with('success', 'Berhasil mengirim feedback');
        }
        return back()->withErrors('Tidak ada dokumen ditemukan');
    }

    public function penilaian(Request $request, $registrasi_id) {
        // dd([
        //     'skor' => $request->skor,
        //     'catatan' => $request->catatan,
        // ]);

        $user = Auth::user();
        $registrasi = Registrasi::find($registrasi_id);
        $request->validate([
            'skor' => 'required|max:100',
            'catatan' => 'required',
        ], [
            'skor.required' => 'Skor Tidak Boleh Kosong',
            'skor.required' => 'Skor Masimal 100',
            'catatan.required' => 'Catatan Tidak Boleh Kosong',
        ]);
        // $registrasi_id = Crypt::decryptString($registrasi_id);
        // dd($registrasi_id);
        // $registrasi_penilaian = RegistrasiPenilaian::find($registrasi_id);
        RegistrasiPenilaian::create([
            'registrasi_id' => $registrasi_id,
            'internal_id' => $user->id,
            'jabatan' => $user->jenis_role->nama,
            'url_dokumen_penilaian' => '',
            'stage_id' => $registrasi->stage_id,
            'skor' => $request->skor,
            'catatan' => $request->catatan,
            'final' => $request->skor,
        ]);

        return back()->with('success', 'Berhasil mengirim penilaian');
    }
}
