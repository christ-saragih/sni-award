<?php

namespace App\Http\Controllers\User\LeadEvaluator\Sekretariat;

use App\Http\Controllers\Controller;
use App\Models\AssessmentKategori;
use App\Models\Dokumen;
use App\Models\Konfigurasi;
use App\Models\Peserta;
use App\Models\Registrasi;
use App\Models\RegistrasiAssessment;
use App\Models\RegistrasiDokumen;
use App\Models\RegistrasiEvaluator;
use App\Models\RegistrasiPenilaian;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Dompdf\Dompdf;

class LeadEvaluatorSekretariatController extends Controller
{
    public function index(Request $request) {
        $user = Auth::user();
        $stage = Stage::where('id',  3)
            ->orWhere('id', 4)
            ->get();
        $tahun_registrasi = Registrasi::distinct()->pluck('tahun');

        $registrasi = Registrasi::where('sekretariat_id', Auth::user()->id);
        if ($request->stage) {
            $registrasi = $registrasi->where('stage_id', $request->stage);
        }
        if ($request->tahun) {
            $registrasi = $registrasi->where('tahun', $request->tahun);
        }
        $registrasi = $registrasi->get();

        $desk_evaluation = Registrasi::where('sekretariat_id', $user->id)
            ->where('stage_id', 3)
            // ->whereIn('id', $all_registrasi_id)
            ->get();
        $site_evaluation = Registrasi::where('sekretariat_id', $user->id)
            ->where('stage_id', 4)
            // ->whereIn('id', $all_registrasi_id)
            ->get();

        $penilaian_sekretariat = [];
        foreach ($desk_evaluation as $penilaian) {
            foreach ($penilaian->registrasi_penilaian as $status) {
                if($status->internal_id == $penilaian->sekretariat_id) {
                    $penilaian_sekretariat[] = [
                        'jabatan' => $status->jabatan,
                    ];
                }
            }
        }

        return view('lead_evaluator.sekretariat.index', [
            'stage' => $stage,
            'tahun_registrasi' => $tahun_registrasi,
            'registrasi' => $registrasi,
            'desk_evaluation' => $desk_evaluation,
            'site_evaluation' => $site_evaluation,
            'penilaian_sekretariat' => $penilaian_sekretariat,
        ]);
    }

    public function detail(Request $request, $registrasi_id) {
        $registrasi_id = Crypt::decryptString($registrasi_id);
        $registrasi = Registrasi::find($registrasi_id);
        $registrasi_penilaian = $registrasi->registrasi_penilaian;

        $registrasi_dokumen = $registrasi->registrasi_dokumen;
        $peserta = Peserta::find($registrasi->peserta_id);
        $dokumen = Dokumen::get();

        $konfigurasi_desk_evaluation = Konfigurasi::where('key', 'desk evaluation')->first();
        $konfigurasi_site_evaluation = Konfigurasi::where('key', 'site evaluation')->first();

        $desk_evaluation = RegistrasiEvaluator::where('registrasi_id', $registrasi->id)->where(['stage' => 3])->first();

        // $penilaian_evaluator = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->evaluator_id])->first();
        // $penilaian_lead_evaluator = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->lead_evaluator_id])->first();
        // $penilaian_sekretariat = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->registrasi->sekretariat_id])->first();

        $assessment_kategori = AssessmentKategori::get();

        $selected_assessment_kategori = AssessmentKategori::where('nama', 'Kepemimpinan')->get();
        if ($request->assessment_kategori) {
            $selected_assessment_kategori = AssessmentKategori::where('nama', $request->assessment_kategori)->get();
        }
        $penilaian_sekretariat = Registrasi::where(['stage_id' => 3, 'sekretariat_id' => $registrasi->sekretariat_id])->first();

        $desk_evaluation = RegistrasiEvaluator::where('registrasi_id', $registrasi->id)->where(['stage' => 3])->first();
        if ($desk_evaluation != null) {
            $penilaian_evaluator = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->evaluator_id])->first();
            $penilaian_lead_evaluator = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->lead_evaluator_id])->first();
            $penilaian_sekretariat = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->registrasi->sekretariat_id])->first();
            return view('lead_evaluator.sekretariat.profil', [
                'peserta' => $peserta,
                'registrasi' => $registrasi,
                'registrasi_dokumen' => $registrasi_dokumen,
                'dokumen' => $dokumen,
                'assessment_kategori' => $assessment_kategori,
                'selected_assessment_kategori' => $selected_assessment_kategori,
                'registrasi_penilaian' => $registrasi_penilaian,
                'desk_evaluation' => $desk_evaluation,
                'penilaian_evaluator' => $penilaian_evaluator,
                'penilaian_lead_evaluator' => $penilaian_lead_evaluator,
                'penilaian_sekretariat' => $penilaian_sekretariat,
                'konfigurasi_desk_evaluation' => $konfigurasi_desk_evaluation,
                'konfigurasi_site_evaluation' => $konfigurasi_site_evaluation,
            ]);
        }
        return view('lead_evaluator.sekretariat.profil', [
            'peserta' => $peserta,
            'registrasi' => $registrasi,
            'registrasi_dokumen' => $registrasi_dokumen,
            'dokumen' => $dokumen,
            'assessment_kategori' => $assessment_kategori,
            'selected_assessment_kategori' => $selected_assessment_kategori,
            'registrasi_penilaian' => $registrasi_penilaian,
            'desk_evaluation' => $desk_evaluation,
            'penilaian_sekretariat' => $penilaian_sekretariat,
            'konfigurasi_desk_evaluation' => $konfigurasi_desk_evaluation,
            'konfigurasi_site_evaluation' => $konfigurasi_site_evaluation,
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
        return redirect()->route('lead_evaluator.sekretariat.detail.view', [
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

    public function downloadAssessmentPDF(Request $request, $registrasi_id) {
        $registrasi_assessment = RegistrasiAssessment::where('registrasi_id', $registrasi_id)->get();
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

    public function penilaian(Request $request, $registrasi_id) {
        $request->validate([
            'skor' => 'required|max:100',
            'url_dokumen_penilaian' => 'required|mimes:pdf',
            'catatan' => 'required',
        ], [
            'skor.required' => 'Skor Tidak Boleh Kosong',
            'skor.required' => 'Skor Masimal 100',
            'url_dokumen_penilaian.required' => 'Dokumen Penilaian Tidak Boleh Kosong',
            'url_dokumen_penilaian.mimes' => 'Dokumen Penilaian Harus PDF',
            'catatan.required' => 'Catatan Tidak Boleh Kosong',
        ]);

        $user = Auth::user();
        $registrasi = Registrasi::find($registrasi_id);

        $desk_evaluation = RegistrasiEvaluator::where('registrasi_id', $registrasi->id)->where(['stage' => 3])->first();
        $penilaian_evaluator = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->evaluator_id])->first();
        $penilaian_lead_evaluator = RegistrasiPenilaian::where('registrasi_id', $registrasi->id)->where(['stage_id' => 3, 'internal_id' => $desk_evaluation->lead_evaluator_id])->first();
        if ($penilaian_evaluator && $penilaian_lead_evaluator) {
            $dokumen_penilaian = $request->file('url_dokumen_penilaian');
            $nama_dokumen_penilaian = 'dokumen_penilaian_' . now()->format('YmdHis') . $dokumen_penilaian->getClientOriginalName();
            $dokumen_penilaian->move(storage_path('app/public/file/dokumen_penilaian/desk_evaluation/sekretariat/'), $nama_dokumen_penilaian);

            RegistrasiPenilaian::create([
                'registrasi_id' => $registrasi_id,
                'internal_id' => $user->id,
                'jabatan' => $user->jenis_role->nama,
                'url_dokumen_penilaian' => $nama_dokumen_penilaian,
                'stage_id' => $registrasi->stage_id,
                'skor' => $request->skor,
                'catatan' => $request->catatan,
                'final' => $request->skor,
            ]);

            $registrasi->update(['stage_id' => 4]);
            return back()->with('success', 'Berhasil mengirim penilaian');
        }

        return back()->with('error', 'Evaluator/Lead Evaluator Belum Menilai');
    }

    public function download($registrasi_id, $penilaian_id)
    {
        $registrasi_id = Crypt::decryptString($registrasi_id);
        $penilaian_id = Crypt::decryptString($penilaian_id);
        $item = RegistrasiPenilaian::find($penilaian_id);
        // dd($item);
        $filePath = storage_path('app/public/file/dokumen_penilaian/desk_evaluation/sekretariat/' . $item->url_dokumen_penilaian);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }
    }

    public function finalisasi($registrasi_id){
        $registrasi = Registrasi::find($registrasi_id);
        // dd($registrasi);
        $registrasi->update(['status_id' => 5]);
        return back()->with('success', 'Penilaian Desk Evaluation Selesai');
    }

    public function siteEvaluation($registrasi_id) {
        $registrasi = Registrasi::find($registrasi_id);
        $registrasi->update(['stage_id' => 4]);
        return redirect()->back()->with('success', 'Penilaian Site Evaluation');
    }
}
