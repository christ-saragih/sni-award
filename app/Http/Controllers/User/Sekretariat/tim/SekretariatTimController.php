<?php

namespace App\Http\Controllers\User\Sekretariat\tim;

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
