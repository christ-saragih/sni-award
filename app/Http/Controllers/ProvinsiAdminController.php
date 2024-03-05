<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiAdminController extends Controller
{
    // public function index() {
    //     $provinsi = Provinsi::get();
    //     $kota = Kota::get();
        
    //     return view('admin.wilayah.index', [
    //         'provinsi' => $provinsi,
    //         'list_provinsi' => $provinsi,
    //         'kota' => $kota,
    //     ]);
    // }

    // public function create() 
    // {
    //     return view('admin.wilayah.create');
    // }

    public function store(Request $request)
    {

        Provinsi::create([
            'propinsi' => $request->propinsi,
        ]);

        return redirect('/admin/wilayah');
    }

    // public function edit($id)
    // {
    //     $Provinsi = Provinsi::find($id);
    //     return view('admin.wilayah.edit', [
    //         'provinsi' => $Provinsi
    //     ]);
    // }

    public function update(Request $request, $id) 
    {
        $provinsi = Provinsi::find($id);
        $provinsi->update([
            'propinsi' => $request->propinsi,
        ]);

        return redirect('/admin/wilayah')->with('success', 'Provinsi berhasil diubah');
    }

    public function destroy($id)
    {
        $cek_propinsi = Kota::where('propinsi_id',$id)->count();
        if($cek_propinsi == 0){
            $provinsi = Provinsi::find($id);
            $provinsi->delete();
            return redirect('/admin/wilayah')->with('success', 'Provinsi berhasil dihapus');
            
        }else{
            return redirect('/admin/wilayah')->with('failed', 'Data propinsi tidak boleh dihapus');
        }
    }

}