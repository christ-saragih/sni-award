<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index() {
        return view('guest.berita.index');
    }

    public function detail() {
        return view('guest.berita.detail');
    }
}
