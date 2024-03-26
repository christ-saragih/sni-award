<?php

namespace App\Http\Controllers\Peserta;

use App\Models\RegistrasiDokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrasiDokumenController extends Controller
{
   
    public function store(Request $request){
        $request->validate([
            'url_dokumen' => 'required',
        ]);

        $file_dokumen = $request->file('url_dokumen');
        // dd($file_dokumen->getClientOriginalExtension());
        $dokumen_ekstensi = $file_dokumen->extension();
        $nama_file = date('ymdhis') . '.' . $dokumen_ekstensi;
        $file_dokumen->move(public_path('gambar/gambar_berita'), $nama_file);

        RegistrasiDokumen::create([
            'registrasi_id' => auth()->user()->id,
            'url_dokumen' => $nama_file,
            'feedback' => 'assdasda'
        ]);

        return redirect()->back()->with('success','Registrasi Dokumen berhasil');
    }
}
