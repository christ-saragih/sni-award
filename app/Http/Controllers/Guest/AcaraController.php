<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function index() {
        return view('guest.acara.index');
    }

    public function detail() {
        return view('guest.acara.detail');
    }
}
