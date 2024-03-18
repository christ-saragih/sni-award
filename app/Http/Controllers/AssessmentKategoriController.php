<?php

namespace App\Http\Controllers;

use App\Models\AssessmentKategori;
use App\Models\AssessmentSubKategori;
use Illuminate\Http\Request;

class AssessmentKategoriController extends Controller
{
    public function getAssessmentKategori() {
        $assessment_kategori = AssessmentKategori::where('nama','LIKE', '%'.request('q').'%')->paginate(10);
        return response()->json($assessment_kategori);
    }
    //
    public function index()
    {
        $assessment_kategori = AssessmentKategori::get();
        $assessment_sub_kategori = AssessmentSubKategori::get();
        // dd($assessment_sub_kategori);
        return view('admin.assessment.index',[
            'assessment_kategori' => $assessment_kategori,
            'list_assessment_kategori' => $assessment_kategori,
            'assessment_sub_kategori' => $assessment_sub_kategori,
            'list_assessment_sub_kategori' => $assessment_sub_kategori,
        ]);
    }

    // public function create()
    // {
    //     return view('admin.assessment.assessment_kategori.create');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
        ]);
        AssessmentKategori::create([
            'nama' => $request->nama,
        ]);

        return redirect('/admin/assessment')->with('success','Kategori berhasil ditambahkan');
    }

    public function edit(AssessmentKategori $assessment_kategori)
    {
        return response()->json($assessment_kategori);
        // $AssessmentKategori = AssessmentKategori::find($id);
        // return view('admin.assessment.assessment_kategori.edit',[
        //     'assessment_kategori' => $AssessmentKategori
        // ]);
    }

    public function update(Request $request, $id){
        $assessment_kategori = AssessmentKategori::find($id);
        $assessment_kategori->update([
            'nama' => $request->nama,
        ]);

        return redirect('/admin/assessment')->with('success','Kategori berhasil diubah');
    }

    public function destroy($id){
        // dd($id);
        $assessment_kategori = AssessmentKategori::find($id);
        $assessment_kategori->delete();
        return redirect('/admin/assessment')->with('success','Kategori berhasil dihapus');
    }
}
