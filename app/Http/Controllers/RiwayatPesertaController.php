<?php

namespace App\Http\Controllers;

use App\Models\AssessmentKategori;
use App\Models\Dokumen;
use App\Models\Peserta;
use App\Models\PesertaProfil;
use App\Models\Registrasi;
use App\Models\RegistrasiAssessment;
use App\Models\RegistrasiDokumen;
use App\Models\RegistrasiPenilaian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class RiwayatPesertaController extends Controller
{
    public function index() {
        $peserta = Peserta::find(Auth::guard('peserta')->user()->id);
        $registrasi = Registrasi::where('peserta_id', Auth::guard('peserta')->user()->id)->get();
        return view('peserta.riwayat.index', compact('registrasi'));
    }

    public function detail(string $id) {
        $id = Crypt::decryptString($id);
        $registrasi = Registrasi::find($id);
        $registrasi_assessment = RegistrasiAssessment::where('registrasi_id', $registrasi->id)->get();
        $registrasi_penilaian = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->get();
        $registrasi_dokumen = RegistrasiDokumen::where('registrasi_id', $registrasi->id)->first();
        $dokumen = Dokumen::get();


        $peserta = Peserta::find($registrasi->peserta_id);
        // dd($peserta);
        $dokumen_peserta = PesertaProfil::where('peserta_id', $peserta->id)->select('url_legalitas_hukum_organisasi', 'url_sppt_sni', 'url_sk_kemenkumham', 'url_kewenangan_kebijakan')->first();

        $desk_evaluation = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3])->get();
        $site_evaluation = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 4])->get();

        $assessment_kategori = AssessmentKategori::first();

        $data_assessment_kategori = AssessmentKategori::select('nama')->distinct()->pluck('nama');

        return view('peserta.riwayat.detail', compact(['registrasi','desk_evaluation', 'site_evaluation', 'assessment_kategori', 'data_assessment_kategori', 'registrasi_assessment', 'registrasi_dokumen', 'dokumen', 'registrasi_penilaian', 'dokumen_peserta']));
    }

    public function getKategori($id, $kategori){
        $id = Crypt::decryptString($id);
        $registrasi = Registrasi::find($id);
        $registrasi_assessment = RegistrasiAssessment::where('registrasi_id', $registrasi->id)->get();
        $registrasi_penilaian = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->get();
        $registrasi_dokumen = RegistrasiDokumen::where('registrasi_id', $registrasi->id)->first();
        $dokumen = Dokumen::get();


        $peserta = Peserta::find($registrasi->peserta_id);
        // dd($peserta);
        $dokumen_peserta = PesertaProfil::where('peserta_id', $peserta->id)->select('url_legalitas_hukum_organisasi', 'url_sppt_sni', 'url_sk_kemenkumham', 'url_kewenangan_kebijakan')->first();

        $desk_evaluation = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3])->get();
        $site_evaluation = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 4])->get();

        $user = User::all();
        $assessment_kategori = AssessmentKategori::where('nama', $kategori)->first();

        $data_assessment_kategori = AssessmentKategori::select('nama')->distinct()->pluck('nama');

        return view('peserta.riwayat.detail', compact(['registrasi','desk_evaluation', 'site_evaluation', 'assessment_kategori', 'data_assessment_kategori', 'registrasi_assessment', 'registrasi_dokumen', 'dokumen', 'registrasi_penilaian', 'dokumen_peserta', 'user']));
    }
}
