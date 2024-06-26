<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\DokumentasiAcara;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $acara = Acara::simplePaginate(3);
        $acara = Acara::paginate(10);
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
            'judul_acara' => 'required|max:100',
            'gambar_thumbnail' => 'required|image',
            'gambar_konten.*' => 'required|image',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|min:5',
        ], [
            'judul_acara.required' => 'Judul Acara Wajib Diisi!',
            'judul_acara.max' => 'Judul Acara Maksimal 100 Karakter!',
            'gambar_thumbnail.required' => 'File Wajib Diisi!',
            'gambar_thumbnail.image' => 'File thumbnail yang di Upload Harus Berupa Gambar',
            'gambar_konten.*.required' => 'File Wajib Diisi!',
            'gambar_konten.*.image' => 'File konten yang di Upload Harus Berupa Gambar',
            'tanggal.required'=> 'Tanggal Acara Wajib Diisi!',
            'tanggal.date' => 'Tanggal Acara Harus Berformat Tanggal!',
            'deskripsi.required' => 'Deskripsi Acara Wajib Diisi!',
            'deskripsi.min' => 'Deskripsi Acara Minimal 5 Karakter!',
        ]);

        // Upload gambar thumbnail dengan nama yang unik
        $gambar_thumbnail = $request->file('gambar_thumbnail');
        $nama_gambar_thumbnail = 'thumbnail_' . now()->format('YmdHis') . '.' . $gambar_thumbnail->getClientOriginalExtension();
        $gambar_thumbnail->move(storage_path('app/public/images/acara/thumbnail_acara/'), $nama_gambar_thumbnail);
        // $gambar_thumbnail->move(public_path('gambar/thumbnail_acara'), $nama_gambar_thumbnail);

        // Upload gambar konten dengan nama yang unik
        $nama_gambar_konten = [];
        foreach ($request->file('gambar_konten') as $file) {
            $nama_gambar = 'konten_' . now()->format('YmdHis') . '_' . $file->getClientOriginalName();
            $file->move(storage_path('app/public/images/acara/konten_acara/'), $nama_gambar);
            // $file->move(public_path('gambar/konten_acara'), $nama_gambar);
            $nama_gambar_konten[] = $nama_gambar;
        }

        // Simpan data acara
        $acara = Acara::create([
            'judul_acara' => $request->judul_acara,
            'slug' => Str::slug($request->judul_acara, '-'),
            'gambar_thumbnail' => $nama_gambar_thumbnail,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
        ]);

        // Simpan data dokumentasi acara
        foreach ($nama_gambar_konten as $gambar_konten) {
            DokumentasiAcara::create([
                'acara_id' => $acara->id,
                'gambar_konten' => $gambar_konten,
            ]);
        }

        return redirect()->route('acara.index')->with('success', 'Acara berhasil ditambahkan');
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
        // dd($dokumentasi_acara);

        return view('admin.acara.edit', compact(['acara', 'dokumentasi_acara']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acara $acara)
    {
        $request->validate([
            'judul_acara' => 'required|max:100',
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
            'deskripsi.min' => 'Deskripsi Acara Minimal 5 Karakter!',
        ]);

        $nama_gambar_thumbnail = $acara->gambar_thumbnail;
        // dd($nama_gambar_thumbnail);

        // Upload gambar thumbnail baru jika ada
        if ($request->hasFile('gambar_thumbnail')) {
            $gambar_thumbnail = $request->file('gambar_thumbnail');
            $nama_gambar_thumbnail = 'thumbnail_' . now()->format('YmdHis') . '.' . $gambar_thumbnail->getClientOriginalExtension();
            $gambar_thumbnail->move(storage_path('app/public/images/acara/thumbnail_acara/'), $nama_gambar_thumbnail);
            // $acara->update(['gambar_thumbnail' => $nama_gambar_thumbnail]);
            if ($acara->gambar_thumbnail) {
                unlink(storage_path('app/public/images/acara/thumbnail_acara/' . $acara->gambar_thumbnail));
            }
        }

        // Update data acara
        $acara->update([
            'judul_acara' => $request->judul_acara,
            'slug' => Str::slug($request->judul_acara, '-'),
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'gambar_thumbnail' => $nama_gambar_thumbnail,
        ]);

        // Upload gambar konten baru jika ada
        if ($request->hasFile('gambar_konten')) {
            $nama_gambar_konten = [];

            // Ambil semua gambar konten lama dari database
            $gambar_konten_lama = DokumentasiAcara::where('acara_id', $acara->id)->pluck('gambar_konten')->toArray();

            foreach ($request->file('gambar_konten') as $file) {
                $nama_gambar = 'konten_' . now()->format('YmdHis') . '_' . $file->getClientOriginalName();
                $file->move(storage_path('app/public/images/acara/konten_acara/'), $nama_gambar);
                $nama_gambar_konten[] = $nama_gambar;
            }

            // Hapus dokumen acara yang ada dari database
            DokumentasiAcara::where('acara_id', $acara->id)->delete();

            // Hapus file gambar konten lama dari storage
            foreach ($gambar_konten_lama as $gambar_konten_lama_path) {
                $file_path = storage_path('app/public/images/acara/konten_acara/' . $gambar_konten_lama_path);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            // Simpan gambar konten baru ke database
            foreach ($nama_gambar_konten as $gambar_konten) {
                DokumentasiAcara::create([
                    'acara_id' => $acara->id,
                    'gambar_konten' => $gambar_konten,
                ]);
            }
        }

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
