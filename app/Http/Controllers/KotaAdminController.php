<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KotaAdminController extends Controller
{
    // public function index() 
    // {
    //     $provinsi = Provinsi::all();
    //     $kota = Kota::all();

    //     // return view('admin.wilayah.kota.index');
    //     return response()->view('admin.wilayah.index', compact('provinsi', 'kota'));
    // }

    // public function create()
    // {
    //     return view('admin.wilayah.index');   
    // }

    public function store(Request $request)
    {
        Kota::create([
            'kota' => $request->nama,
            'propinsi_id' => $request->propinsi_id,
        ]);

        return redirect('/admin/wilayah');
    }

    public function update(Request $request, $id)
    {
        $kota = Kota::find($id);
        $kota->update([
            'kota' => $request->nama,
            'propinsi_id' => $request->propinsi_id,
        ]);

        return redirect('/admin/wilayah')->with('success', 'Kabupaten berhasil diubah');
    }

    public function destroy($id)
    {
        $kota = Kota::find($id);
        $kota->delete();
        return redirect('/admin/wilayah')->with('success', 'Kabupaten berhasil dihapus');
    }

}

