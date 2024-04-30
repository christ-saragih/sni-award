<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\BeritaTag;
use App\Models\Frontpage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index() {
        $frontpage_data = Frontpage::get()[0];
        // dd($frontpage_data);
        $berita = Berita::all();

        // get data berita terbaru
        $berita_terbaru = Berita::latest('tanggal')->first();
        $berita_terbaru_deskripsi = Str::limit($berita_terbaru->deskripsi, 200);

        $tag_berita_terbaru = BeritaTag::where('berita_id', $berita_terbaru->id)->get();
        // dd($tag_berita_terbaru[0]->tag_berita->nama);
        return view('guest.berita.index', compact(['frontpage_data', 'berita', 'berita_terbaru', 'berita_terbaru_deskripsi', 'tag_berita_terbaru']));
    }

    public function detail($slug) {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $tanggal = Carbon::parse($berita->tanggal)->locale('id')->translatedFormat('l, j F Y');
        $get_all_berita = Berita::all();
        foreach ($get_all_berita as $item) {
            $item->tanggal = Carbon::parse($item->tanggal)->locale('id')->translatedFormat('l, j F Y');
        }
        return view('guest.berita.detail', compact(['berita','tanggal','get_all_berita']));
    }
}
