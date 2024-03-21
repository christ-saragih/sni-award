<?php

namespace App\Http\Controllers\Peserta;

use App\Models\RegistrasiAssessment;
use App\Http\Controllers\Controller;
use App\Models\AssessmentKategori;
use Illuminate\Http\Request;

class RegistrasiAssessmentController extends Controller
{
    // public function index(){
    //     $registrasi_assessment = RegistrasiAssessment::get();
    //     return view('peserta.pendaftaran.index',[
    //         'registrasi_assessment' => $registrasi_assessment,
    //     ]);
    // }

    public function getAssessmentKategori() {
        $assessment_kategori = AssessmentKategori::where('nama','LIKE', '%'.request('q').'%')->paginate(10);
        return response()->json($assessment_kategori);
    }
    //
    public function index()
    {
        $assessment_kategori = AssessmentKategori::get();
        // dd($assessment_sub_kategori);
        return view('peserta.pendaftaran.index',[
            'assessment_kategori' => $assessment_kategori,
            'list_assessment_kategori' => $assessment_kategori,
        ]);
    }
//     public function store(Request $request){
//         $request->validate([
//             'nama' => 'required|max:50',
//         ]);
//         AssessmentKategori::create([
//             'nama' => $request->nama,
//         ]);

//         return redirect('/admin/assessment')->with('success','Kategori berhasil ditambahkan');
//     }
}