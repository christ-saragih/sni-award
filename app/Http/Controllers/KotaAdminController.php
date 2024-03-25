<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KotaAdminController extends Controller
{
    public function getKota($id) {
        $kota = Kota::where('propinsi_id', $id)->where('kota', 'LIKE', '%'.request('q').'%')->get();

        return response()->json($kota);
    }

    public function edit(Kota $kota)
    {
        return response()->json($kota);
    }

    public function store(Request $request)
    {
        $request->validate([
            'propinsi_id' => 'required',
            'kota' => 'required',
        ], [
            'propinsi_id.required' => 'Nama Propinsi Wajib Diisi!',
            'kota.required' => 'Nama Kota Wajib Diisi!',
        ]);

        $ketersediaanKota = Kota::where('propinsi_id', $request->propinsi_id)->where('kota', $request->kota)->exists();

        if ($ketersediaanKota) {
            return redirect()->back()->withErrors(['kota' => 'Kota dengan Propinsi yang sama sudah ada'])->withInput();
        }

        Kota::create([
            'kota' => $request->kota,
            'propinsi_id' => $request->propinsi_id,
        ]);

        return redirect()->back()->with('success', 'Kabupaten berhasil dibuat!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'propinsi_id' => 'required',
            'kota' => 'required',
        ], [
            'propinsi_id.required' => 'Nama Propinsi Wajib Diisi!',
            'kota.required' => 'Nama Kota Wajib Diisi!',
        ]);

        $ketersediaanKota = Kota::where('propinsi_id', $request->propinsi_id)->where('kota', $request->kota)->exists();

        if ($ketersediaanKota) {
            return redirect()->back()->withErrors(['kota' => 'kota dengan propinsi yang sama sudah ada'])->withInput();
        }

        $kota = Kota::find($id);
        $kota->update([
            'kota' => $request->kota,
            'propinsi_id' => $request->propinsi_id,
        ]);

        return redirect()->back()->with('success', 'Kabupaten berhasil diubah');
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

