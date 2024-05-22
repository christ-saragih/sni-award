<?php

namespace App\Http\Controllers\User\LeadEvaluator\LeadEvaluator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssessmentKategori;
use App\Models\Dokumen;
use App\Models\Peserta;
use App\Models\Registrasi;
use App\Models\RegistrasiEvaluator;
use App\Models\RegistrasiPenilaian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LeadEvaluatorLeadEvaluatorController extends Controller
{
    public function index() {
        $user = Auth::user();
        $registrasi = Registrasi::get();
        $desk_evaluation = RegistrasiEvaluator::where('lead_evaluator_id', $user->id)
        ->where('stage', '3')
        ->get();
        // dd($desk_evaluation);
        $penilaian_evaluator = [];
        foreach ($desk_evaluation as $penilaian) {
            // dd($penilaian->registrasi->registrasi_penilaian);
            foreach ($penilaian->registrasi->registrasi_penilaian as $status) {
                // dd($status->jabatan == 'lead_evaluator');
                if($status->internal_id == $penilaian->lead_evaluator_id) {
                    $penilaian_evaluator[] = [
                        'jabatan' => $status->jabatan
                    ];
                }
            }
        }
        // dd($penilaian_evaluator);
        $site_evaluation = RegistrasiEvaluator::where('lead_evaluator_id', $user->id)
            ->where('stage', '4')
            ->get();
        return view('lead_evaluator.lead_evaluator.index', [
            'registrasi' => $registrasi,
            'desk_evaluation' => $desk_evaluation,
            'penilaian_evaluator' => $penilaian_evaluator,
            'site_evaluation' => $site_evaluation,
        ]);
    }

    public function detailProfil(Request $request, $registrasi_id) {
        $registrasi_id = Crypt::decryptString($registrasi_id);
        $registrasi = Registrasi::find($registrasi_id);

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
        return view('lead_evaluator.lead_evaluator.profil', [
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
            // 'jabatan' => 'lead_evaluator',
            'url_dokumen_penilaian' => '',
            'stage_id' => $registrasi->stage_id,
            'skor' => $request->skor,
            'catatan' => $request->catatan,
            'final' => $request->skor,
        ]);

        return back()->with('success', 'Berhasil mengirim penilaian');
    }
}
