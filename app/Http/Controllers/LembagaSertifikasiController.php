<?php

namespace App\Http\Controllers;

use App\Models\LembagaSertifikasi;
use Illuminate\Http\Request;

class LembagaSertifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lembaga_sertifikasi = LembagaSertifikasi::all();
        return view('admin.lembaga_sertifikasi.index', [
            'nama' => 'Data Tipe Kategori',
            'lembaga_sertifikasi' => $lembaga_sertifikasi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lembaga_sertifikasi = LembagaSertifikasi::get();
        return view ('admin.lembaga_sertifikasi.create', ['lembaga_sertifikasi'=> $lembaga_sertifikasi]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' =>  'required|unique:lembaga_sertifikasi',
        ],[
            'nama.required' => "Nama tidak boleh kosong",
            'nama.unique' => "Nama sudah ada"
        ]);
         // end validate
         $data = [
            'nama' => $request->nama,
         ];

        //jika validasi berhasil maka data akan disimpan ke database
        LembagaSertifikasi::create($data);
        return redirect()->back()->with(['success'=>'tipe kategori berhasil dirubah']);
    }

    /**
     * Display the specified resource.
     */
    public function show(LembagaSertifikasi $lembaga_sertifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LembagaSertifikasi $lembaga_sertifikasi)
    {
        return response()->json($lembaga_sertifikasi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LembagaSertifikasi $lembaga_sertifikasi)
    {
        $request->validate([
            'nama' =>  'required|unique:lembaga_sertifikasi',
        ],[
            'nama.required' => "Nama tidak boleh kosong",
            'nama.unique' => "Nama sudah ada"
        ]);
         // end validate

        $lembaga_sertifikasi->update($request->all());

        return redirect()->back() -> with('success','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LembagaSertifikasi $lembaga_sertifikasi)
    {
        $lembaga_sertifikasi->delete();

        return redirect()->back()->with('success','Data Telah dihapus!');
    }
}
