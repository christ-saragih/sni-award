<?php

namespace App\Http\Controllers;

use App\Models\PesertaKontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaKontakController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
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
        return redirect('/peserta/profil?tab=kontak')->with('sukses','Data Berhasil Di Tambahkan');
    }   

    /**
     * Update the specified resource in storage.
     */
     public function ubahKontakPenghubung(Request $request, $id)
     {
         $peserta_kontak = PesertaKontak::find($id);
 
         if ($peserta_kontak) {
             $peserta_kontak->update([
                 'nama' =>  $request->nama,
                 'no_hp' => $request->no_hp,
                 'jabatan' => $request->jabatan,
             ]);
 
             return redirect('/peserta/profil?tab=kontak')->with('sukses','Data Berhasil Di Tambahkan');
         } else {
             return redirect('/peserta/profil?tab=kontak')->with('error','Data Tidak Ditemukan');
         }
     }

    /**
     * Remove the specified resource from storage.
     */
    public function hapuskontak($id)
    {
        $peserta_kontak = PesertaKontak::find($id);
        $is_peserta_kontak_greater_than_one = count(PesertaKontak::where('peserta_id', Auth::guard('peserta')->user()->id)->get()) > 1;
        if ($is_peserta_kontak_greater_than_one) {
            $peserta_kontak->delete();
            return redirect()->back()->with('success', 'Data peserta kontak berhasil dihapus.');
        }
        return redirect()->back()->withErrors('Data peserta kontak tidak bisa dihapus.');
    }
}
