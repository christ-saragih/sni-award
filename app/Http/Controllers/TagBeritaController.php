<?php

namespace App\Http\Controllers;

use App\Models\TagBerita;
use Illuminate\Http\Request;

class TagBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tag_berita = TagBerita::all();
        return view('admin.tag_berita.index', compact(['tag_berita']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag_berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:20|unique:tag_berita',
        ], [
            'nama.required' => 'Nama Kategori Wajib Diisi!',
            'nama.max' => 'Nama Kategori Maksimal 11 karakter!',
            'nama.unique' => 'Nama Kategori Telah Tersedia!',
        ]);

        TagBerita::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('tag_berita.index')->with('success', 'Tag Berita Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TagBerita $tag_berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TagBerita $tag_berita)
    {
        return view('admin.tag_berita.edit', compact(['tag_berita']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TagBerita $tag_berita)
    {
        $request->validate([
            'nama' => 'required|max:20|unique:tag_berita'
        ]);

        $tag_berita->update($request->all());

        return redirect()->route('tag_berita.index')->with('success', 'Tag Berita Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TagBerita $tag_berita)
    {
        $tag_berita->delete();

        return redirect()->route('tag_berita.index')->with('success', 'Tag Berita Berhasil Dihapus!');
    }
}
