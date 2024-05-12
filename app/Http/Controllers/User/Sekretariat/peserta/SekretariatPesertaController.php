<?php

namespace App\Http\Controllers\User\Sekretariat\peserta;

use App\Http\Controllers\Controller;
use App\Models\AssessmentJawaban;
use App\Models\AssessmentKategori;
use App\Models\AssessmentPertanyaan;
use App\Models\AssessmentSubKategori;
use App\Models\Dokumen;
use App\Models\Peserta;
use App\Models\Registrasi;
use App\Models\RegistrasiAssessment;
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

    public function detailProfil(Request $request, $registrasi_id) {
        $registrasi_id = Crypt::decryptString($registrasi_id);
        $registrasi = Registrasi::find($registrasi_id);

        $registrasi_dokumen = $registrasi->registrasi_dokumen;
        $peserta = Peserta::find($registrasi->peserta_id);
        $dokumen = Dokumen::get();

        $assessment_kategori = AssessmentKategori::get();
        $selected_assessment_kategori = AssessmentKategori::where('nama', 'Kepemimpinan')->get();
        if ($request->assessment_kategori) {
            $selected_assessment_kategori = AssessmentKategori::where('nama', $request->assessment_kategori)->get();
            // dd($assessment_kategori);
        }
        return view('sekretariat.peserta.profil', [
            'peserta' => $peserta,
            'registrasi' => $registrasi,
            'registrasi_dokumen' => $registrasi_dokumen,
            'dokumen' => $dokumen,
            'assessment_kategori' => $assessment_kategori,
            'selected_assessment_kategori' => $selected_assessment_kategori,
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
            'registrasi_id' => Crypt::encryptString($registrasi_dokumen->registrasi_id),
            'tab' => 'dokumen',
        ])->with('success', 'Status dokumen berhasil dirubah');
    }

    public function sendFeedback(Request $request, $registrasi_id) {
        $request->validate([
            'feedback' => 'required',
        ], [
            'feedback.required' => 'Tidak ada feedback',
        ]);
        $registrasi_id = Crypt::decryptString($registrasi_id);
        $registrasi_dokumen = RegistrasiDokumen::where('registrasi_id', $registrasi_id)->get();
        $feedback = str_replace("\n", "<br/>", $request->feedback);
        $feedback = trim($feedback, ' ');
        foreach ($registrasi_dokumen as $key=>$rd) {
            $rd->update([
                'feedback' => $feedback,
            ]);
        }
        return back()->with('success', 'Berhasil mengirim feedback');
    }
    
}
