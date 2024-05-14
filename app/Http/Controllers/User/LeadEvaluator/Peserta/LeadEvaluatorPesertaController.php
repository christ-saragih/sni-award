<?php

namespace App\Http\Controllers\User\LeadEvaluator\Peserta;

use App\Http\Controllers\Controller;
use App\Models\AssessmentKategori;
use App\Models\Dokumen;
use App\Models\Peserta;
use App\Models\Registrasi;
use App\Models\RegistrasiEvaluator;
use App\Models\RegistrasiPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LeadEvaluatorPesertaController extends Controller
{
    public function index() {
        $user = Auth::user();
        $registrasi = Registrasi::get();
        $desk_evaluation = RegistrasiEvaluator::where('lead_evaluator_id', $user->id)
            ->where('stage', '3')
            ->get();
        $site_evaluation = RegistrasiEvaluator::where('lead_evaluator_id', $user->id)
            ->where('stage', '4')
            ->get();
        return view('lead_evaluator.peserta.index', [
            'registrasi' => $registrasi,
            'desk_evaluation' => $desk_evaluation,
            'site_evaluation' => $site_evaluation,
        ]);
    }

    public function detailProfil(Request $request, $registrasi_id) {
        $registrasi_id = Crypt::decryptString($registrasi_id);
        $registrasi = Registrasi::find($registrasi_id);

        $registrasi_dokumen = $registrasi->registrasi_dokumen;
        $peserta = Peserta::find($registrasi->peserta_id);
        $dokumen = Dokumen::get();

        $desk_evaluation = RegistrasiEvaluator::where('registrasi_id', $registrasi->id)->where(['stage' => 3])->get();
        // dd($desk_evaluation[0]->registrasi->registrasi_penilaian);
        $site_evaluation = RegistrasiEvaluator::where('registrasi_id', $registrasi->id)->where(['stage' => 4])->get();

        $assessment_kategori = AssessmentKategori::get();
        $selected_assessment_kategori = AssessmentKategori::where('nama', 'Kepemimpinan')->get();
        if ($request->assessment_kategori) {
            $selected_assessment_kategori = AssessmentKategori::where('nama', $request->assessment_kategori)->get();
            // dd($assessment_kategori);
        }
        return view('lead_evaluator.peserta.profil', [
            'peserta' => $peserta,
            'registrasi' => $registrasi,
            'registrasi_dokumen' => $registrasi_dokumen,
            'dokumen' => $dokumen,
            'assessment_kategori' => $assessment_kategori,
            'selected_assessment_kategori' => $selected_assessment_kategori,
            'desk_evaluation' => $desk_evaluation,
            'site_evaluation' => $site_evaluation,
        ]);
    }

    public function penilaian(Request $request, $registrasi_id) {
        // dd([
        //     'skor' => $request->skor,
        //     'catatan' => $request->catatan,
        // ]);
        $request->validate([
            'skor' => 'required',
            'catatan' => 'required',
        ], [
            'skor.required' => 'Tidak ada skor',
            'catatan.required' => 'Tidak ada catatan',
        ]);
        // $registrasi_id = Crypt::decryptString($registrasi_id);
        // dd($registrasi_id);
        $registrasi_penilaian = RegistrasiPenilaian::find($registrasi_id);
        $registrasi_penilaian->update([
            'skor' => $request->skor,
            'catatan' => $request->catatan,
        ]);

        return back()->with('success', 'Berhasil mengirim penilaian');
    }
}