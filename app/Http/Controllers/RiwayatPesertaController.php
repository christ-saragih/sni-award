<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatPesertaController extends Controller
{
    public function index() {
        return view('peserta.riwayat.index');
    }
}
