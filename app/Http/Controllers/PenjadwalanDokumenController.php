<?php

namespace App\Http\Controllers;

use App\Models\PenjadwalanDokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenjadwalanDokumenController extends Controller
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
        $request->validate([
            'nama_dokumen' => 'required',
            'file_dokumen' => 'required|file|mimes:pdf|max:5120',
        ], [
            'nama_dokumen.required' => 'Nama Dokumen Wajib Diisi!',
            'file_dokumen.file' => 'File yang di upload harus berupa file!',
            'file_dokumen.mimes' => 'File harus berupa bertipe: .pdf!',
            'file_dokumen.max' => 'File tidak boleh lebih dari 5MB!',
            'file_dokumen.required' => 'File Dokumen Wajib Diisi!'
        ]);

        $file_dokumen = $request->file('file_dokumen');
        $nama_file = $file_dokumen->hashName();
        // dd($nama_file);
        $file_dokumen->move(storage_path('app/public/frontpage/dokumen_penjadwalan/'), $nama_file);

        PenjadwalanDokumen::create([
            'nama_dokumen' => $request->nama_dokumen,
            'file_dokumen' => "/storage/frontpage/dokumen_penjadwalan/$nama_file",
        ]);

        return redirect()->back()->with('success', 'Dokumen Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenjadwalanDokumen $penjadwalanDokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenjadwalanDokumen $penjadwalan_dokumen)
    {
        return response()->json($penjadwalan_dokumen);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenjadwalanDokumen $penjadwalan_dokumen)
    {
        $request->validate([
            'file_dokumen' => 'file|mimes:pdf|max:5120',
        ], [
            'file_dokumen.file' => 'File yang di upload harus berupa file!',
            'file_dokumen.mimes' => 'File harus berupa bertipe: .pdf!',
            'file_dokumen.max' => 'File tidak boleh lebih dari 5MB!',
        ]);

        $nama_file = $penjadwalan_dokumen->file_dokumen;
        if ($request->hasFile('file_dokumen')) {
            // Delete old image if exists
            if ($penjadwalan_dokumen->file_dokumen) {
                $oldImagePath = storage_path('app/public/images/frontpage/dokumen_penjadwalan/' . $penjadwalan_dokumen->file_dokumen);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload new image
            $file_dokumen = $request->file('file_dokumen');
            $nama_file = $file_dokumen->hashName();
            // dd($nama_file);
            $file_dokumen->move(storage_path('app/public/frontpage/dokumen_penjadwalan/'), $nama_file);
        }

        $penjadwalan_dokumen->update([
            'nama_dokumen' => $request->nama_dokumen,
            'file_dokumen' => "/storage/frontpage/dokumen_penjadwalan/$nama_file",
        ]);

        return redirect()->back()->with('success', 'Dokumen Berhasi Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenjadwalanDokumen $penjadwalan_dokumen)
    {
        dd($penjadwalan_dokumen);
        $penjadwalan_dokumen->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus!');
    }
}
