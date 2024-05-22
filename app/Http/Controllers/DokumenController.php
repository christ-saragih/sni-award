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
        // dd([
        //     'nama' => $request->nama,
        //     'status' => $request->status,
        //     'file_dokumen' => $request->file_dokumen,
        // ]);
        $request->validate([
            'nama' => 'required',
            'status' => 'required',
            'file_dokumen' => 'required|file|mimes:pdf|max:5120',
        ], [
            'nama.required' => 'Nama Dokumen Wajib Diisi!',
            'Status.required' => 'Status Dokumen Wajib Dipilih!',
            'file_dokumen.required' => 'File Dokumen Wajib Diisi!',
            'file_dokumen.file' => 'File yang di upload harus berupa file!',
            'file_dokumen.mimes' => 'File harus bertipe: .pdf!',
            'file_dokumen.max' => 'File tidak boleh lebih dari 5MB!',
        ]);

        $file_dokumen = $request->file('file_dokumen');
        $dokumen_ekstensi = $file_dokumen->extension();
        $nama_file = date('ymdhis') . '.' . $dokumen_ekstensi;
        $file_dokumen->move(storage_path('app/public/images/dokumen/'), $nama_file);

        Dokumen::create([
            'nama' => $request->nama,
            'status' => $request->status,
            'file_dokumen' => $nama_file,
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
            'status' => 'required',
            'file_dokumen' => 'file|mimes:pdf|max:5120',
        ], [
            'nama.required' => 'Nama Dokumen Wajib Diisi!',
            'Status.required' => 'Status Dokumen Wajib Dipilih!',
            'file_dokumen.file' => 'File yang di upload harus berupa file!',
            'file_dokumen.mimes' => 'File harus berupa bertipe: .pdf!',
            'file_dokumen.max' => 'File tidak boleh lebih dari 5MB!',
        ]);

        $nama_file = $dokumen->file_dokumen;
        if ($request->hasFile('file_dokumen')) {
            // Delete old image if exists
            if ($dokumen->file_dokumen) {
                $oldImagePath = storage_path('app/public/images/dokumen/' . $dokumen->file_dokumen);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload new image
            $file_dokumen = $request->file('file_dokumen');
            $dokumen_ekstensi = $file_dokumen->extension();
            $nama_file = date('ymdhis') . '.' . $dokumen_ekstensi;
            $file_dokumen->move(storage_path('app/public/images/dokumen/'), $nama_file);
        }

        $dokumen->update([
            'nama' => $request->nama,
            'status' => $request->status,
            'file_dokumen' => $nama_file,
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen Berhasi Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumen $dokumen)
    {
        if ($dokumen->file_dokumen) {
            $filePath = storage_path('app/public/images/dokumen/' . $dokumen->file_dokumen);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $dokumen->delete();

        return redirect()->route('dokumen.index')->with('success', 'Dokument Berhasil Dihapus');
    }
}
