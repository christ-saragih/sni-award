<?php

namespace App\Http\Controllers;

use App\Models\AssessmentKategori;
use App\Models\Dokumen;
use App\Models\Peserta;
use App\Models\PesertaProfil;
use App\Models\Registrasi;
use App\Models\RegistrasiAssessment;
use App\Models\RegistrasiDokumen;
use App\Models\RegistrasiEvaluator;
use App\Models\RegistrasiPenilaian;
use App\Models\User;
use Dompdf\Dompdf;
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

        $desk_evaluation = RegistrasiEvaluator::where('registrasi_id', $registrasi->id)->where(['stage' => 3])->first();

        // dd($desk_evaluation);
        // dd($desk_evaluation[0]->registrasi->registrasi_penilaian);
        // dd($penilaian_evaluator);
        $site_evaluation = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 4])->get();

        $assessment_kategori = AssessmentKategori::first();

        $data_assessment_kategori = AssessmentKategori::select('nama')->distinct()->pluck('nama');
        // dd($desk_evaluation->registrasi->sekretariat->name);

        $penilaian_sekretariat = Registrasi::where(['stage_id' => 3, 'sekretariat_id' => $registrasi->sekretariat_id])->first();
        // dd($penilaian_sekretariat);

        if($desk_evaluation != null){
            $penilaian_evaluator = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->evaluator_id])->first();
            $penilaian_lead_evaluator = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->lead_evaluator_id])->first();
            $penilaian_sekretariat = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->$registrasi->sekretariat_id])->first();

            return view('peserta.riwayat.detail', compact(['registrasi','desk_evaluation', 'site_evaluation', 'assessment_kategori', 'data_assessment_kategori', 'registrasi_assessment', 'registrasi_dokumen', 'dokumen', 'registrasi_penilaian', 'dokumen_peserta', 'penilaian_evaluator', 'penilaian_lead_evaluator', 'penilaian_sekretariat']));
        }

        return view('peserta.riwayat.detail', compact(['registrasi','desk_evaluation', 'site_evaluation', 'assessment_kategori', 'data_assessment_kategori', 'registrasi_assessment', 'registrasi_dokumen', 'dokumen', 'registrasi_penilaian', 'dokumen_peserta', 'penilaian_sekretariat']));
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

    public function downloadAssessmentPDF(Request $request, $registrasi_id) {
        // $request->validate([
        //     'assessment_kategori' => 'required',
        // ], [
        //     'assessment_kateg'
        // ]);
        $registrasi_assessment = RegistrasiAssessment::where('registrasi_id', $registrasi_id)->get();
        // dd($registrasi_assessment[0]->assessment_pertanyaan->assessment_sub_kategori->nama);
        $assessment_kategori = AssessmentKategori::get();

        $html_assessment = "
<div style='width: 100%;padding: 30px 20px;''>
    <table style='width: 100%;'>
        <thead style='width: 100%;background-color: #552525; font-weight: bold; color: white;'>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Sub Kategori</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
            </tr>
        </thead>
        <tbody style='width: 100%;'>
        ";
        foreach ($registrasi_assessment as $key=>$ra) {
            $nomor = $key + 1;
            $pertanyaan = $ra->assessment_pertanyaan;
            $subkategori = $pertanyaan->assessment_sub_kategori;
            $kategori = $subkategori->assessment_kategori;
            $jawaban = $ra->assessment_jawaban->jawaban;

            $html_assessment = $html_assessment."
                <tr>
                    <td>$nomor</td>
                    <td>$kategori->nama</td>
                    <td>$subkategori->nama</td>
                    <td>$pertanyaan->pertanyaan</td>
                    <td>$jawaban</td>
                </tr>
            ";
        }
            $html_assessment = $html_assessment."
        </tbody>
    </table>
</div>
        ";

        $dompdf = new Dompdf();
        $dompdf->load_html($html_assessment);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('assessment_pertanyaan.pdf');

    }

    public function downloadPenilaianPDF(Request $request, $registrasi_id) {
        // $request->validate([
        //     'assessment_kategori' => 'required',
        // ], [
        //     'assessment_kateg'
        // ]);
        $registrasi_assessment = RegistrasiAssessment::where('registrasi_id', $registrasi_id)->get();
        // dd($registrasi_assessment[0]->assessment_pertanyaan->assessment_sub_kategori->nama);
        $assessment_kategori = AssessmentKategori::get();

        $html_assessment = "
<div style='width: 100%;padding: 30px 20px;''>
    <table style='width: 100%;'>
        <thead style='width: 100%;background-color: #552525; font-weight: bold; color: white;'>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Sub Kategori</th>
                <th>Pertanyaan</th>
                <th>Jawaban</th>
            </tr>
        </thead>
        <tbody style='width: 100%;'>
        ";
        foreach ($registrasi_assessment as $key=>$ra) {
            $nomor = $key + 1;
            $pertanyaan = $ra->assessment_pertanyaan;
            $subkategori = $pertanyaan->assessment_sub_kategori;
            $kategori = $subkategori->assessment_kategori;
            $jawaban = $ra->assessment_jawaban->jawaban;

            $html_assessment = $html_assessment."
                <tr>
                    <td>$nomor</td>
                    <td>$kategori->nama</td>
                    <td>$subkategori->nama</td>
                    <td>$pertanyaan->pertanyaan</td>
                    <td>$jawaban</td>
                </tr>
            ";
        }
            $html_assessment = $html_assessment."
        </tbody>
    </table>
</div>
        ";

        $dompdf = new Dompdf();
        $dompdf->load_html($html_assessment);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('assessment_pertanyaan.pdf');

    }
}
