<?php

namespace App\Http\Controllers\Peserta;

use App\Models\RegistrasiDokumen;
use App\Http\Controllers\Controller;
use App\Models\PesertaProfil;
use Illuminate\Http\Request;

class RegistrasiDokumenController extends Controller
{
   
    public function store(Request $request){
        $request->validate([
            'url_dokumen.*' => 'required|file|mimes:pdf',
        ]);

        // $file_dokumen = $request->file('url_dokumen');
        // // dd($file_dokumen->getClientOriginalExtension());
        // $dokumen_ekstensi = $file_dokumen->extension();
        // $nama_file = date('ymdhis') . '.' . $dokumen_ekstensi;
        // $file_dokumen->move(public_path('gambar/gambar_berita'), $nama_file);

        $file_dokumen = $request->file('url_dokumen');
        
        foreach ($request->file('url_dokumen') as $dokumen) {
            $nama_file_dokumen = 'dokumen_' . now()->format('YmdHis') . '.' . $dokumen->getClientOriginalName();
            $dokumen->move(public_path('file/dokumen'), $nama_file_dokumen);
            RegistrasiDokumen::create([
                'registrasi_id' => auth()->user()->id,
                'url_dokumen' => $nama_file_dokumen,
                'feedback' => 'assdasda'
            ]);
        }

        return redirect()->back()->with('success','Registrasi Dokumen berhasil');
    }

    // public function getDokumenPeserta()
    // {
    //     $pesertaProfil = PesertaProfil::select('url_legalitas_hukum_organisasi', 'url_sppt_sni', 'url_sk_kemenkumham', 'url_kewenangan_kebijakan')->get();
    //     return response()->json($pesertaProfil);
    // }
}
