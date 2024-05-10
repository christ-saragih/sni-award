<?php

namespace App\Http\Controllers\User\Sekretariat\peserta;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Peserta;
use App\Models\Registrasi;
use App\Models\RegistrasiDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redis;

class SekretariatPesertaController extends Controller
{
    public function index() {
        $user = Auth::user();
        $registrasi = Registrasi::where('sekretariat_id', $user->id)->get();
        $desk_evaluation = Registrasi::where('sekretariat_id', $user->id)
            ->where('stage_id', '3')
            ->get();
        $site_evaluation = Registrasi::where('sekretariat_id', $user->id)
            ->where('stage_id', '4')
            ->get();
        return view('sekretariat.peserta.index', [
            'registrasi' => $registrasi,
            'desk_evaluation' => $desk_evaluation,
            'site_evaluation' => $site_evaluation,
        ]);
    }

    public function detailProfil($id) {
        $id = Crypt::decryptString($id);
        $registrasi = Registrasi::find($id);
        $registrasi_dokumen = $registrasi->registrasi_dokumen;
        $peserta = Peserta::find($registrasi->peserta_id);
        $dokumen = Dokumen::get();
        return view('sekretariat.peserta.profil', [
            'peserta' => $peserta,
            'registrasi' => $registrasi,
            'registrasi_dokumen' => $registrasi_dokumen,
            'dokumen' => $dokumen,
        ]);
    }

    public function persetujuanDokumen(Request $request, $registrasi_dokumen_id) {
        $request->validate([
            'persetujuan_dokumen' => 'required',
        ], [
            'persetujuan_dokumen.required' => 'Tidak ada persetujuan',
        ]);
        $registrasi_dokumen = RegistrasiDokumen::find($registrasi_dokumen_id);
        $registrasi_dokumen->update([
            'status' => $request->persetujuan_dokumen,
            'review_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('sekretariat.peserta.profil.view', [
            'id' => Crypt::encryptString($registrasi_dokumen->registrasi_id),
            'tab' => 'dokumen',
        ])->with('success', 'Status dokumen berhasil dirubah');
    }

    public function sendFeedback(Request $request, $registrasi_id) {
        $request->validate([
            'feedback' => 'required',
        ], [
            'feedback.required' => 'Tidak ada feedback',
        ]);
        $feedback = str_replace("\n", "<br/>", $request->feedback);
        $feedback = trim($feedback, ' ');
        dd($feedback);
    }
}
