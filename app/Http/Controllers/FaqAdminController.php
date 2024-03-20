<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqAdminController extends Controller
{
    public function getFaq($id) {
        $faq = Faq::where('faq', $id)->where('pertanyaan', 'LIKE', '%'.request('q').'%')->paginate(10);

        return response()->json($faq);
    }

    public function index() {
       $faq = Faq::get();
       return view('admin.faq.index', [
        'faq' => $faq
       ]);
    }

    public function store(Request $request) {
        Faq::create([
            'pertanyaan' => $request->faq,
            'jawaban' => $request->deskripsi
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ berhasil ditambahkan');
    }

    public function edit(Faq $faq)
    {
        return response()->json($faq);
    }

    public function update(Request $request, $id){
        $faq = Faq::find($id);
        $faq->update([
            'pertanyaan' => $request->faq,
            'jawaban' => $request->deskripsi
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ berhasil diubah');
    }

    public function destroy($id){
        // dd($id);
        $faq = Faq::find($id);
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ berhasil dihapus');
    }

}
