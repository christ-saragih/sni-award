<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePesertaController extends Controller
{
    public function index() {
        return view('peserta.home.index');
    }
}
