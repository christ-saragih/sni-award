<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KotaAdminController extends Controller
{

    public function store(Request $request)
    {
        Kota::create([
            'kota' => $request->kota,
            'propinsi_id' => $request->propinsi_id,
        ]);

        return redirect('/admin/wilayah');
    }

    public function update(Request $request, $id)
    {
        $kota = Kota::find($id);
        $kota->update([
            'kota' => $request->kota,
            'propinsi_id' => $request->propinsi_id,
        ]);

        return redirect('/admin/wilayah')->with('success', 'Kabupaten berhasil diubah');
    }

    public function destroy($id)
    {
        $cek_kota = Kecamatan::where('kota_id', $id)->count();
        if($cek_kota == 0) {
            $kota = Kota::find($id);
            $kota->delete();
            return redirect('/admin/wilayah')->with('success', 'Kabupaten berhasil dihapus');
        } else {
            return redirect('/admin/wilayah')->with('failed', 'Data kabupaten tidak boleh dihapus');
        }
    }

}

