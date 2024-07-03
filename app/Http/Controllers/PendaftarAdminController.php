<?php

namespace App\Http\Controllers;

use App\Exports\PesertaExport;
use App\Http\Controllers\Controller;
use App\Models\AssessmentJawaban;
use App\Models\AssessmentKategori;
use App\Models\AssessmentPertanyaan;
use App\Models\AssessmentSubKategori;
use App\Models\Dokumen;
use App\Models\Peserta;
use App\Models\PesertaKontak;
use App\Models\PesertaProfil;
use App\Models\Registrasi;
use App\Models\RegistrasiAssessment;
use App\Models\RegistrasiDokumen;
use App\Models\RegistrasiPenilaian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Facades\Excel;

use function Laravel\Prompts\select;

class PendaftarAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrasi = Registrasi::get();

        $data_tahun = Registrasi::select('tahun')->distinct()->pluck('tahun');
        // dd($data_tahun);

        return view('admin.pendaftar_sni_award.index', compact(['registrasi', 'data_tahun']));
    }

    public function getTahun($tahun)
    {
        $registrasi = Registrasi::where('tahun', $tahun)->get();

        $data_tahun = Registrasi::select('tahun')->distinct()->pluck('tahun');

        return view('admin.pendaftar_sni_award.index', compact(['registrasi', 'data_tahun']));
    }

    public function getKategori($id, $kategori)
    {
        $id = Crypt::decryptString($id);
        $registrasi = Registrasi::find($id);
        // dd($registrasi);
        $registrasi_assessment = RegistrasiAssessment::where('registrasi_id', $registrasi->id)->get();
        $registrasi_penilaian = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->get();
        $registrasi_dokumen = RegistrasiDokumen::where('registrasi_id', $registrasi->id)->first();
        $dokumen = Dokumen::get();
        // dd($dokumen[0]->registrasi_dokumen->status->nama);
        // $assessment_jawaban = $registrasi->registrasi_assessment->assessment_jawaban_id;

        $peserta = Peserta::find($registrasi->peserta_id);
        // dd($peserta);
        $dokumen_peserta = PesertaProfil::where('peserta_id', $peserta->id)->select('url_legalitas_hukum_organisasi', 'url_sppt_sni', 'url_sk_kemenkumham', 'url_kewenangan_kebijakan')->first();
        // dd($dokumen_peserta);

        $user = User::all();
        $assessment_kategori = AssessmentKategori::where('nama', $kategori)->first();

        $data_assessment_kategori = AssessmentKategori::select('nama')->distinct()->pluck('nama');
        // dd($data_assessment_kategori);

        return view('admin.pendaftar_sni_award.show', compact(['assessment_kategori', 'registrasi_assessment', 'registrasi_penilaian', 'data_assessment_kategori', 'registrasi', 'registrasi_dokumen', 'dokumen', 'dokumen_peserta', 'peserta', 'user']));
    }


    // public function getDokumenPeserta($id){
    //     $registrasi = Registrasi::find($id);
    //     $peserta = Peserta::find($registrasi->peserta_id);
    //     $peserta_profil = $peserta->peserta_profil;
    //     // dd($peserta);
    //     return response()->json($peserta_profil);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = Crypt::decryptString($id);
        $registrasi = Registrasi::find($id);
        $registrasi_assessment = RegistrasiAssessment::where('registrasi_id', $registrasi->id)->get();
        $registrasi_penilaian = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->get();
        // dd($registrasi_penilaian);
        $registrasi_dokumen = RegistrasiDokumen::where('registrasi_id', $registrasi->id)->first();
        $dokumen = Dokumen::get();
        // dd($dokumen[0]->registrasi_dokumen->status->nama);
        // $assessment_jawaban = $registrasi->registrasi_assessment->assessment_jawaban_id;

        $peserta = Peserta::find($registrasi->peserta_id);
        // dd($peserta);
        $dokumen_peserta = PesertaProfil::where('peserta_id', $peserta->id)->select('url_legalitas_hukum_organisasi', 'url_sppt_sni', 'url_sk_kemenkumham', 'url_kewenangan_kebijakan')->first();
        // dd($dokumen_peserta);

        $assessment_kategori = AssessmentKategori::first();
        // dd($assessment_kategori->assessment_sub_kategori);

        $data_assessment_kategori = AssessmentKategori::select('nama')->distinct()->pluck('nama');
        // dd($data_assessment_kategori);

        $assigned_sekretariat = Registrasi::select('sekretariat_id')
            ->where('sekretariat_id', '!=', null)
            ->distinct()
            ->pluck('sekretariat_id');

        $user = User::where('role', '!=', 1)
            ->where('verified_at', '!=', null)
            ->whereNotIn('id', $assigned_sekretariat)
            ->get();
        // dd($user);

        // dd($sekretariat_check);

        return view('admin.pendaftar_sni_award.show', compact(['registrasi', 'registrasi_assessment', 'registrasi_penilaian', 'registrasi_dokumen', 'dokumen', 'dokumen_peserta', 'peserta', 'user', 'assessment_kategori', 'data_assessment_kategori']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registrasi $registrasi)
    {
        return response()->json($registrasi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $id = Crypt::decryptString($id);
        $registrasi = Registrasi::find($id);
        if ($registrasi->status->nama == 'open') {
            $registrasi->update([
                'sekretariat_id' => $request->sekretariat_id,
            ]);
            return redirect()->back()->with('success', 'Registrasi berhasil diubah');
        } else {
            return redirect()->back()->withErrors('Penilaian sedang berjalan. Tidak bisa mengubah sekretariat');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function exportExcel(){
        // dd("aaaaaa");
        return Excel::download(new PesertaExport(), 'DataPesertaSniAward.xlsx');
    }
}
