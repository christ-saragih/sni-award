<?php

namespace App\Http\Controllers;

use App\Models\KategoriOrganisasi;
use App\Models\LembagaSertifikasi;
use App\Models\PesertaKontak;
use App\Models\PesertaProfil;
use App\Models\StatusKepemilikan;
use Illuminate\Http\Request;

class PesertaProfilController extends Controller
{
    public function index() 
    {
        $kategori_organisasi = KategoriOrganisasi::all();
        $lembaga_sertifikasi = LembagaSertifikasi::all();
        $status_kepemilikan = StatusKepemilikan::all();
        return view('peserta.profil.index',compact(
            ['kategori_organisasi', 'lembaga_sertifikasi', 'status_kepemilikan'])); 
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peserta.kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
           'jabatan_tertinggi' => 'required|string',
           'no_hp' => 'required|string',
           'website' => 'required|string',
           'tanggal_beroperasi' => 'required|string',
           'jenis_produk' => 'required|enum',
           'deskripsi_produk' => 'required|string',
           'produk_export' => 'required|boolean',
           'negara_tujuan_ekspor' => 'required|string',
           'kekayaan_bersih' => 'required|string',
           'hasil_penjualan_tahunan' => 'required|string',
           'jenis_organisasi' => 'required|enum',
           'kewenangan_kebijakan' => 'required|string',
       ],[
            'jabatan_tertinggi.required' => 'Jabatan Tertinggi Wajib diisi',
            'no_hp.required' => 'Nomor Telepon Wajib diisi',
            'website.required' => 'Website Wajib diisi',
            'tanggal_beroperasi.required' => 'Tanggal Beroperasi Wajib diisi',
            'jenis_produk.required' => 'Jenis Produk Wajib diisi',
            'deskripsi_produk.required' => 'Deskripsi Produk Wajib diisi',
            'produk_export.required' => 'Produk Export Wajib diisi',
            'negara_tujuan_ekspor.required' => 'Negara Tujuan Ekspor Wajib diisi',
            'kekayaan_bersih.required' => 'Kekayaan Bersih Wajib diisi',
            'hasil_penjualan_tahunan.required' => 'Hasil Penjualan Tahunan Wajib diisi',
            'jenis_organisasi.required' => 'Jenis Organisasi Wajib diisi',
            'kewenangan_kebijakan.required' => 'Kewenangan Kebijakan Wajib diisi',
       ]);
       $id = PesertaProfil::get()[0]->id;
       $PesertaProfil = PesertaProfil::find($id);  
       $PesertaKontak = new PesertaKontak();  
       $PesertaKontak->jabatan_tertinggi = $request->input('jabatan_tertinggi');  
       $PesertaKontak->no_hp = $request->input('no_hp');  
       $PesertaKontak->save();  
      // dd($PesertaProfil,$PesertaKontak);
       return redirect()->route("peserta.profil.show",$id)->with("success","Data Profil berhasil disimpan"); 
    }

    /**
     * Display the specified resource.
     */
    public function show(PesertaProfil $PesertaProfil)
    {
        return view('peserta.profil.show', compact('PesertaProfil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesertaProfil $PesertaProfil)
    {
        return view('peserta.profil.edit', compact('PesertaProfil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PesertaProfil $pesertaprofil)
    {
        //;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PesertaProfil $PesertaProfil)
    {
        //
    }
}