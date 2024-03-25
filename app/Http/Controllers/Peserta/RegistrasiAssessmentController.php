<?php

namespace App\Http\Controllers\Peserta;

use App\Models\RegistrasiAssessment;
use App\Http\Controllers\Controller;
use App\Models\AssessmentJawaban;
use App\Models\AssessmentKategori;
use App\Models\AssessmentPertanyaan;
use App\Models\AssessmentSubKategori;
use Illuminate\Http\Request;

class RegistrasiAssessmentController extends Controller
{
    // public function index(){
    //     $registrasi_assessment = RegistrasiAssessment::get();
    //     return view('peserta.pendaftaran.index',[
    //         'registrasi_assessment' => $registrasi_assessment,
    //     ]);
    // }
    public function showKategori() {
        $assessment_kategori = AssessmentKategori::get();
        if (!$assessment_kategori){
            return response()->json(['error' => 'Data not found'], 404);
        }
        return view('peserta.pendaftaran.index', [
            'assessment_kategori' => $assessment_kategori,
        ]);
    }

    public function showPertanyaan($id){
        // $assessment_sub_kategori = AssessmentSubKategori::with('assessment_pertanyaan','assessment_jawaban')->get();
        $assessment_sub_kategori = AssessmentSubKategori::where('assessment_kategori_id', $id)->get();
        // dd($assessment_sub_kategori[0]->assessment_pertanyaan);
        if (!$assessment_sub_kategori){
            return response()->json(['error' => 'Data not found'], 404);
        }
        return view('peserta.pendaftaran.detail',[
            'assessment_sub_kategori' => $assessment_sub_kategori,
        ]);
    }

    public function detail() {
        return view('peserta.pendaftaran.detail');
    }

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
        $request->validate([
            'assessment_jawaban_id' => 'required|exists:assessment_jawaban,id'
        ]);

        // Mendapatkan ID jawaban dari request
        $assessment_jawaban = $request->input('assessment_jawaban_id');

        // Mencari jawaban berdasarkan ID
        $assessment_jawaban = AssessmentJawaban::find($assessment_jawaban);

        // Jika jawaban tidak ditemukan
        if (!$assessment_jawaban) {
            return response()->json(['error' => 'Jawaban belum diisi'], 404);
        }

        // Lakukan operasi penyimpanan jawaban, misalnya menyimpan ke dalam database

        // Mengembalikan respons berhasil
        return response()->json(['message' => 'Jawaban berhasil disimpan'], 200);
    }
}