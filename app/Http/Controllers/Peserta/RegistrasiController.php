<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\Registrasi;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getRegistrasi($registrasi_id){
        $registrasi = Registrasi::find($registrasi_id);
        if (!$registrasi_id){
            return response()->json(['error' => 'Data not found'], 404);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(PendaftaranPeserta $pendaftaranPeserta)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(PendaftaranPeserta $pendaftaranPeserta)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, PendaftaranPeserta $pendaftaranPeserta)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(PendaftaranPeserta $pendaftaranPeserta)
    // {
    //     //
    // }
    }
}