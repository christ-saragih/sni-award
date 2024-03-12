<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\DokumentasiAcara;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acara = Acara::all();
        return view('admin.acara.index', compact(['acara']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.acara.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_acara' =>'required|max:100',
            'gambar_thumbnail' => 'required|image',
            'gambar_konten.*' => 'required|image',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|min:5',
        ], [
            'judul_acara.required' => 'Judul Acara Wajib Diisi!',
            'judul_acara.max' => 'Judul Acara Maksimal 100 Karakter!',
            'gambar_thumbnail.required' => 'FIle Wajib Diisi!',
            'gambar_thumbnail.image' => 'File thumbnail yang di Upload Harus Berupa Gambar',
            'gambar_konten.*.required' => 'FIle Wajib Diisi!',
            'gambar_konten.*.image' => 'File konten yang di Upload Harus Berupa Gambar',
            'tanggal.required'=> 'Tanggal Acara Wajib Diisi!',
            'tanggal.date' => 'Tanggal Acara Harus Berformat Tanggal!',
            'deskripsi.required' => 'Deskripsi Acara Wajib Diisi!',
            'deskripsi.min' => 'Deskripsi Acara Minimal 100 Karakter!',
        ]);

        $gambar_thumbnail = $request->file('gambar_thumbnail');
        // dd($gambar_thumbnail->getClientOriginalExtension());
        $gambar_thumbnail_ekstensi = $gambar_thumbnail->extension();
        $nama_gambar_thumbnail = date('ymdhis') . '.' . $gambar_thumbnail_ekstensi;
        $gambar_thumbnail->move(public_path('gambar/thumbnail_acara'), $nama_gambar_thumbnail);

        $nama_gambar_konten = [];
        foreach ($request->file('gambar_konten') as $file) {
            $gambar_konten_ekstensi = $file->extension();
            $nama_gambar_konten[] = date('ymdhis') . '.' . $gambar_konten_ekstensi;
            $file->move(public_path('gambar/konten_acara'), end($nama_gambar_konten));
        }

        $acara = Acara::create([
            'judul_acara'=> $request->judul_acara,
            'gambar_thumbnail' => $nama_gambar_thumbnail,
            'tanggal'=> $request->tanggal,
            'deskripsi'=> $request->deskripsi,
        ]);

        foreach ($nama_gambar_konten as $ngk) {
            DokumentasiAcara::create([
                'acara_id' => $acara->id,
                'gambar_konten' => $ngk,
            ]);
        }

        return redirect()->route('acara.index')->with('success','Acara berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Acara $acara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Acara $acara)
    {
        // $acara->load('dokumentasi_acara');

        $dokumentasi_acara = DokumentasiAcara::where('acara_id', $acara->id)->get();

        return view('admin.acara.edit', compact(['acara', 'dokumentasi_acara']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acara $acara)
    {
        $request->validate([
            'judul_acara' =>'required|max:100',
            'gambar_thumbnail' => 'nullable|image',
            'gambar_konten.*' => 'nullable|image',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|min:5',
        ], [
            'judul_acara.required' => 'Judul Acara Wajib Diisi!',
            'judul_acara.max' => 'Judul Acara Maksimal 100 Karakter!',
            'gambar_thumbnail.image' => 'File thumbnail yang di Upload Harus Berupa Gambar',
            'gambar_konten.*.image' => 'File konten yang di Upload Harus Berupa Gambar',
            'tanggal.required'=> 'Tanggal Acara Wajib Diisi!',
            'tanggal.date' => 'Tanggal Acara Harus Berformat Tanggal!',
            'deskripsi.required' => 'Deskripsi Acara Wajib Diisi!',
            'deskripsi.min' => 'Deskripsi Acara Minimal 100 Karakter!',
        ]);

        $acara->judul_acara = $request->judul_acara;
        $acara->tanggal = $request->tanggal;
        $acara->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar_thumbnail')) {
            $gambar_thumbnail = $request->file('gambar_thumbnail');
            $gambar_thumbnail_ekstensi = $gambar_thumbnail->extension();
            $nama_gambar_thumbnail = date('ymdhis') . '.' . $gambar_thumbnail_ekstensi;
            $gambar_thumbnail->move(public_path('gambar/thumbnail_acara'), $nama_gambar_thumbnail);
            $acara->gambar_thumbnail = $nama_gambar_thumbnail;
        }

        if ($request->hasFile('gambar_konten')) {
            // Hapus gambar konten yang sebelumnya
            DokumentasiAcara::where('acara_id', $acara->id)->delete();

            $nama_gambar_konten = [];
            foreach ($request->file('gambar_konten') as $file) {
                $gambar_konten_ekstensi = $file->extension();
                $nama_gambar_konten[] = date('ymdhis') . '.' . $gambar_konten_ekstensi;
                $file->move(public_path('gambar/konten_acara'), end($nama_gambar_konten));
                DokumentasiAcara::create([
                    'acara_id' => $acara->id,
                    'gambar_konten' => end($nama_gambar_konten),
                ]);
            }
        }

        $acara->save();

        return redirect()->route('acara.index')->with('success', 'Acara berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acara $acara)
    {
        $acara->delete();
        return redirect()->route('acara.index')->with(['success'=>'Acara berhasil dihapus']);
    }
}
