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
        $peserta_id = Auth::guard('peserta' )->user()->peserta_id ;
        $peserta = Peserta::find($peserta_id);
        $kategori_organisasi = KategoriOrganisasi::all();
        $lembaga_sertifikasi = LembagaSertifikasi::all();
        $status_kepemilikan = StatusKepemilikan::all();
        $pesertaprofil = PesertaProfil::where('peserta_id', Auth::guard('peserta')->user()->id)->first();
        // dd($pesertaprofil);
        return view('peserta.profil.index',compact(
            ['peserta', 'kategori_organisasi', 'lembaga_sertifikasi', 'status_kepemilikan','pesertaprofil'])); 
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peserta.profil.create');
    }

    /**
    * Store a newly created resource in storage.
    */
    public function updateProfil(Request $request)
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

        $pesertaprofil = new PesertaProfil();
        $pesertaprofil->jabatan_tertinggi = $request->input('jabatan_tertinggi');
        $pesertaprofil->no_hp = $request->input('no_hp');
        $pesertaprofil->website = $request->input('website');
        $pesertaprofil->tanggal_beroperasi = $request->input('tanggal_beroperasi');
        $pesertaprofil->jenis_produk = $request->input('jenis_produk');
        $pesertaprofil->deskripsi_produk = $request->input('deskripsi_produk');
        $pesertaprofil->produk_export = $request->input('produk_export');
        $pesertaprofil->negara_tujuan_ekspor = $request->input('negara_tujuan_ekspor');
        $pesertaprofil->kekayaan_bersih = $request->input('kekayaan_bersih');
        $pesertaprofil->hasil_penjualan_tahunan = $request->input('hasil_penjualan_tahunan');
        $pesertaprofil->jenis_organisasi = $request->input('jenis_organisasi');
        $pesertaprofil->kewenangan_kebijakan = $request->input('kewenangan_kebijakan');
        $pesertaprofil->save();

        return redirect()->route("peserta.profil.index", $pesertaprofil->id)->with("success","Data Profil berhasil disimpan"); 
    }

    /**
     * Display the specified resource.
     */
    public function show(PesertaProfil $PesertaProfil)
    {
        return view('peserta.profil.show', compact('PesertaProfil'));
    }

    public function editView() {
        $userId = Auth::guard('web')->user()->id;
        $user = User::find($userId);
        return view('admin.profil.edit', ['user' => $user]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesertaProfil $pesertaprofil)
    {
        return view('peserta.profil.edit', compact('pesertaprofil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PesertaProfil $pesertaprofil)
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

        $pesertaprofil->jabatan_tertinggi = $request->input('jabatan_tertinggi');
        $pesertaprofil->no_hp = $request->input('no_hp');
        $pesertaprofil->website = $request->input('website');
        $pesertaprofil->tanggal_beroperasi = $request->input('tanggal_beroperasi');
        $pesertaprofil->jenis_produk = $request->input('jenis_produk');
        $pesertaprofil->deskripsi_produk = $request->input('deskripsi_produk');
        $pesertaprofil->produk_export = $request->input('produk_export');
        $pesertaprofil->negara_tujuan_ekspor = $request->input('negara_tujuan_ekspor');
        $pesertaprofil->kekayaan_bersih = $request->input('kekayaan_bersih');
        $pesertaprofil->hasil_penjualan_tahunan = $request->input('hasil_penjualan_tahunan');
        $pesertaprofil->jenis_organisasi = $request->input('jenis_organisasi');
        $pesertaprofil->kewenangan_kebijakan = $request->input('kewenangan_kebijakan');
        $pesertaprofil->save();

        return redirect()->route("peserta.profil.index", $pesertaprofil->id)->with("success","Data Profil berhasil diupdate"); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PesertaProfil $pesertaprofil)
    {
        $pesertaprofil->delete();

        return redirect()->route("peserta.profil.index")->with("success","Data Profil berhasil dihapus"); 
    }

    // protected function save ($pesertaprofil, $request)
}