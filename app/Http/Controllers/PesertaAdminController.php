<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesertaAdminController extends Controller
{
    public function index() {
        return view('admin.peserta.index');
    }
}
