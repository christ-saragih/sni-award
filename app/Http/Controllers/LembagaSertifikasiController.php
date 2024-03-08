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
        $LembagaSertifikasi = LembagaSertifikasi::all();
        return view('admin.lembagasertifikasi.index', [
            'nama' => 'Data Tipe Kategori',
            'lembaga_sertifikasi' => $LembagaSertifikasi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $LembagaSertifikasi = LembagaSertifikasi::get();
        return view ('admin.lembagasertifikasi.create', ['lembaga_sertifikasi'=> $LembagaSertifikasi]);
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
        return redirect()->route('lembaga_sertifikasi.index')->with(['success'=>'tipe kategori berhasil dirubah']); 
    }

    /**
     * Display the specified resource.
     */
    public function show(LembagaSertifikasi $LembagaSertifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $LembagaSertifikasi = LembagaSertifikasi::find($id);
        return view('admin.lembagasertifikasi.edit',['LembagaSertifikasi' => $LembagaSertifikasi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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

        $LembagaSertifikasi=LembagaSertifikasi::find($id);
        $LembagaSertifikasi->update($request->all());

        return redirect()->route('lembaga_sertifikasi.index') -> with('success','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $LembagaSertifikasi = LembagaSertifikasi::find($id);
        $LembagaSertifikasi->delete();
        return redirect()->route('lembaga_sertifikasi.index')->with('success','Data Telah dihapus!');
    }
}
