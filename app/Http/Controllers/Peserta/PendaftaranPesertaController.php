<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\Konfigurasi;
use App\Models\PesertaKontak;
use App\Models\PesertaProfil;
use App\Models\Registrasi;
use App\Models\RegistrasiDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class PendaftaranPesertaController extends Controller
{
    public function index() {
        $user = Auth::guard('peserta')->user();
        $tahun_sni = Konfigurasi::where('key', 'Tahun SNI Award')->distinct()->pluck('value')->first();
        $registrasi = Registrasi::where('peserta_id', $user->id)
            ->where('tahun', $tahun_sni)
            ->first();
        $registrasi_dokumen = RegistrasiDokumen::where('registrasi_id', $registrasi->id)->get();
        

        return view('peserta.pendaftaran.index', [
            'registrasi_dokumen' => $registrasi_dokumen,
        ]);
    }

    public function detail() {
        return view('peserta.pendaftaran.detail');
    }
}
