<?php

namespace App\Http\Controllers\Peserta;

use App\Models\RegistrasiAssessment;
use App\Http\Controllers\Controller;
use App\Models\AssessmentJawaban;
use App\Models\AssessmentKategori;
use App\Models\AssessmentPertanyaan;
use Illuminate\Http\Request;

class RegistrasiAssessmentController extends Controller
{
    // public function index(){
    //     $registrasi_assessment = RegistrasiAssessment::get();
    //     return view('peserta.pendaftaran.index',[
    //         'registrasi_assessment' => $registrasi_assessment,
    //     ]);
    // }

    public function show($assessment_kategori_id, $assessment_pertanyaan_id, $assessment_jawaban_id) {
        $assessment_kategori = AssessmentKategori::find($assessment_kategori_id);
        $assessment_pertanyaan = AssessmentPertanyaan::find($assessment_pertanyaan_id);
        $assessment_jawaban = AssessmentJawaban::find($assessment_jawaban_id);
        if (!$assessment_kategori || !$assessment_pertanyaan || !$assessment_jawaban){
            return response()->json(['error' => 'Data not found'], 404);
        }
        return response()->json([
            'assessment_kategori' => $assessment_kategori,
            'assessment_pertanyaan' => $assessment_pertanyaan,
            'assessment_jawaban' => $assessment_jawaban
        ]);
    }

    public function storeJawaban(Request $request){
        
    }


}