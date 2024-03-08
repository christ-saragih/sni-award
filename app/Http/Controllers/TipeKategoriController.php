<?php

namespace App\Http\Controllers;

use App\Models\tipekategori;
use Illuminate\Http\Request;

class TipeKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipe_kategori = tipekategori::all();
        return view('admin.tipekategori.index', [
            'nama' => 'Data Tipe Kategori',
            'tipe_kategori' => $tipe_kategori,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $tipe_kategori = tipekategori::get();
        return view ('admin.tipekategori.create', ['tipe_kategori'=> $tipe_kategori]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' =>  'required|unique:tipe_kategori',
        ],[
            'nama.required' => "Nama tidak boleh kosong",
            'nama.unique' => "Nama sudah ada"
        ]);
         // end validate
         $data = [
            'nama' => $request->nama,
         ];

        //jika validasi berhasil maka data akan disimpan ke database
        tipekategori::create($data);
        return redirect()->route('tipe_kategori.index')->with(['success'=>'tipe kategori berhasil dirubah']); 
    }

    /**
     * Display the specified resource.
     */
    public function show(tipekategori $tipe_kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tipe_kategori = tipekategori::find($id);
        return view('admin.tipekategori.edit',['tipe_kategori' => $tipe_kategori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=>['required']
        ]) ;

        $tipe_kategori=tipekategori::find($id);
        $tipe_kategori->update($request->all());

        return redirect()->route('tipe_kategori.index') -> with('success','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipe_kategori = tipekategori::find($id);
        $tipe_kategori->delete();
        return redirect()->route('tipe_kategori.index')->with('success','Data Telah dihapus!');
    }
}