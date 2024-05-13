<?php

namespace App\Http\Controllers;

use App\Models\PesertaKontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesertaKontak = PesertaKontak::all();

        return view('peserta.kontak.index', compact('pesertaKontak'));
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
    // public function tambahKontakPenghubung(Request $request)
    // {
    //     // dd(['nama_penghubung' => $request->nama_penghubung,
    //     // 'nomor_telepon' => $request->nomor_telepon,
    //     // 'jabatan' => $request->jabatan,]);
    //     $request ->validate([
    //         'nama_penghubung' => 'required',
    //         'nomor_telepon' => 'string',
    //         'jabatan' => 'required',
    //     ], [
    //         'nama_penghubung.required' =>  "Nama penghubung harus diisi",
    //         'jabatan.required' =>  "Jabatan harus diisi",
    //     ]);
        
    //     PesertaKontak::tambahKontakPenghubung([
    //         'nama_penghubung' => $request->nama_penghubung,
    //         'nomor_telepon' => $request->nomor_telepon,
    //         'jabatan' => $request->jabatan,
    //     ]);
    //     return redirect('/peserta/profil')->with('sukses','Data Berhasil Di Tambahkan');
    // }

    /**
     * Display the specified resource.
     */
    public function show(PesertaKontak $pesertaKontak)
    {
        return view('peserta.kontak.show', compact('pesertaKontak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesertaKontak $pesertaKontak)
    {
        return view('peserta.kontak.edit', compact('pesertaKontak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PesertaKontak $pesertaKontak)
    {
        $pesertaKontak->update($request->all());

    return redirect('/peserta/profil')->with('success', 'Peserta kontak berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
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
    
    // dd(['nama' => $request->nama,
    // 'no_hp' => $request->no_hp,
    // 'jabatan' => $request->jabatan,]);

    // $peserta = Peserta::find(Auth::guard('peserta')->user()->id);
    // $peserta_kontak = PesertaKontak::where('peserta_id', $peserta->id)[$index];
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

    public function hapuskontak($id)
    {
        $peserta_kontak = PesertaKontak::find($id);
        $peserta_kontak->delete();

        return redirect()->back()->with('success', 'Data peserta kontak berhasil dihapus.');
    }
}
