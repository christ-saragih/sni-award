<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Illuminate\Http\Request;

class DataPesertaController extends Controller
{
    public function index() {
        $peserta =  Peserta::get();
        return view('admin.peserta.index', ['peserta' => $peserta]);
    }

    public function detail ($id) {
        $peserta = Peserta::find($id);
        // dd($peserta->peserta_profil);
        return view('admin.peserta.detailPeserta', [ 'peserta' => $peserta ]);
    }

    public function editView($id) {
        $peserta = Peserta::find($id);
        return view('admin.peserta.editPeserta', ['peserta' => $peserta]);
    }
}
