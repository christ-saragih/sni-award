<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Illuminate\Http\Request;

class DataPesertaController extends Controller
{
    public function index() {
        $peserta =  Peserta::get();
        return view('Admin.peserta.index', ['peserta' => $peserta]);
    }
}
