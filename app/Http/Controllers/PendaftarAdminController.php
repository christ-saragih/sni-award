<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssessmentJawaban;
use App\Models\AssessmentKategori;
use App\Models\AssessmentPertanyaan;
use App\Models\AssessmentSubKategori;
use App\Models\Peserta;
use App\Models\PesertaKontak;
use App\Models\PesertaProfil;
use App\Models\Registrasi;
use App\Models\RegistrasiAssessment;
use App\Models\RegistrasiDokumen;
use App\Models\User;
use Illuminate\Http\Request;

class PendaftarAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrasi = Registrasi::get();

        $data_tahun = Registrasi::select('tahun')->distinct()->pluck('tahun');
        // dd($registrasi[0]->user);

        return view('admin.pendaftar_sni_award.index', compact(['registrasi', 'data_tahun']));
    }

    public function getTahun($tahun)
    {
        $registrasi = Registrasi::where('tahun', $tahun)->get();

        $data_tahun = Registrasi::select('tahun')->distinct()->pluck('tahun');

        return view('admin.pendaftar_sni_award.index', compact(['registrasi', 'data_tahun']));
    }

    public function getKategori($kategori)
    {
        $assessment_sub_kategori = AssessmentSubKategori::where('assessment_kategori_id', $kategori)->get();

        $data_assessment_kategori = AssessmentSubKategori::select('assessment_kategori_id')->distinct()->pluck('assessment_kategori_id');
        dd($data_assessment_kategori);

        return view('admin.pendaftar_sni_award.show', compact(['assessment_sub_kategori', 'data_assessment_kategori']));
    }

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
        $registrasi = Registrasi::find($id);
        $registrasi_assessment = RegistrasiAssessment::where('registrasi_id', $registrasi->id)->get();
        // dd($registrasi_assessment);
        // $registrasi_dokumen = RegistrasiDokumen::where('registrasi_id', $registrasi->id)->get();
        // $assessment_jawaban = $registrasi->registrasi_assessment->assessment_jawaban_id;

        $peserta = Peserta::find($registrasi->peserta_id);

        $assessment_sub_kategori = AssessmentSubKategori::get();
        // dd($assessment_kategori);]

        // $assessment_jawaban = $registrasi->registrasi_assessment[0]->assessment_jawaban_id;

        // dd($assessment_jawaban);

        $data_assessment_kategori = AssessmentSubKategori::select('assessment_kategori_id')->distinct()->get();
        // dd($data_assessment_kategori);

        $user = User::all();

        return view('admin.pendaftar_sni_award.show', compact(['registrasi', 'registrasi_assessment', 'peserta', 'user', 'assessment_sub_kategori', 'data_assessment_kategori']));
        // return view('admin.pendaftar_sni_award.show', compact(['registrasi', 'registrasi_assessment', 'registrasi_dokumen', 'peserta', 'user']));
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
        $registrasi = Registrasi::find($id);
        $registrasi->update([
            'sekretariat_id' => $request->sekretariat_id,
        ]);
        return redirect()->back()->with('success', 'Registrasi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
