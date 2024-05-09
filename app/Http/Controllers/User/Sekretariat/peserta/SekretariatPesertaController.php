<?php

namespace App\Http\Controllers\User\Sekretariat\peserta;

use App\Http\Controllers\Controller;
use App\Models\Registrasi;
use Illuminate\Http\Request;

class SekretariatPesertaController extends Controller
{
    public function index() {
        $registrasi = Registrasi::get();
        $desk_evaluation = Registrasi::where('stage_id', '3')->get();
        $site_evaluation = Registrasi::where('stage_id', '4')->get();
        // dd($registrasi[0]->peserta->email);
        return view('sekretariat.peserta.index', [
            'registrasi' => $registrasi,
            'desk_evaluation' => $desk_evaluation,
            'site_evaluation' => $site_evaluation,
        ]);
    }
}
