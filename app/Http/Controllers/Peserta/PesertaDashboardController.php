<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaDashboardController extends Controller
{
    // protected function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }
    public function index() {
        // dd(Auth::guard('peserta')->user()->nama);
        return view('Peserta.home.index');
    }
}