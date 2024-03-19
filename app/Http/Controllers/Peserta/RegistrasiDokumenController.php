<?php

namespace App\Http\Controllers\Peserta;

use App\Models\RegistrasiDokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrasiDokumenController extends Controller
{
    public function index(){
        $registrasi_dokumen = RegistrasiDokumen::get();
        return view('peserta.pendaftaran.index',[
            'registrasi_dokumen' => $registrasi_dokumen,
        ]);
    }
}
