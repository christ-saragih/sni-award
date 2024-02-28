<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilPesertaController extends Controller
{
    public function index() {
        return view('peserta.profil.index');
    }
}
