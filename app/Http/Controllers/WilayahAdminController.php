<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class WilayahAdminController extends Controller
{
    public function index() {
        $provinsi = Provinsi::get();
        $kota = Kota::get();
        return view('admin.wilayah.index', [
            'provinsi' => $provinsi,
            'kota' => $kota
        ]);
    }
}
