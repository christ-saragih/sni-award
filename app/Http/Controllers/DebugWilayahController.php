<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class DebugWilayahController extends Controller
{
    public function index() {
        $provinsi = Provinsi::get();
        dd($provinsi);
    }
}
