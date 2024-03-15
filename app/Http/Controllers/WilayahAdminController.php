<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Propinsi;
use Illuminate\Http\Request;

class WilayahAdminController extends Controller
{
    public function index() {
        $provinsi = Propinsi::get();
        $kota = Kota::get();
        $kecamatan = Kecamatan::get();
        return view('admin.wilayah.index', [
            'provinsi' => $provinsi,
            'kota' => $kota,
            'kecamatan' => $kecamatan
        ]);
    }

    public function get_kabupaten(Request $request)
    {
        $propinsi_id = $request->propinsi_id;
        $kota = Kota::where('propinsi_id', $propinsi_id)->get();
   
        foreach($kota as $data) {
            echo "<option value='$data->id'>$data->kota</option>";
        }

        return redirect('/admin/wilayah');
    }
}
