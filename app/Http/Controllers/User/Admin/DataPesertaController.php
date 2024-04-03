<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataPesertaController extends Controller
{
    public function index() {
        $peserta =  Peserta::get();
        return view('admin.peserta.index', ['peserta' => $peserta]);
    }

    public function detail ($id) {
        $peserta = Peserta::find($id);
        // dd($peserta->peserta_kontak);
        return view('admin.peserta.detailPeserta', [ 'peserta' => $peserta ]);
    }

    public function verifikasiPeserta($id) {
        $peserta = Peserta::find( $id );
        if ( $peserta ) {
            $peserta->update([
                'verified_at' => date('Y-m-d H:i:s'),
                'verified_by' => Auth::user()->id,
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
