<?php

namespace App\Http\Controllers\Peserta;

use App\Models\RegistrasiDokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrasiDokumenController extends Controller
{
    // public function index(){
    //     $registrasi_dokumen = RegistrasiDokumen::get();
    //     return view('peserta.pendaftaran.index',[
    //         'registrasi_dokumen' => $registrasi_dokumen,
    //     ]);
    // }

    public function store(Request $request){
        $request->validate([
            'url_document' => 'required',
        ]);

        RegistrasiDokumen::create([
            'url_document' => $request->url_document,
        ]);

        return redirect()->route('peserta.index')->with('success','Registrasi Dokumen berhasil');
    }
}
