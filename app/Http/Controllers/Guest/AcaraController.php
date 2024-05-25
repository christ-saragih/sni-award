<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\DokumentasiAcara;
use App\Models\Frontpage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AcaraController extends Controller
{
    public function index() {
        $acara = Acara::all();
        $frontpage_data = Frontpage::get()[0];

        // dd($acara);
        return view('guest.acara.index', compact(['acara', 'frontpage_data']));
    }

    public function detail($slug) {
        $frontpage_data = Frontpage::get()[0];
        $acara = Acara::where('slug', $slug)->firstOrFail();
        $dokumentasi_acara = DokumentasiAcara::where('acara_id', $acara->id)->get();
        // dd($dokumentasi_acara[0]->gambar_konten);
        return view('guest.acara.detail', compact(['frontpage_data', 'acara', 'dokumentasi_acara']));
    }
}
