<?php

namespace App\Http\Controllers;

use App\Models\AssessmentKategori;
use App\Models\AssessmentPertanyaan;
use App\Models\AssessmentSubKategori;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->query());
        $assessment_kategori_all = AssessmentKategori::all();
        $assessment_kategori = AssessmentKategori::when($request->kategori != null, function ($query) use ($request) {
                return $query->where('nama', $request->kategori);
            })->paginate(10);
        $assessment_sub_kategori = AssessmentSubKategori::paginate(10);
        // dd($assessment_sub_kategori[0]->assessment_kategori->nama);
        // $assessment_pertanyaan = AssessmentPertanyaan::paginate(10);
        $assessment_pertanyaan = AssessmentPertanyaan::when($request->kategori != null, function ($query) use ($request) {
            return $query->whereHas('assessment_sub_kategori', function ($subQuery) use ($request) {
                return $subQuery->whereHas('assessment_kategori', function ($subQuerys) use ($request) {
                    $subQuerys->where('nama', $request->kategori);
                });
            });
        })->paginate(10);
        return view('admin.assessment.index', compact(['assessment_kategori_all', 'assessment_kategori', 'assessment_sub_kategori', 'assessment_pertanyaan']));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
