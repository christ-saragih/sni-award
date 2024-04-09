<?php

namespace App\Http\Controllers\NotFound;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotFoundController extends Controller
{
    public function guest() {
        return view('guest.404.404');
    }
    public function admin() {
        return view('admin.404.404');
    }
    public function peserta() {
        return view('peserta.404.404');
    }
}
