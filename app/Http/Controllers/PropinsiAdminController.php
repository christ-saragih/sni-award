<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Propinsi;
use Illuminate\Http\Request;

class PropinsiAdminController extends Controller
{
    public function store(Request $request)
    {

        Propinsi::create([
            'propinsi' => $request->propinsi,
        ]);

        return redirect('/admin/wilayah');
    }

    public function update(Request $request, $id) 
    {
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
