<?php

namespace App\Http\Controllers;

use App\Models\KategoriOrganisasi;
use App\Models\LembagaSertifikasi;
use App\Models\Peserta;
use App\Models\PesertaKontak;
use App\Models\PesertaProfil;
use App\Models\StatusKepemilikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PesertaProfilController extends Controller
{
    public function index() 
    {
        $peserta = Peserta::find(Auth::guard('peserta')->user()->id);
        // dd($peserta->peserta_profil->lembaga_sertifikasi);
        $kategori_organisasi = KategoriOrganisasi::all();
        $lembaga_sertifikasi = LembagaSertifikasi::all();
        $status_kepemilikan = StatusKepemilikan::all();
        $pesertaprofil = PesertaProfil::where('peserta_id', Auth::guard('peserta')->user()->id)->first();
        $peserta_kontak = $peserta->peserta_kontak;
        // dd($peserta_kontak); 
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
            'no_hp' => 'required|string',
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
        // dd(['nama' => $request->nama]);
        $peserta = Peserta::find(Auth::guard('peserta')->user()->id);
        $pesertaprofil = PesertaProfil::where('peserta_id', $peserta->id)->first();
        $peserta->update($data);
        $pesertaprofil->update($dataprofil);
        
        return redirect('/peserta/profil')->with("success","Data Profil berhasil diupdate"); 
    }
    
    public function tambahDokumenPeserta(Request $request)
    {
        // Validasi request
        $request->validate([
            'url_legalitas_hukum_organisasi' => 'file|mimes:pdf|max:10000',
            'url_sppt_sni' => 'file|mimes:pdf|max:10000',
        ],[
            'url_legalitas_hukum_organisasi.mimes'  => "Ekstensi yang diperbolehkan hanya .PDF",
            'url_legalitas_hukum_organisasi.file' => "Input Harus berupa File", 
            'url_legalitas_hukum_organisasi.max' => "Ukuran file tidak boleh lebih dari 10MB", 
            'url_sppt_sni.mimes' => "Ekstensi yang diperbolehkan hanya .PDF",
            'url_sppt_sni.file' => "Input Harus berupa File", 
            'url_sppt_sni.max' => "Ukuran file tidak boleh lebih dari  10MB",
            'url_sk_kemenkumham.mimes' => "Ekstensi yang diperbolehkan hanya .PDF",
            'url_kemenkumham.file' => "Input Harus berupa File", 
            'url_sk_kemenkumham.max' => "Ukuran file tidak boleh lebih dari  10MB",
            'url_kewenangan_kebijakan.mimes' => "Format File Kewenangan Kebijakan harus dalam format PDF",
            'url_kewenangan_kebijakan.file' => "Input Harus berupa File", 
            'url_kewenangan_kebijakan.max'  => "Ukuran file tidak boleh lebih dari  10MB",
        ]);
        $id = Auth::guard('peserta')->user()->id;
        $peserta_profil = PesertaProfil::where('peserta_id', $id)->first();
        // Simpan file-file yang diunggah
        if ($request->hasFile('url_legalitas_hukum_organisasi')) {

            if (File::exists(Storage::url($peserta_profil->url_legalitas_hukum_organisasi))) {

                File::delete(Storage::url($peserta_profil->url_legalitas_hukum_organisasi)); //hapus gambar sebelumnya jika ada
            }

            $legalitasName = time().'.'.$request->url_legalitas_hukum_organisasi->extension();  
            $request->url_legalitas_hukum_organisasi->move(storage_path('app/public/dokumen/legalitas/'.$id), $legalitasName);
            $peserta_profil->update([
                'url_legalitas_hukum_organisasi' => 'dokumen/legalitas/'.$id.'/'.$legalitasName,
            ]);
            
            return back()->with('success', 'Dokumen berhasil diunggah dan disimpan.');
        } 
        
        if ($request->hasFile('url_sppt_sni')) {
            
            if (File::exists(Storage::url($peserta_profil->url_sppt_sni))) {

                File::delete(Storage::url($peserta_profil->url_sppt_sni)); //hapus gambar sebelumnya jika ada
            }

            $SpptsniName = time().'.'.$request->url_sppt_sni->extension();  
            $request->url_sppt_sni->move(storage_path('app/public/dokumen/Spptsni/'.$id), $SpptsniName);
            $peserta_profil->update([
                'url_sppt_sni' => '/dokumen/Spptsni/'.$id.'/'.$SpptsniName,
            ]);
            
            return back()->with('success', 'Dokumen berhasil diunggah dan disimpan.');
        } 
        
        if ($request->hasFile('url_sk_kemenkumham')) {
                       
            if (File::exists(Storage::url($peserta_profil->url_sk_kemenkumham))) {

                File::delete(Storage::url($peserta_profil->url_sk_kemenkumham)); //hapus gambar sebelumnya jika ada
            }

            $KemenkumhamName = time().'.'.$request->url_sk_kemenkumham->extension();  
            $request->url_sk_kemenkumham->move(storage_path('app/public/dokumen/kemenkumham/'.$id), $KemenkumhamName);
            $peserta_profil->update([
                'url_sk_kemenkumham' => '/dokumen/kemenkumham/'.$id.'/'.$KemenkumhamName,
            ]);
            
            return back()->with('success', 'Dokumen berhasil diunggah dan disimpan.');
        } 
        
        if ($request->hasFile('url_kewenangan_kebijakan')) {

            if (File::exists(Storage::url($peserta_profil->url_kewenangan_kebijakan))) {

                File::delete(Storage::url($peserta_profil->url_kewenangan_kebijakan)); //hapus gambar sebelumnya jika ada
            }

            $KewenanganKebijakan = time().'.'.$request->url_kewenangan_kebijakan->extension();  
            $request->url_kewenangan_kebijakan->move(storage_path('app/public/dokumen/kewenangan/'.$id), $KewenanganKebijakan);
            $peserta_profil->update([
                'url_kewenangan_kebijakan' => '/dokumen/kewenangan/'.$id.'/'.$KewenanganKebijakan,
            ]);
            
            return back()->with('success', 'Dokumen berhasil diunggah dan disimpan.');
        } 

        if (!$request->hasFile('url_sppt_sni')&&
            !$request->hasFile('url_legalitas_hukum_organisasi')&&
            !$request->hasFile('url_sk_kemenkumham')&&
            !$request->hasFile('url_kewenangan_kebijakan')) {
            return back()->withErrors('Gagal mengunggah dokumen. Pastikan semua dokumen diunggahhh.');  
        }
    }

    public function tambahKontakPenghubung(Request $request)
    {
        // dd(['nama_penghubung' => $request->nama_penghubung,
        // 'nomor_telepon' => $request->nomor_telepon,
        // 'jabatan' => $request->jabatan,]);
        $request ->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'jabatan' => 'required',
        ], [
            'nama.required' =>  "Nama penghubung harus diisi",
            'jabatan.required' =>  "Jabatan harus diisi",
            'no_hp.required' =>  "nomor penghubung harus diisi",
        ]);
        
        PesertaKontak::create([
            'peserta_id' => Auth::guard('peserta')->user()->id,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan,
        ]);
        return redirect('/peserta/profil')->with('sukses','Data Berhasil Di Tambahkan');
    }
}