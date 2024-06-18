<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePesertaController extends Controller
{
    public function index() {
        // dd('lxknvcb');
        return view('peserta.home.index');
    }
}
