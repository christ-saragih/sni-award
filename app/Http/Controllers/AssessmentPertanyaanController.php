<?php

namespace App\Http\Controllers;

use App\Models\AssessmentJawaban;
use App\Models\AssessmentKategori;
use App\Models\AssessmentPertanyaan;
use App\Models\AssessmentSubKategori;
use Illuminate\Http\Request;

class AssessmentPertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assessment_pertanyaan = AssessmentPertanyaan::all();
        // dd($assessment_pertanyaan);
        return view('admin.assessment.assessment_pertanyaan.index', compact(['assessment_pertanyaan']));
    }

    public function getSubKategoriByKategori(Request $request)
    {
        $assessment_kategori_id = $request->assessment_kategori_id;
        $assessment_sub_kategori = AssessmentSubKategori::where('assessment_kategori_id', $assessment_kategori_id)->get();

        return response()->json($assessment_sub_kategori);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assessment_kategori = AssessmentKategori::all();
        $assessment_sub_kategori = AssessmentSubKategori::all();
        return view('admin.assessment.assessment_pertanyaan.create', compact(['assessment_sub_kategori', 'assessment_kategori']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'jumlah_jawaban' => 'required|integer|min:1',
            'jawaban' => 'required|array|min:' . $request->jumlah_jawaban,
            'jawaban.*' => 'required|string',
            'status_jawaban' => 'required|array|size:' . $request->jumlah_jawaban,
            'status_jawaban.*' => 'required|in:TRUE,FALSE',
            'poin' => 'required|array|size:' . $request->jumlah_jawaban,
            'poin.*' => 'required|integer',
        ]);

        // Simpan pertanyaan
        $assessment_pertanyaan = AssessmentPertanyaan::create([
            'assessment_sub_kategori_id' => $request->assessment_sub_kategori_id,
            'pertanyaan' => $request->pertanyaan,
        ]);

        // Simpan jawaban
        foreach ($request->jawaban as $index => $jawaban) {
            AssessmentJawaban::create([
                'assessment_pertanyaan_id' => $assessment_pertanyaan->id,
                'jawaban' => $jawaban,
                'status_jawaban' => $request->status_jawaban[$index],
                'poin' => $request->poin[$index],
            ]);
        }

        return redirect()->route('assessment_pertanyaan.index')->with('success', 'Pertanyaan Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(AssessmentPertanyaan $assessment_pertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AssessmentPertanyaan $assessment_pertanyaan)
    {
        // Ambil data pertanyaan yang akan diedit beserta jawabannya
        $pertanyaan = AssessmentPertanyaan::with('assessment_jawaban')->find($assessment_pertanyaan->id);
        $assessment_sub_kategori = AssessmentSubKategori::all(); // Misalnya Anda mengambil semua data sub kategori dari model AssessmentSubKategori
        $jumlah_jawaban = AssessmentJawaban::where('assessment_pertanyaan_id', $assessment_pertanyaan->id)->count();
        // dd($assessment_jawaban)

        return view('admin.assessment_pertanyaan.edit', compact('pertanyaan', 'assessment_sub_kategori', 'jumlah_jawaban'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssessmentPertanyaan $assessment_pertanyaan)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'jumlah_jawaban' => 'required|integer|min:1',
            'jawaban' => 'required|array|min:' . $request->jumlah_jawaban,
            'jawaban.*' => 'required|string',
            'status_jawaban' => 'required|array|size:' . $request->jumlah_jawaban,
            'status_jawaban.*' => 'required|in:TRUE,FALSE',
            'poin' => 'required|array|size:' . $request->jumlah_jawaban,
            'poin.*' => 'required|integer',
        ]);

        // Update data pertanyaan
        $assessment_pertanyaan->update([
            'pertanyaan' => $request->pertanyaan,
        ]);

        // Update atau tambahkan data jawaban
        foreach ($request->jawaban as $index => $jawaban) {
            $jawabanModel = AssessmentJawaban::updateOrCreate(
                ['id' => $request->jawaban_id[$index]],
                ['jawaban' => $jawaban, 'status_jawaban' => $request->status_jawaban[$index], 'poin' => $request->poin[$index]]
            );
        }

        return redirect()->route('assessment_pertanyaan.index')->with('success', 'Pertanyaan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssessmentPertanyaan $assessment_pertanyaan)
    {
        $assessment_pertanyaan->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
