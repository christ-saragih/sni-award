<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Http\Request;

class KecamatanAdminController extends Controller
{
    
    public function store(Request $request)
    {
        Kecamatan::create([
            'kecamatan' => $request->kecamatan,
            'kota_id' => $request->kota_id,
        ]);

        return redirect('/admin/wilayah');
    }    

    public function update(Request $request, $id)
    {
        $kecamatan = Kecamatan::find($id);
        $kecamatan->update([
            'kecamatan' => $request->kecamatan,
            'kota_id' => $request->kota_id,
        ]);

        return redirect('/admin/wilayah')->with('success', 'Kabupaten berhasil diubah');
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::find($id);
        $kecamatan->delete();
        return redirect('/admin/wilayah')->with('success', 'Kecamatan berhasil dihapus');
    }
}
