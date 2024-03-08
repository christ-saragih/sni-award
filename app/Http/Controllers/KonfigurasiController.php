<?php

namespace App\Http\Controllers;

use App\Models\Konfigurasi;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konfigurasi  = Konfigurasi::all();
        return view('admin.konfigurasi.index', compact('konfigurasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.konfigurasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|unique:konfigurasi',
            'value' => 'required',
        ],[
            
            'key.required' => "Key tidak boleh kosong",
            'key.unique' => "Key sudah ada",
            'value.required' => "Value tidak boleh kosong"
        ]);
        // end validate
        $data = [
            'key' => $request->key,
            'value' => $request->value,
        ];
        // Konfigurasi
        Konfigurasi::create($data);
        return redirect()->route('konfigurasi.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $konfigurasi = Konfigurasi::find($id);

        // return  view('admin.konfigurasi.edit', compact('konfigurasi'));
        return view('admin.konfigurasi.edit', ['konfigurasi' => $konfigurasi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'value' => 'required'
        ],[
            'value.required'=>'Inputan value harus diisi.'
        ]);
        $konfigurasi=Konfigurasi::find($id);
        $konfigurasi->update($request->all());
        return redirect()->route('konfigurasi.index')->with(['success'=>'konfigurasi berhasil dirubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $konfigurasi = Konfigurasi::find($id);
        $konfigurasi->delete();
        return redirect()->route('konfigurasi.index');
    }
}
