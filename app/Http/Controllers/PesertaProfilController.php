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
        $kategori_organisasi = KategoriOrganisasi::all();
        $lembaga_sertifikasi = LembagaSertifikasi::all();
        $status_kepemilikan = StatusKepemilikan::all();
        $pesertaprofil = PesertaProfil::where('peserta_id', Auth::guard('peserta')->user()->id)->first();
        $peserta_kontak = $peserta->peserta_kontak;
        
        return view('peserta.profil.index',compact([
            'peserta', 
            'kategori_organisasi', 
            'lembaga_sertifikasi', 
            'status_kepemilikan','pesertaprofil',
            'peserta_kontak',
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
            'no_hp' => 'required|numeric',
            'website' => 'required|string',
            'tanggal_beroperasi' => 'required|string',
            'status_kepemilikan_id' => 'required',
            'jenis_produk' => 'required|',
            'deskripsi_produk' => 'required|string',
            'lembaga_sertifikasi_id' => 'required',
            'produk_export' => 'required|string',
            'negara_tujuan_ekspor' => 'required|string',
            'sektor_kategori_organisasi_id' => 'required',
            'kekayaan_bersih' => 'required|string',
            'hasil_penjualan_tahunan' => 'required|string',
            'jenis_organisasi' => 'required|string',
            'kewenangan_kebijakan' => 'required|string',
        ],[
            'nama.required'=>'Nama tidak boleh kosong',
            'jabatan_tertinggi.required' => 'Jabatan Tertinggi Wajib diisi',
            'no_hp.required' => 'Nomor Telepon Wajib diisi',
            'no_hp.numeric' => 'Nomor Telepon Wajib angka',
            'website.required' => 'Website Wajib diisi',
            'tanggal_beroperasi.required' => 'Tanggal Beroperasi Wajib diisi',
            'status_kepemilikan_id.required' => 'Status Kepemilikan Wajib dipilih',
            'jenis_produk.required' => 'Jenis Produk Wajib diisi',
            'deskripsi_produk.required' => 'Deskripsi Produk Wajib diisi',
            'lembaga_sertifikasi_id.required' =>  'Lembaga Sertifikasi Wajib dipilih',
            'produk_export.required' => 'Produk Export Wajib diisi',
            'negara_tujuan_ekspor.required' => 'Negara Tujuan Ekspor Wajib diisi',
            'sektor_kategori_organisasi_id' =>  'Kategori Organisasi Wajib dipilih',
            'kekayaan_bersih.required' => 'Kekayaan Bersih Wajib diisi',
            'hasil_penjualan_tahunan.required' => 'Hasil Penjualan Tahunan Wajib diisi',
            'jenis_organisasi.required' => 'Jenis Organisasi Wajib diisi',
            'kewenangan_kebijakan.required' => 'Kewenangan Kebijakan Wajib diisi',
        ]);

        $dataprofil = [
            'jabatan_tertinggi' => $request->jabatan_tertinggi,
            'no_hp' => $request->no_hp,
            'website' => $request->website,            
            'tanggal_beroperasi' => date("Y-m-d", strtotime($request->tanggal_beroperasi)),
            'status_kepemilikan_id'=> $request->status_kepemilikan_id,     
            'jenis_produk' => $request->jenis_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'lembaga_sertifikasi_id' => $request->lembaga_sertifikasi_id, 
            'produk_export' => $request ->produk_export,
            'negara_tujuan_ekspor' => $request ->negara_tujuan_ekspor,
            'sektor_kategori_organisasi_id' =>  $request->sektor_kategori_organisasi_id,  
            'kekayaan_bersih' => $request ->kekayaan_bersih,
            'hasil_penjualan_tahunan' => $request ->hasil_penjualan_tahunan,
            'jenis_organisasi' => $request ->jenis_organisasi,
            'kewenangan_kebijakan' => $request ->kewenangan_kebijakan,
        ];
        $data = [
            'nama' => $request->nama,
        ];

        $peserta = Peserta::find(Auth::guard('peserta')->user()->id);
        $pesertaprofil = PesertaProfil::where('peserta_id', $peserta->id)->first();
        $peserta->update($data);
        $pesertaprofil->update($dataprofil);
        
        return redirect('/peserta/profil')->with("success","Data Profil berhasil diupdate"); 
    }
}