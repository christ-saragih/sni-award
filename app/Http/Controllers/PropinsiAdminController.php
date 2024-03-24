<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Propinsi;
use Illuminate\Http\Request;

class PropinsiAdminController extends Controller
{

    public function index()
    {
        $propinsi = Propinsi::where('propinsi', 'LIKE', '%'.request('q').'%')->get();

        return response()->json($propinsi);
    }

    public function store(Request $request)
    {
        $request->validate([
            'propinsi' => 'required|unique:propinsi',
        ], [
            'propinsi.required' => 'Nama Propinsi Wajib Diisi!',
            'propinsi.unique' => 'Nama Propinsi Telah Tersedia!'
        ]);

        Propinsi::create([
            'propinsi' => $request->propinsi,
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'propinsi' => 'required|unique:propinsi',
        ], [
            'propinsi.required' => 'Nama Propinsi Wajib Diisi!',
            'propinsi.unique' => 'Nama Propinsi Telah Tersedia!'
        ]);

        $provinsi = Propinsi::find($id);
        $provinsi->update([
            'propinsi' => $request->propinsi,
        ]);

        return redirect('/admin/wilayah')->with('success', 'Provinsi berhasil diubah');
    }

    public function destroy($id)
    {
        $cek_propinsi = Kota::where('propinsi_id',$id)->count();
        if($cek_propinsi == 0){
            $provinsi = Propinsi::find($id);
            $provinsi->delete();
            return redirect('/admin/wilayah')->with('success', 'Provinsi berhasil dihapus');

        }else{
            return redirect('/admin/wilayah')->with('failed', 'Data propinsi tidak boleh dihapus');
        }
    }
}
