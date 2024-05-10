<?php

namespace App\Http\Controllers\User\Sekretariat\peserta;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class SekretariatPesertaController extends Controller
{
    public function index() {
        $user = Auth::user();
        $registrasi = Registrasi::where('sekretariat_id', $user->id)->get();
        $desk_evaluation = Registrasi::where('sekretariat_id', $user->id)->
            where('stage_id', '3')
            ->get();
        $site_evaluation = Registrasi::where('sekretariat_id', $user->id)->
            where('stage_id', '4')
            ->get();
        // dd($registrasi[0]->peserta->email);
        return view('sekretariat.peserta.index', [
            'registrasi' => $registrasi,
            'desk_evaluation' => $desk_evaluation,
            'site_evaluation' => $site_evaluation,
        ]);
    }
    public function detailProfil($id) {
        $id = Crypt::decryptString($id);
        $registrasi = Registrasi::find($id);
        $peserta = Peserta::find($registrasi->peserta_id);
        return view('sekretariat.peserta.profil', [
            'peserta' => $peserta,
            'registrasi' => $registrasi,
        ]);
    }
}
