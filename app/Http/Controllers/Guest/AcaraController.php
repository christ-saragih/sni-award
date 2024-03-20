<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\DokumentasiAcara;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AcaraController extends Controller
{
    public function index() {
        $acara = Acara::all();

        // dd($acara);
        return view('guest.acara.index', compact(['acara']));
    }

    public function detail(Acara $acara) {
        $dokumentasi_acara = DokumentasiAcara::where('acara_id', $acara->id)->get();
        // dd($dokumentasi_acara[0]->gambar_konten);
        return view('guest.acara.detail', compact(['acara', 'dokumentasi_acara']));
    }
}
