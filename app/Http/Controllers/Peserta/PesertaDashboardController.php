<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use App\Models\AssessmentKategori;
use App\Models\Dokumen;
use App\Models\PesertaKontak;
use App\Models\PesertaProfil;
use App\Models\Registrasi;
use App\Models\RegistrasiAssessment;
use App\Models\RegistrasiDokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PesertaDashboardController extends Controller
{
    // protected function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }
    public function index() {
        $user = Auth::guard('peserta')->user();

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
        if (count($peserta_kontak)) $count_profil += 1;
        $percentage_profil = ($count_profil/$count_all_profil)*100;
        // dd("$count_profil:$count_all_profil");
        // dd($percentage_profil);

        // pendaftaran
        $count_pendaftaran = 0;
        $count_all_pendaftaran = 1;
        $registrasi = Registrasi::where('peserta_id', $user->id)
            ->where('tahun', date('Y'))
            ->first();

        $assessment_kategori = AssessmentKategori::get();

        $count_all_pendaftaran += count($assessment_kategori);
        $count_all_pendaftaran += count(Dokumen::get());
        if ($registrasi) {
            $count_pendaftaran += 1;
            $count_pendaftaran += count(
                RegistrasiDokumen::where('registrasi_id', $registrasi->id)
                    ->where('status', 'disetujui')
                    ->get()
            );

            $registrasi_assessment = RegistrasiAssessment::where('registrasi_id', $registrasi->id)->get();
            foreach ($registrasi_assessment as $ra) {
                $assess = $ra->assessment_jawaban->assessment_pertanyaan->assessment_sub_kategori->assessment_kategori;
                foreach ($assessment_kategori as $ak) {
                    if ($ak->id == $assess->id) {
                        $ak->check = true;
                    } 
                }
            }
            foreach ($assessment_kategori as $key=>$ak) {
                if ($ak->check) $count_pendaftaran++;
            }
        }
        $percentage_pendaftaran = ($count_pendaftaran/$count_all_pendaftaran)*100;
        // dd("$percentage_pendaftaran%");
        // dd("$count_pendaftaran:$count_all_pendaftaran");
        return view('peserta.home.index', [
            'percentage_pendaftaran' => $percentage_pendaftaran,
            'percentage_profil' => $percentage_profil,
        ]);
    }
}