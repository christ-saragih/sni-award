<?php

namespace App\Http\Controllers\User\Evaluator\Sekretariat;

use App\Http\Controllers\Controller;
use App\Models\AssessmentKategori;
use App\Models\Dokumen;
use App\Models\Peserta;
use App\Models\Registrasi;
use App\Models\RegistrasiEvaluator;
use App\Models\RegistrasiPenilaian;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class EvaluatorSekretariatController extends Controller
{
    public function index(Request $request) {
        $stage = Stage::where('id',  3)
            ->orWhere('id', 4)
            ->get();
        $tahun_registrasi = Registrasi::distinct()->pluck('tahun');
        
        $registrasi = Registrasi::where('sekretariat_id', Auth::user()->id);
        if ($request->stage) {
            $registrasi = $registrasi->where('stage_id', $request->stage);
        }
        if ($request->tahun) {
            $registrasi = $registrasi->where('tahun', $request->tahun);
        }
        $registrasi = $registrasi->get();

        return view('evaluator.sekretariat.index', [
            'stage' => $stage,
            'tahun_registrasi' => $tahun_registrasi,
            'registrasi' => $registrasi,
        ]);
    }

    public function detail(Request $request, $registrasi_id) {
        $registrasi_id = Crypt::decryptString($registrasi_id);
        $registrasi = Registrasi::find($registrasi_id);
        $registrasi_penilaian = $registrasi->registrasi_penilaian;

        $desk_evaluation = RegistrasiEvaluator::where('registrasi_id', $registrasi->id)->where(['stage' => 3])->first();
        $penilaian_evaluator = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->evaluator_id])->first();
        $penilaian_lead_evaluator = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->lead_evaluator_id])->first();
        $penilaian_sekretariat = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->registrasi->sekretariat_id])->first();
        // dd($penilaian_sekretariat);

        $registrasi_dokumen = $registrasi->registrasi_dokumen;
        $peserta = Peserta::find($registrasi->peserta_id);
        $dokumen = Dokumen::get();

        $assessment_kategori = AssessmentKategori::get();

        $selected_assessment_kategori = AssessmentKategori::where('nama', 'Kepemimpinan')->get();
        if ($request->assessment_kategori) {
            $selected_assessment_kategori = AssessmentKategori::where('nama', $request->assessment_kategori)->get();
            // dd($assessment_kategori);
        }
        return view('evaluator.sekretariat.profil', [
            'peserta' => $peserta,
            'registrasi' => $registrasi,
            'registrasi_dokumen' => $registrasi_dokumen,
            'dokumen' => $dokumen,
            'assessment_kategori' => $assessment_kategori,
            'selected_assessment_kategori' => $selected_assessment_kategori,
            'registrasi_penilaian' => $registrasi_penilaian,
            'desk_evaluation' => $desk_evaluation,
            'penilaian_evaluator' => $penilaian_evaluator,
            'penilaian_lead_evaluator' => $penilaian_lead_evaluator,
            'penilaian_sekretariat' => $penilaian_sekretariat
        ]);
    }
}
