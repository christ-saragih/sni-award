<?php

namespace App\Http\Controllers;

use App\Models\KategoriOrganisasi;
use App\Models\TipeKategori;
use Illuminate\Http\Request;

class KategoriOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori_organisasi = KategoriOrganisasi::all();

        return view('admin.kategori_organisasi.index', compact(['kategori_organisasi']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipe_kategori = TipeKategori::all();
        return view('admin.kategori_organisasi.create', compact('tipe_kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipe_kategori_id' => 'required',
            'nama' => 'required',
        ]);

        KategoriOrganisasi::create([
            'tipe_kategori_id' => $request->tipe_kategori_id,
            'nama' => $request->nama,
        ]);

        return redirect()->route('kategori_organisasi.index')->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriOrganisasi $kategori_organisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriOrganisasi $kategori_organisasi)
    {
        $tipe_kategori = TipeKategori::all();
        return view('admin.kategori_organisasi.edit', compact(['tipe_kategori', 'kategori_organisasi']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriOrganisasi $kategori_organisasi)
    {
        $request->validate([
            'tipe_kategori_id' => 'required',
            'nama' => 'required',
        ]);

        $kategori_organisasi->update($request->all());

        return redirect()->route('kategori_organisasi.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriOrganisasi $kategori_organisasi)
    {
        $kategori_organisasi->delete();

        return redirect()->route('kategori_organisasi.index')->with('success', 'Data Berhasil Diubah!');
    }
}
