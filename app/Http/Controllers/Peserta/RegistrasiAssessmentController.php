<?php

namespace App\Http\Controllers\Peserta;

use App\Models\Registrasi;
use App\Models\RegistrasiAssessment;
use App\Http\Controllers\Controller;
use App\Models\AssessmentJawaban;
use App\Models\AssessmentKategori;
use App\Models\AssessmentPertanyaan;
use App\Models\AssessmentSubKategori;
use App\Models\Dokumen;
use App\Models\Konfigurasi;
use App\Models\Peserta;
use App\Models\PesertaProfil;
use App\Models\RegistrasiDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Type\TrueType;

class RegistrasiAssessmentController extends Controller
{ 
    public function showKategori() {
        $existingRegistration = Registrasi::where('peserta_id', Auth::guard('peserta')->user()->id)->first();
        $assessment_kategori = AssessmentKategori::get();
        
        $peserta = Peserta::find(Auth::guard('peserta')->user()->id);
        
        $dokumen = Dokumen::get();
        
        $konfigurasi = Konfigurasi::where('key','Tahun SNI Award')->first();
        $registrasi = Registrasi::where('peserta_id',Auth::guard('peserta')->user()->id)->where('tahun',$konfigurasi->value)->first();
        $registrasi_dokumen = [];
        if ($registrasi) {
            $registrasi_dokumen = RegistrasiDokumen::where('registrasi_id', $registrasi->id)->get();
        }
        $test = [];
        if($registrasi){
            $test = Dokumen::leftJoin('registrasi_dokumen','dokumen.id','registrasi_dokumen.dokumen_id')->where('registrasi_id',$registrasi->id)->orWhereNull('registrasi_id')->get();
        }
        $regis_jawaban = []; 
            if ($registrasi){
                $regis_jawaban = RegistrasiAssessment::where('registrasi_id',$registrasi->id)->get();
            }
            foreach ($regis_jawaban as $jawaban) {
                $kategori_assess = $jawaban->assessment_jawaban->assessment_pertanyaan->assessment_sub_kategori->assessment_kategori;
                foreach($assessment_kategori as $kategori){
                    if($kategori->id == $kategori_assess->id){
                        $kategori->check = TRUE;
                    }
                }
            }
        
        if (!$assessment_kategori){
            return response()->json(['error' => 'Data not found'], 404);
        }
        return view('peserta.pendaftaran.index', [
            'assessment_kategori' => $assessment_kategori,
            'dokumen' => $dokumen,
            'peserta' => $peserta,
            'existingRegistration' => $existingRegistration,
            'registrasi' => $registrasi,
            'registrasi_dokumen' => $registrasi_dokumen,
            'test' =>$test
            // 'pesertaProfil' => $pesertaProfil
        ]);
    }

    public function showPertanyaan($id,$registrasi_id){
        // $assessment_sub_kategori = AssessmentSubKategori::with('assessment_pertanyaan','assessment_jawaban')->get();
        $assessment_sub_kategori = AssessmentSubKategori::where('assessment_kategori_id', $id)->get();
        // dd($assessment_sub_kategori[0]->assessment_pertanyaan);
        $registrasi = Registrasi::find($registrasi_id);
        $pertanyaan = AssessmentPertanyaan::find($id);
        $jawaban_yang_dipilih = AssessmentJawaban::find($id);
        if (!$assessment_sub_kategori){
            return response()->json(['error' => 'Data not found'], 404);
        }


        return view('peserta.pendaftaran.detail',[
            'assessment_sub_kategori' => $assessment_sub_kategori,
            'registrasi' => $registrasi,
            'pertanyaan' => $pertanyaan,
            'jawaban_yang_dipilih' => $jawaban_yang_dipilih,
        ]);
    }

    public function detail() {
        return view('peserta.pendaftaran.detail');
    }

    public function show($assessment_kategori_id, $assessment_pertanyaan_id, $assessment_jawaban_id, $dokumen) {

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

    public function checklistAssessment($assessment_jawaban_id){
        $assessment_jawaban = AssessmentJawaban::where('assessment_jawaban_id', $assessment_jawaban_id)->get();
        if ($assessment_jawaban){
            return view('peserta.pendaftaran.index');
        }
        return view('peserta.pendaftaran.index', [
            'assessment_jawaban' => $assessment_jawaban
        ]);
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'registrasi_id' => 'required|exists:registrasi,id',
            'assessment_pertanyaan_id.*' => 'required|exists:assessment_pertanyaan,id',
            // 'jawaban.*' => 'required|exists:assessment_jawaban,id',
        ]);

        // dd($request->assessment_pertanyaan_id);

        // Simpan data jawaban ke database
        foreach ($request->assessment_pertanyaan_id as $pertanyaan_id) {
            $jawaban_id = $request->input('jawaban.' . $pertanyaan_id);
            RegistrasiAssessment::create([
                'registrasi_id' => $request->registrasi_id,
                'assessment_pertanyaan_id' => $pertanyaan_id,
                'assessment_jawaban_id' => $jawaban_id,
            ]);
        }

        return redirect('/peserta/pendaftaran')->with('success', 'Berhasil');

        // Redirect or give a response as needed
    }

    public function openRegistrasi() {
        // Periksa apakah peserta sudah memiliki entri registrasi sebelumnya
        $existingRegistration = Registrasi::where('peserta_id', Auth::guard('peserta')->user()->id)->first();

        if ($existingRegistration) {
            return redirect()->back()->withErrors('Anda sudah mendaftar sebelumnya');
        }

        if (Auth::guard('peserta')->check()) {
            Registrasi::create([
                'tahun' => date('Y'),
                'peserta_id' => Auth::guard('peserta')->user()->id,
                'status_id' => 1, // aktif
                'stage_id' => 1, // dummy
                'kategori_organisasi_id' => 1, // dummy
            ]);

            return redirect()->back()->with('success', 'Pendaftaran telah dibuka');
        }

        return redirect()->back()->withErrors('Gagal melakukan pendaftaran');
    }




    // public function showSubmit($registrasi_id)
    // {
    //     $registrasi = Registrasi::find($registrasi_id);
    //     return view('peserta.pendaftaran', compact('registrasi'));
    // }
}
