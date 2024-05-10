<?php

namespace App\Http\Controllers\Sekretariat\Tim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SekretariatTimController extends Controller
{
    public function index() {
        return view('sekretariat.tim.index');
    }

    public function tambah() {
        return view('sekretariat.tim.tambah');
    }
}
