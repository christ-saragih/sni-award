<?php

namespace App\Http\Controllers\Peserta;

use App\Models\RegistrasiAssessment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrasiAssessmentController extends Controller
{
    public function index(){
        $registrasi_assessment = RegistrasiAssessment::get();
        return view('peserta.pendaftaran.index',[
            'registrasi_assessment' => $registrasi_assessment,
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