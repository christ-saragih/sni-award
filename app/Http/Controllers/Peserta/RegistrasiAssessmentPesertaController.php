<?php

namespace App\Http\Controllers\Peserta;

use App\Models\RegistrasiAssessmentPeserta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrasiAssessmentPesertaController extends Controller
{
    public function index(){
        $registrasi_assessment_peserta = RegistrasiAssessmentPeserta::get();
        return view('peserta.pendaftaran.index',[
            'registrasi_assessment_peserta' => $registrasi_assessment_peserta,
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required|max:50',
        ]);
        AssessmentKategori::create([
            'nama' => $request->nama,
        ]);

        return redirect('/admin/assessment')->with('success','Kategori berhasil ditambahkan');
    }
}