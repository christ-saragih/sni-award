<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\Registrasi;
use App\Models\RegistrasiDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranPesertaController extends Controller
{
    public function index() {
        $registrasi = Registrasi::where('peserta_id', Auth::guard('peserta')->user()->id)->first();
        $registrasi_dokumen = RegistrasiDokumen::where('registrasi_id', $registrasi->id)->get();
        return view('peserta.pendaftaran.index', ['registrasi_dokumen' => $registrasi_dokumen]);
    }

    public function detail() {
        return view('peserta.pendaftaran.detail');
    }
}
