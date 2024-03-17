<?php

namespace App\Http\Controllers;

use app\Models\PesertaProfil;
use Illuminate\Http\Request;

class PesertaProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('Peserta.profil.index');
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
            'no_hp' => 'required',
        ].[    
            'no_hp.required'=> "Nomor Hp harus diisi",
        ]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
