<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\BeritaTag;
use App\Models\TagBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }
    public function getTagBerita(){
        $tag_berita = [];
        $tag_berita = TagBerita::where('nama', 'LIKE', '%'.request('q').'%')->paginate(10);

        return response()->json($tag_berita);
    }

    public function index()
    {
        $berita = Berita::all();
        $tag_berita = TagBerita::all();
        // dd($berita);
        return view('admin.berita.index',compact(['berita','tag_berita']));
    }

    public function create()
    {
        $tag_berita = TagBerita::all();
        // dd($kategori);
        return view('admin.berita.berita.create', compact(['tag_berita']));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'kategori_berita_id' => 'required',
            'judul_berita' =>'required|max:100',
            'deskripsi' => 'required|min:5',
            'tanggal' => 'required|date',
            'file_gambar' => 'required|image',
            'tag_berita' => 'required|array',
        ], [
            // 'kategori_berita_id.required' => 'Kategori Berita Wajib Diisi!',
            'judul_berita.required' => 'Judul Berita Wajib Diisi!',
            'judul_berita.max' => 'Judul Berita Maksimal 100 Karakter!',
            'deskripsi.required' => 'Deskripsi Berita Wajib Diisi!',
            'deskripsi.min' => 'Deskripsi Berita Minimal 100 Karakter!',
            'tanggal.required'=> 'Tanggal Berita Wajib Diisi!',
            'tanggal.date' => 'Tanggal Berita Harus Berformat Tanggal!',
            'file_gambar.required' => 'FIle Wajib Diisi!',
            'file_gambar.image' => 'File yang di Upload Harus Berupa Gambar',
            'tag_berita.required' => 'Tag Berita Wajib Dipilih!',
            'tag_berita.array' => 'Tag Berita Harus Berupa Array!',
        ]);

        $gambar_file = $request->file('file_gambar');
        // dd($gambar_file->getClientOriginalExtension());
        $gambar_ekstensi = $gambar_file->extension();
        $nama_file = date('ymdhis') . '.' . $gambar_ekstensi;
        $gambar_file->move(public_path('gambar/gambar_berita'), $nama_file);

        $berita = Berita::create([
            'user_id' => auth()->user()->id,
            'slug' => Str::slug($request->judul_berita, '-'),
            'judul_berita'=> $request->judul_berita,
            'deskripsi'=> $request->deskripsi,
            'tanggal'=> $request->tanggal,
            'file_gambar' => $nama_file,
        ]);

        // Simpan tag-tag berita ke tabel tag_berita
        foreach ($request->tag_berita as $tagId) {
            BeritaTag::create([
                'berita_id' => $berita->id,
                'tag_id' => $tagId,
            ]);
        }

        return redirect()->route('berita.index')->with('success','Berita berhasil ditambahkan');
    }

    public function edit(Berita $berita){
        $berita->load('tag_berita');

        $tag_berita = TagBerita::all();

        return view('admin.berita.berita.edit', compact('berita', 'tag_berita'));
    }

    public function update(Request $request, Berita $berita){
        $request->validate([
            // 'kategori_berita_id' => 'required',
            'judul_berita' => 'required|max:100',
            'deskripsi' => 'required|min:5',
            'tanggal' => 'required|date',
            'file_gambar' => 'image',
            'tag_berita' => 'required|array',
        ], [
            // 'kategori_berita_id.required' => 'Kategori Berita Wajib Diisi!',
            'judul_berita.required' => 'Judul Berita Wajib Diisi!',
            'judul_berita.max' => 'Judul Berita Maksimal 100 Karakter!',
            'deskripsi.required' => 'Deskripsi Berita Wajib Diisi!',
            'deskripsi.min' => 'Deskripsi Berita Minimal 100 Karakter!',
            'tanggal.required'=> 'Tanggal Berita Wajib Diisi!',
            'tanggal.date' => 'Tanggal Berita Harus Berformat Tanggal!',
            'file_gambar.required' => 'FIle Wajib Diisi!',
            'file_gambar.image' => 'File yang di Upload Harus Berupa Gambar',
            'tag_berita.array' => 'Tag Berita Harus Berupa Array!',
        ]);

        $nama_file = $berita->file_gambar;

        if ($request->hasFile('file_gambar')) {
            $gambar_file = $request->file('file_gambar');
            $gambar_ekstensi = $gambar_file->extension();
            $nama_file = date('ymdhis') . '.' . $gambar_ekstensi;
            $gambar_file->move(public_path('gambar/gambar_berita'), $nama_file);

            if ($berita->file_gambar) {
                unlink(public_path('gambar/gambar_berita/' . $berita->file_gambar));
            }
        }

        $berita->update([
            // 'kategori_berita_id' => $request->kategori_berita_id,
            // 'slug' => $request->slug,
            'judul_berita' => $request->judul_berita,
            'deskripsi' => $request->deskripsi,
            'slug' => Str::slug($request->judul_berita, '-'),
            'tanggal' => $request->tanggal,
            'file_gambar' => $nama_file,
        ]);

        $berita->tag_berita()->detach();

        foreach ($request->tag_berita as $tagId) {
            BeritaTag::create([
                'berita_id' => $berita->id,
                'tag_id' => $tagId,
            ]);
        }
        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(Berita $berita){
        $berita->delete();
        return redirect()->route('berita.index')->with(['success'=>'Berita berhasil dihapus']);
    }
}
