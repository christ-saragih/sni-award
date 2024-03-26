<?php

namespace App\Http\Controllers;

use App\Models\KategoriOrganisasi;
use App\Models\LembagaSertifikasi;
use App\Models\Peserta;
use App\Models\PesertaProfil;
use App\Models\StatusKepemilikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaProfilController extends Controller
{
    public function index() 
    {
        $peserta = Peserta::find(Auth::guard('peserta')->user()->id);
        // dd($peserta->peserta_profil);
        $kategori_organisasi = KategoriOrganisasi::all();
        $lembaga_sertifikasi = LembagaSertifikasi::all();
        $status_kepemilikan = StatusKepemilikan::all();
        $pesertaprofil = PesertaProfil::where('peserta_id', Auth::guard('peserta')->user()->id)->first();
        // dd($pesertaprofil);
        return view('peserta.profil.index',compact([
            'peserta', 
            'kategori_organisasi', 
            'lembaga_sertifikasi', 
            'status_kepemilikan','pesertaprofil'
        ])); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $peserta = Peserta::find(Auth::guard('peserta')->user()->id);
        $kategori_organisasi = KategoriOrganisasi::all();
        $lembaga_sertifikasi = LembagaSertifikasi::all();
        $status_kepemilikan = StatusKepemilikan::all();
        return view('peserta.profil.edit', compact([
        'peserta', 
        'kategori_organisasi', 
        'lembaga_sertifikasi', 
        'status_kepemilikan']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan_tertinggi' => 'required|string',
            // 'no_hp' => 'required|string',
            'website' => 'required|string',
            'tanggal_beroperasi' => 'required|string',
            // 'status_kepemilikan' => 'required',
            'jenis_produk' => 'required|',
            'deskripsi_produk' => 'required|string',
            'produk_export' => 'required|string',
            'negara_tujuan_ekspor' => 'required|string',
            'kekayaan_bersih' => 'required|string',
            'hasil_penjualan_tahunan' => 'required|string',
            'jenis_organisasi' => 'required|string',
            'kewenangan_kebijakan' => 'required|string',
        ],[
            'nama.required'=>'Nama tidak boleh kosong',
            'jabatan_tertinggi.required' => 'Jabatan Tertinggi Wajib diisi',
            // 'no_hp.required' => 'Nomor Telepon Wajib diisi',
            'website.required' => 'Website Wajib diisi',
            'tanggal_beroperasi.required' => 'Tanggal Beroperasi Wajib diisi',
            // 'status_kepemilikan.required' => 'Status Kepemilikan Wajib diisi',
            'jenis_produk.required' => 'Jenis Produk Wajib diisi',
            'deskripsi_produk.required' => 'Deskripsi Produk Wajib diisi',
            'produk_export.required' => 'Produk Export Wajib diisi',
            'negara_tujuan_ekspor.required' => 'Negara Tujuan Ekspor Wajib diisi',
            'kekayaan_bersih.required' => 'Kekayaan Bersih Wajib diisi',
            'hasil_penjualan_tahunan.required' => 'Hasil Penjualan Tahunan Wajib diisi',
            'jenis_organisasi.required' => 'Jenis Organisasi Wajib diisi',
            'kewenangan_kebijakan.required' => 'Kewenangan Kebijakan Wajib diisi',
        ]);

        // $pesertaprofil->nama = $request->input('nama');
        // $pesertaprofil->jabatan_tertinggi = $request->input('jabatan_tertinggi');
        // $pesertaprofil->no_hp = $request->input('no_hp');
        // $pesertaprofil->website = $request->input('website');
        // $pesertaprofil->tanggal_beroperasi = $request->input('tanggal_beroperasi');
        // $pesertaprofil->jenis_produk = $request->input('jenis_produk');
        // $pesertaprofil->deskripsi_produk = $request->input('deskripsi_produk');
        // $pesertaprofil->produk_export = $request->input('produk_export');
        // $pesertaprofil->negara_tujuan_ekspor = $request->input('negara_tujuan_ekspor');
        // $pesertaprofil->kekayaan_bersih = $request->input('kekayaan_bersih');
        // $pesertaprofil->hasil_penjualan_tahunan = $request->input('hasil_penjualan_tahunan');
        // $pesertaprofil->jenis_organisasi = $request->input('jenis_organisasi');
        // $pesertaprofil->kewenangan_kebijakan = $request->input('kewenangan_kebijakan');
        // $pesertaprofil->save();
        $dataprofil = [
            'jabatan_tertinggi' => $request->jabatan_tertinggi,
            // 'no_hp' => $request->no_hp,
            'website' => $request->website,
            // 'tanggal_beroperasi' =>$request->tanggal_beroperasi,
            'tanggal_beroperasi' => date("Y-m-d", strtotime($request->tanggal_beroperasi)),
            // 'status_kepemilikan'=> $request->status_kepemilikan_id, 
            'jenis_produk' => $request->jenis_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'produk_export' => $request ->produk_export,
            'negara_tujuan_ekspor' => $request ->negara_tujuan_ekspor,
            'kekayaan_bersih' => $request ->kekayaan_bersih,
            'hasil_penjualan_tahunan' => $request ->hasil_penjualan_tahunan,
            'jenis_organisasi' => $request ->jenis_organisasi,
            'kewenangan_kebijakan' => $request ->kewenangan_kebijakan,
        ];
        $data = [
            'nama' => $request->nama,
        ];
        // dd(['nama' => $request->nama]);
        $peserta = Peserta::find(Auth::guard('peserta')->user()->id);
        $pesertaprofil = PesertaProfil::where('peserta_id', $peserta->id)->first();
        $peserta->update($data);
        $pesertaprofil->update($dataprofil);
        
        return redirect('/peserta/profil')->with("success","Data Profil berhasil diupdate"); 
        // return redirect()->route("peserta.profil.index", $pesertaprofil->id)->with("success","Data Profil berhasil diupdate"); 
    }
    
    public function dokumenpeserta(Request $request)
    {
        // Validasi request
        $request->validate([
            'legalitas_hukum_organisasi' => 'required|file|mimes:pdf|max:10000',
            'sppt_sni' => 'required|file|mimes:pdf|max:10000',
            'sk_kemenkeuham' => 'required|file|mimes:pdf|max:10000',
            'kebijakan' => 'required|file|mimes:pdf|max:10000',
        ]);

        // Simpan file-file yang diunggah
        $legalitasHukumPath = $request->file('legalitas_hukum_organisasi')->store('dokumen_peserta', 'public');
        $spptSniPath = $request->file('sppt_sni')->store('dokumen_peserta', 'public');
        $suratKeteranganPath = $request->file('sk_kemenkeuham')->store('dokumen_peserta', 'public');
        $kebijakanPath = $request->file('kebijakan')->store('dokumen_peserta', 'public');

        // Proses penyimpanan telah berhasil
        // Anda dapat menambahkan log atau tindakan lain yang diperlukan di sini

        return response()->json([
            'message' => 'Dokumen berhasil diunggah dan disimpan.',
            'legalitas_hukum_organisasi_path' => $legalitasHukumPath,
            'sppt_sni_path' => $spptSniPath,
            'sk_kemenkeuham_path' => $suratKeteranganPath,
            'kebijakan_path' => $kebijakanPath,
        ], 200);
    }
    // protected function save ($pesertaprofil, $request)
}