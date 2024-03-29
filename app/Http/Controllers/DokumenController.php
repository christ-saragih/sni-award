<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumen = Dokumen::get();
        // dd($dokumen[0]->nama);
        return view('admin.dokumen.index',['dokumen' => $dokumen]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dokumen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'status' => 'required',
        ], [
            'nama.required' => 'Nama Dokumen Wajib Diisi!'
        ]);

        Dokumen::create([
            'nama' => $request->nama,
            'status' => $request->status,
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokumen $dokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumen $dokumen)
    {
        return response()->json($dokumen);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokumen $dokumen)
    {
        $request->validate([
            'nama' => 'required',
            'status' => 'required'
        ]);

        $dokumen->update([
            'nama' => $request->nama,
            'status' => $request->status,
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen Berhasi Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumen $dokumen)
    {
        $dokumen->delete();

        return redirect()->route('dokumen.index')->with('success', 'Dokument Berhasil Dihapus');
    }
}
