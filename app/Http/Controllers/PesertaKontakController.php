<?php

namespace App\Http\Controllers;

use App\Models\PesertaKontak;
use Illuminate\Http\Request;

class PesertaKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Peserta.kontak.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
            'nama_penghubung' => ['required'],
            'nomor_telepon' => ['nullable', 'string'],
            'jabatan' => ['required'],
        ], [
            'nama_penghubung.required' =>  "Nama penghubung harus diisi",
            'jabatan.required' =>  "Jabatan harus diisi",
        ]);
        
        PesertaKontak::create($request);

        // return redirect()->back()-with('sukses','Data Berhasil Di Tambahkan');
        return redirect('/peserta/profil')->with('sukses','Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PesertaKontak $pesertaKontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesertaKontak $pesertaKontak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PesertaKontak $pesertaKontak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PesertaKontak $pesertaKontak)
    {
        //
    }
}
