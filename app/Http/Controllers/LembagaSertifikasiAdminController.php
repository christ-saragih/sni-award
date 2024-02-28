<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LembagaSertifikasiAdminController extends Controller
{
    public function index() {
        return view('admin.lembaga_sertifikasi.index');
    }
}
