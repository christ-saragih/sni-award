<?php

namespace App\Http\Controllers\User\LeadEvaluator\Evaluator;

use App\Http\Controllers\Controller;
use App\Models\AssessmentKategori;
use App\Models\Dokumen;
use App\Models\Konfigurasi;
use App\Models\Peserta;
use App\Models\Registrasi;
use App\Models\RegistrasiDokumen;
use App\Models\RegistrasiEvaluator;
use App\Models\RegistrasiPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LeadEvaluatorEvaluatorController extends Controller
{
    public function index(Request $request) {
        $tahun_registrasi = Registrasi::distinct()->pluck('tahun');
        $all_registrasi_id = Registrasi::distinct()->pluck('id');

        if ($request->tahun) $all_registrasi_id = Registrasi::where('tahun', $request->tahun)->distinct()->pluck('id');

        $desk_evaluation = RegistrasiEvaluator::where('evaluator_id', Auth::user()->id)
            ->where('stage', 3)
            ->whereIn('registrasi_id', $all_registrasi_id)
            ->get();
        $site_evaluation = RegistrasiEvaluator::where('evaluator_id', Auth::user()->id)
            ->where('stage', 4)
            ->whereIn('registrasi_id', $all_registrasi_id)
            ->get();

        $penilaian_evaluator = [];
        foreach ($desk_evaluation as $penilaian) {
            foreach ($penilaian->registrasi->registrasi_penilaian as $status) {
                if($status->internal_id == $penilaian->evaluator_id) {
                    $penilaian_evaluator[] = [
                        'jabatan' => $status->jabatan,
                    ];
                }
            }
        }

        return view('lead_evaluator.evaluator.index', [
            'desk_evaluation' => $desk_evaluation,
            'site_evaluation' => $site_evaluation,
            'tahun_registrasi' => $tahun_registrasi,
            'penilaian_evaluator' => $penilaian_evaluator,
        ]);
    }

    public function detailProfil(Request $request, $registrasi_id) {
        $registrasi_id = Crypt::decryptString($registrasi_id);
        $registrasi = Registrasi::find($registrasi_id);

        $registrasi_dokumen = $registrasi->registrasi_dokumen;
        $peserta = Peserta::find($registrasi->peserta_id);
        $dokumen = Dokumen::get();

        $konfigurasi_desk_evaluation = Konfigurasi::where('key', 'desk evaluation')->first();

        $desk_evaluation = RegistrasiEvaluator::where('registrasi_id', $registrasi->id)->where(['stage' => 3])->first();
        $penilaian_evaluator = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->evaluator_id])->first();
        $penilaian_lead_evaluator = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->lead_evaluator_id])->first();
        $penilaian_sekretariat = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->registrasi->sekretariat_id])->first();

        $site_evaluation = RegistrasiEvaluator::where('registrasi_id', $registrasi->id)->where(['stage' => 4])->get();

        $assessment_kategori = AssessmentKategori::get();
        $selected_assessment_kategori = AssessmentKategori::where('nama', 'Kepemimpinan')->get();
        if ($request->assessment_kategori) {
            $selected_assessment_kategori = AssessmentKategori::where('nama', $request->assessment_kategori)->get();
        }

        return view('lead_evaluator.evaluator.profil', [
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
            'konfigurasi_desk_evaluation' => $konfigurasi_desk_evaluation,
        ]);
    }

    public function penilaian(Request $request, $registrasi_id) {
        $request->validate([
            'skor' => 'required|max:100',
            'url_dokumen_penilaian' => 'required|mimes:pdf',
            'catatan' => 'required',
        ], [
            'skor.required' => 'Skor Tidak Boleh Kosong',
            'skor.required' => 'Skor Masimal 100',
            'url_dokumen_penilaian.required' => 'Dokumen Penilaian Tidak Boleh Kosong',
            'url_dokumen_penilaian.mimes' => 'Dokumen Penilaian Harus PDF',
            'catatan.required' => 'Catatan Tidak Boleh Kosong',
        ]);

        $user = Auth::user();
        $registrasi = Registrasi::find($registrasi_id);

        $dokumen_penilaian = $request->file('url_dokumen_penilaian');
        $nama_dokumen_penilaian = 'dokumen_penilaian_' . now()->format('YmdHis') . $dokumen_penilaian->getClientOriginalName();
        $dokumen_penilaian->move(storage_path('app/public/file/dokumen_penilaian/desk_evaluation/evaluator/'), $nama_dokumen_penilaian);

        RegistrasiPenilaian::create([
            'registrasi_id' => $registrasi_id,
            'internal_id' => $user->id,
            'jabatan' => $user->jenis_role->nama,
            'url_dokumen_penilaian' => $nama_dokumen_penilaian,
            'stage_id' => $registrasi->stage_id,
            'skor' => $request->skor,
            'catatan' => $request->catatan,
            'final' => $request->skor,
        ]);

        return back()->with('success', 'Berhasil mengirim penilaian');
    }

    public function download($registrasi_id, $penilaian_id)
    {
        $registrasi_id = Crypt::decryptString($registrasi_id);
        $penilaian_id = Crypt::decryptString($penilaian_id);
        $item = RegistrasiPenilaian::find($penilaian_id);
        // dd($item);
        $filePath = storage_path('app/public/file/dokumen_penilaian/desk_evaluation/evaluator/' . $item->url_dokumen_penilaian);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }
    }
}
