<?php

namespace App\Http\Controllers\Peserta;

use App\Models\Registrasi;
use App\Models\RegistrasiAssessment;
use App\Http\Controllers\Controller;
use App\Models\AssessmentJawaban;
use App\Models\AssessmentKategori;
use App\Models\AssessmentPertanyaan;
use App\Models\AssessmentSubKategori;
use App\Models\Dokumen;
use App\Models\Konfigurasi;
use App\Models\Peserta;
use App\Models\PesertaKontak;
use App\Models\PesertaProfil;
use App\Models\RegistrasiDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use SebastianBergmann\Type\TrueType;

class RegistrasiAssessmentController extends Controller
{
    public function showKategori() {
        $existingRegistration = Registrasi::where('peserta_id', Auth::guard('peserta')->user()->id)->first();
        $assessment_kategori = AssessmentKategori::get();

        $peserta = Peserta::find(Auth::guard('peserta')->user()->id);

        $dokumen = Dokumen::get();

        $konfigurasi = Konfigurasi::where('key','Tahun SNI Award')->first();
        $registrasi = Registrasi::where('peserta_id',Auth::guard('peserta')->user()->id)->where('tahun',$konfigurasi->value)->first();
        $registrasi_dokumen = [];
        if ($registrasi) {
            $registrasi_dokumen = RegistrasiDokumen::where('registrasi_id', $registrasi->id)->get();
        }
        $test = [];
        if($registrasi){
            $test = Dokumen::leftJoin('registrasi_dokumen','dokumen.id','registrasi_dokumen.dokumen_id')->where('registrasi_id',$registrasi->id)->orWhereNull('registrasi_id')->get();
        }
        $regis_jawaban = [];

        if ($registrasi){
            $regis_jawaban = RegistrasiAssessment::where('registrasi_id',$registrasi->id)->get();
        }
        
        foreach ($regis_jawaban as $jawaban) {
            $kategori_assess = $jawaban->assessment_jawaban->assessment_pertanyaan->assessment_sub_kategori->assessment_kategori;
            foreach($assessment_kategori as $kategori){
                if($kategori->id == $kategori_assess->id){
                    $kategori->check = TRUE;
                }
            }
        }

        if (!$assessment_kategori){
            return response()->json(['error' => 'Data not found'], 404);
        }

        // profil
        $count_all_profil = 1; // 1 untuk kontak (karena minimal 1)
        $count_profil = 0;

        $tableName = 'peserta_profil';
        $exclude_column = ['id', 'peserta_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'role_by', 'deleted_at', 'deleted_by'];
        if (Schema::hasTable($tableName)) {
            $count_field = Schema::getColumns($tableName);
            foreach ($count_field as $c) {
                if (!in_array($c['name'], $exclude_column)) $count_all_profil++;
            }

        }
        $peserta_profil = PesertaProfil::where('peserta_id', $peserta->id)->first();
        foreach ($peserta_profil->toArray() as $key=>$pp) {
            if (!in_array($key, $exclude_column) && !is_null($pp)) $count_profil++;
        }


        $peserta_kontak = PesertaKontak::where('peserta_id', $peserta->id)->get() ?? true;
        if (count($peserta_kontak) > 0) $count_profil += 1;
        $percentage_profil = ($count_profil/$count_all_profil)*100;

        return view('peserta.pendaftaran.index', [
            'assessment_kategori' => $assessment_kategori,
            'dokumen' => $dokumen,
            'peserta' => $peserta,
            'existingRegistration' => $existingRegistration,
            'registrasi' => $registrasi,
            'registrasi_dokumen' => $registrasi_dokumen,
            'test' =>$test,
            'percentage_profil' => $percentage_profil,
            // 'pesertaProfil' => $pesertaProfil
        ]);
    }

    public function showPertanyaan($id,$registrasi_id){
        // $assessment_sub_kategori = AssessmentSubKategori::with('assessment_pertanyaan','assessment_jawaban')->get();
        $assessment_sub_kategori = AssessmentSubKategori::where('assessment_kategori_id', $id)->get();
        // dd($assessment_sub_kategori[0]->assessment_pertanyaan);
        $registrasi = Registrasi::find($registrasi_id);
        $pertanyaan = AssessmentPertanyaan::find($id);
        $jawaban_yang_dipilih = AssessmentJawaban::find($id);
        if (!$assessment_sub_kategori){
            return response()->json(['error' => 'Data not found'], 404);
        }


        return view('peserta.pendaftaran.detail',[
            'assessment_sub_kategori' => $assessment_sub_kategori,
            'registrasi' => $registrasi,
            'pertanyaan' => $pertanyaan,
            'jawaban_yang_dipilih' => $jawaban_yang_dipilih,
        ]);
    }

    public function detail() {
        return view('peserta.pendaftaran.detail');
    }

    public function show($assessment_kategori_id, $assessment_pertanyaan_id, $assessment_jawaban_id, $dokumen) {

        $assessment_kategori = AssessmentKategori::find($assessment_kategori_id);
        $assessment_pertanyaan = AssessmentPertanyaan::find($assessment_pertanyaan_id);
        $assessment_jawaban = AssessmentJawaban::find($assessment_jawaban_id);
        if (!$assessment_kategori || !$assessment_pertanyaan || !$assessment_jawaban){
            return response()->json(['error' => 'Data not found'], 404);
        }

        return response()->json([
            'assessment_kategori' => $assessment_kategori,
            'assessment_pertanyaan' => $assessment_pertanyaan,
            'assessment_jawaban' => $assessment_jawaban
        ]);
    }

    public function checklistAssessment($assessment_jawaban_id){
        $assessment_jawaban = AssessmentJawaban::where('assessment_jawaban_id', $assessment_jawaban_id)->get();
        if ($assessment_jawaban){
            return view('peserta.pendaftaran.index');
        }
        return view('peserta.pendaftaran.index', [
            'assessment_jawaban' => $assessment_jawaban
        ]);
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'registrasi_id' => 'required|exists:registrasi,id',
            'assessment_pertanyaan_id.*' => 'required|exists:assessment_pertanyaan,id',
            // 'jawaban.*' => 'required|exists:assessment_jawaban,id',
        ]);

        // dd($request->assessment_pertanyaan_id);

        // Simpan data jawaban ke database
        foreach ($request->assessment_pertanyaan_id as $pertanyaan_id) {
            $jawaban_id = $request->input('jawaban.' . $pertanyaan_id);
            RegistrasiAssessment::create([
                'registrasi_id' => $request->registrasi_id,
                'assessment_pertanyaan_id' => $pertanyaan_id,
                'assessment_jawaban_id' => $jawaban_id,
            ]);
        }

        return redirect()->route('peserta.pendaftaran.view', ['tab' => 'assessment'])->with('success', 'Berhasil');

        // Redirect or give a response as needed
    }

    public function openRegistrasi() {
        // Periksa apakah peserta sudah memiliki entri registrasi sebelumnya
        $user = Auth::guard('peserta')->user();
        $existingRegistration = Registrasi::where('peserta_id', $user->id)->first();

        // profil
        $count_all_profil = 1; // 1 untuk kontak (karena minimal 1)
        $count_profil = 0;

        $tableName = 'peserta_profil';
        $exclude_column = ['id', 'peserta_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'role_by', 'deleted_at', 'deleted_by'];
        if (Schema::hasTable($tableName)) {
            $count_field = Schema::getColumns($tableName);
            foreach ($count_field as $c) {
                if (!in_array($c['name'], $exclude_column)) $count_all_profil++;
            }

        }
        $peserta_profil = PesertaProfil::where('peserta_id', $user->id)->first();
        foreach ($peserta_profil->toArray() as $key=>$pp) {
            if (!in_array($key, $exclude_column) && !is_null($pp)) $count_profil++;
        }


        $peserta_kontak = PesertaKontak::where('peserta_id', $user->id)->get() ?? true;
        if (count($peserta_kontak) > 0) $count_profil += 1;
        $percentage_profil = ($count_profil/$count_all_profil)*100;

        // dd($percentage_profil);

        $konfigurasi_pendaftaran = Konfigurasi::where('key','pendaftaran')->first();
        if ($konfigurasi_pendaftaran->value == 'TRUE') {
            if ($existingRegistration) return redirect()->back()->withErrors('Anda sudah mendaftar sebelumnya');
            if ($percentage_profil != 100) return redirect()->back()->withErrors('Silahkan lengkapi prodil terlebih dahulu');

            $tahun_sni = Konfigurasi::where('key', 'Tahun SNI Award')->distinct()->pluck('value')->first();
            if (Auth::guard('peserta')->check()) {
                Registrasi::create([
                    'tahun' => $tahun_sni,
                    'peserta_id' => $user->id,
                    'status_id' => 1, // aktif
                    'stage_id' => 1, // default
                    'kategori_organisasi_id' => 1, // dummy
                ]);

                return redirect()->back()->with('success', 'Pendaftaran telah dibuka');
            }
        }


        return redirect()->back()->withErrors('Pendaftaran Belum Dibuka!');
    }




    // public function showSubmit($registrasi_id)
    // {
    //     $registrasi = Registrasi::find($registrasi_id);
    //     return view('peserta.pendaftaran', compact('registrasi'));
    // }
}
