<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaAcaraAdminController extends Controller
{
    public function index() {
        return view('admin.berita_acara.index');
    }
}
