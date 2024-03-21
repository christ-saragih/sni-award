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
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
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
    public function edit(Konfigurasi $konfigurasi)
    {
        return response()->json($konfigurasi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konfigurasi $konfigurasi)
    {
        $request->validate([
            'key' => 'required|unique:konfigurasi',
            'value' => 'required',
        ],[

            'key.required' => "Key tidak boleh kosong",
            'key.unique' => "Key sudah ada",
            'value.required' => "Value tidak boleh kosong"
        ]);
        $konfigurasi->update($request->all());

        return redirect()->back()->with(['success'=>'konfigurasi berhasil dirubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konfigurasi $konfigurasi)
    {
        $konfigurasi->delete();

        return redirect()->back();
    }
}
