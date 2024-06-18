<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konfigurasi;
use App\Models\Peserta;
use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DataPesertaController extends Controller
{
    public function index() {
        $peserta =  Peserta::get();
        return view('admin.peserta.index', ['peserta' => $peserta]);
    }

    public function detail ($id) {
        $id = Crypt::decryptString($id);
        $peserta = Peserta::find($id);
        // dd($peserta->peserta_kontak);
        return view('admin.peserta.detailPeserta', [ 'peserta' => $peserta ]);
    }

    public function verifikasiPeserta($id) {
        $id = Crypt::decryptString($id);
        $peserta = Peserta::find( $id );
        $tahun_sni = Konfigurasi::where('key', 'Tahun SNI Award')->distinct()->pluck('value')->first();
        if ( $peserta ) {
            $registrasi = Registrasi::where('peserta_id', $peserta->id)
                ->where('tahun', $tahun_sni)->first();
            $peserta->update([
                'verified_at' => date('Y-m-d H:i:s'),
                'verified_by' => Auth::user()->id,
            ]);
            $registrasi->update([
                'stage_id' => 3,
            ]);
            return back()->with('success', 'Peserta Berhasil diverifikasi');
        }
        return back()->withErrors('Peserta Gagal diverifikasi');
    }

    // public function editView($id) {
    //     $peserta = Peserta::find($id);
    //     return view('admin.peserta.editPeserta', ['peserta' => $peserta]);
    // }
}
