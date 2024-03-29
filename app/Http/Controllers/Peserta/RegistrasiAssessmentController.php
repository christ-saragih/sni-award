<?php

namespace App\Http\Controllers\Peserta;

use App\Models\Registrasi;
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
        $registrasi = Registrasi::find($id);
        $pertanyaan = AssessmentPertanyaan::find($id);
        $jawaban_yang_dipilih = AssessmentJawaban::find($id);
        if (!$assessment_sub_kategori){
            return response()->json(['error' => 'Data not found'], 404);
        }
        return view('peserta.pendaftaran.detail',[
            'assessment_sub_kategori' => $assessment_sub_kategori,
            'registrasi' => $registrasi,
            'pertanyaan' => $pertanyaan,
            'jawaban_yang_dipilih' => $jawaban_yang_dipilih
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

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'registrasi_id' => 'required|exists:registrasi,id',
            'assessment_pertanyaan_id.*' => 'required|exists:assessment_pertanyaan,id',
            'jawaban.*' => 'required|exists:assessment_jawaban,id',
        ]);

        // Simpan data jawaban ke database
        foreach ($request->assessment_pertanyaan_id as $pertanyaan_id) {
            $jawaban_id = $request->input('jawaban.' . $pertanyaan_id);
            RegistrasiAssessment::create([
                'registrasi_id' => $request->registrasi_id,
                'assessment_pertanyaan_id' => $pertanyaan_id,
                'assessment_jawaban_id' => $jawaban_id,
            ]);
        }

        return redirect('/peserta/pendaftaran')->with('success', 'berhasil');

        // Redirect or give a response as needed
    }




    // public function showSubmit($registrasi_id)
    // {
    //     $registrasi = Registrasi::find($registrasi_id);
    //     return view('peserta.pendaftaran', compact('registrasi'));
    // }
}
