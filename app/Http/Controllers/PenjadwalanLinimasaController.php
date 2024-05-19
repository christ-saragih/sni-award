<?php

namespace App\Http\Controllers;

use App\Models\PenjadwalanLinimasa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenjadwalanLinimasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // dd([
        //     'judul' => $request->judul,
        //     'gambar' => $request->gambar,
        //     'lokasi_map' => $request->lokasi_map,
        // ]);
        $request->validate([
            'judul' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lokasi_map' => 'required',
        ], [
            'judul.required' => 'Nama Dokumen Wajib Diisi!',
            'gambar.image' => 'Gambar harus berupa file gambar!',
            'gambar.mimes' => 'Gambar harus berupa file dengan tipe: jpeg, png, jpg, gif, atau svg!',
            'gambar.max' => 'Gambar tidak boleh lebih dari 2MB!',
            'lokasi_map.required' => 'Lokasi Wajib Diisi!',
        ]);

        $gambar = $request->file('gambar');
        $dokumen_ekstensi = $gambar->extension();
        $nama_file = date('ymdhis') . '.' . $dokumen_ekstensi;
        $gambar->move(storage_path('app/public/images/frontpage/linimasa_penjadwalan/'), $nama_file);

        PenjadwalanLinimasa::create([
            'judul' => $request->judul,
            'gambar' => $nama_file,
            'lokasi_map' => $request->lokasi_map,
        ]);
        return redirect()->back()->with('success', 'Dokumen Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenjadwalanLinimasa $penjadwalanLinimasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenjadwalanLinimasa $penjadwalanLinimasa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenjadwalanLinimasa $penjadwalan_linimasa)
    {
        // dd([
        //     'judul' => $request->judul,
        //     'gambar' => $request->gambar,
        //     'lokasi_map' => $request->lokasi_map,
        // ]);
        $request->validate([
            'judul' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional but must be an image if present
            'lokasi_map' => 'required',
        ], [
            'judul.required' => 'Nama Dokumen Wajib Diisi!',
            'gambar.image' => 'Gambar harus berupa file gambar!',
            'gambar.mimes' => 'Gambar harus berupa file dengan tipe: jpeg, png, jpg, gif, atau svg!',
            'gambar.max' => 'Gambar tidak boleh lebih dari 2MB!',
            'lokasi_map.required' => 'Lokasi Wajib Diisi!',
        ]);

        $nama_file = $penjadwalan_linimasa->gambar;
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($penjadwalan_linimasa->gambar) {
                $oldImagePath = storage_path('app/public/images/frontpage/linimasa_penjadwalan/' . $penjadwalan_linimasa->gambar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload new image
            $gambar = $request->file('gambar');
            $dokumen_ekstensi = $gambar->extension();
            $nama_file = date('ymdhis') . '.' . $dokumen_ekstensi;
            $gambar->move(storage_path('app/public/images/frontpage/linimasa_penjadwalan/'), $nama_file);
        }

        $penjadwalan_linimasa->update([
            'judul' => $request->judul,
            'gambar' => $nama_file,
            'lokasi_map' => $request->lokasi_map,
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenjadwalanLinimasa $penjadwalanLinimasa)
    {
        //
    }
}
