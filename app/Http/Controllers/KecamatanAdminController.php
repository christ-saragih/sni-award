<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Http\Request;

class KecamatanAdminController extends Controller
{
    public function edit(Kecamatan $kecamatan)
    {
        // Memuat propinsi terkait dengan kecamatan
        $propinsiId = $kecamatan->kota->propinsi->id;

        // Menambahkan propinsi_id ke dalam data kecamatan sebelum dikirimkan sebagai respons JSON
        $kecamatan->propinsi_id = $propinsiId;

        // Mengirimkan data kecamatan beserta propinsi_id dalam respons JSON
        return response()->json($kecamatan);
    }


    public function store(Request $request)
    {
        $request->validate([
            'kota_id' => 'required',
            'kecamatan' => 'required',
        ], [
            'kota_id.required' => 'Nama Kota Wajib Diisi!',
            'kecamatan.required' => 'Nama kecamatan Wajib Diisi!',
        ]);

        $ketersediaanKecamatan = Kecamatan::where('kota_id', $request->kota_id)->where('kecamatan', $request->kecamatan)->exists();

        if ($ketersediaanKecamatan) {
            return redirect()->back()->withErrors(['kecamatan' => 'Kecamatan dengan Kota yang sama sudah ada'])->withInput();
        }

        Kecamatan::create([
            'kecamatan' => $request->kecamatan,
            'kota_id' => $request->kota_id,
        ]);

        return redirect('/admin/wilayah');
    }

    public function update(Request $request, $id)
    {
        $kecamatan = Kecamatan::find($id);

        $request->validate([
            'kota_id' => 'required',
            'kecamatan' => 'required',
        ], [
            'kota_id.required' => 'Nama Kota Wajib Diisi!',
            'kecamatan.required' => 'Nama kecamatan Wajib Diisi!',
        ]);

        $ketersediaanKecamatan = Kecamatan::where('kota_id', $request->kota_id)->where('kecamatan', $request->kecamatan)->exists();

        if ($ketersediaanKecamatan) {
            return redirect()->back()->withErrors(['kecamatan' => 'Kecamatan dengan Kota yang sama sudah ada'])->withInput();
        }

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
