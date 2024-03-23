<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendaftaranPesertaController extends Controller
{
    public function index() {
        return view('peserta.pendaftaran.index');
    }

    public function detail() {
        return view('peserta.pendaftaran.detail');
    }
}
