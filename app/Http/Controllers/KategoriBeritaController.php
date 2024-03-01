<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $kategori_berita = KategoriBerita::all();
        return view('admin.kategori_berita.index',compact(['kategori_berita']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori_berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' =>'required|max:11|unique:kategori_berita',
        ], [
            'nama.required' => 'Nama Kategori Wajib Diisi!',
            'nama.max' => 'Nama Kategori Maksimal 11 karakter!',
            'nama.unique' => 'Nama Kategori Telah Tersedia!',
        ]);

        KategoriBerita::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('kategori_berita.index')->with('success','Kategori Berita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriBerita $kategoriBerita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriBerita $kategori_berita)
    {
        return view('admin.kategori_berita.edit', compact('kategori_berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriBerita $kategori_berita)
    {
        $request->validate([
            'nama' =>'required|max:11|unique:kategori_berita',
        ], [
            'nama.required' => 'Nama Kategori Wajib Diisi!',
            'nama.max' => 'Nama Kategori Maksimal 11 karakter!',
            'nama.unique' => 'Nama Kategori Telah Tersedia!',
        ]);

        $kategori_berita->update($request->all());

        return redirect()->route('kategori_berita.index')->with('success', 'Kategori Berita Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriBerita $kategori_berita)
    {
        $kategori_berita->delete();

        return redirect()->route('kategori_berita.index')->with('success', 'Kategori Berita Berhasil Dihapus');
    }
}
