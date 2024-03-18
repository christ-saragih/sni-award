<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Dokumentasi;
use App\Models\Faq;
use App\Models\Frontpage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FrontPageController extends Controller
{
    public function index() {
        $frontpage = Frontpage::get();
        $faq = Faq::where('is_popular',  true)->get();
        $unpopular_faq = Faq::where('is_popular', false)->get();
        $dokumentasi = Dokumentasi::get();
        return view('admin.front_page.frontpage', [
            'frontpage' => $frontpage[0],
            'popular_faq' => $faq,
            'faq' => $unpopular_faq,
            'dokumentasi' => $dokumentasi,
        ]);
        
    }

    public function updateFrontpageView() {
        $frontpage = Frontpage::get();
        $faq = Faq::where('is_popular',  true)->get();
        $unpopular_faq = Faq::where('is_popular', false)->get();
        $dokumentasi = Dokumentasi::get();
        return view('admin.front_page.edit.frontpage', [
            'frontpage' => $frontpage[0],
            'popular_faq' => $faq,
            'faq' => $unpopular_faq,
            'dokumentasi' => $dokumentasi,
        ]);
    }

    public function  updateFrontpage(Request $request) {
        $request->validate([
            'judul' => 'required|string',
            'keterangan_judul' => 'required|string',
            'gambar_banner' => 'image',
            'keterangan_sni' => 'required|string',
            'judul_dokumentasi' => 'required|string',
            'keterangan_dokumentasi' => 'required|string',
            'judul_konten_berita' => 'required|string',
            'keterangan_berita' => 'required|string',
            'alamat' => 'required|string',
            'website' => 'required',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'keterangan_judul.required' => 'Keterangan Judul wajib diisi',
            'gambar_banner.image' => 'File harus berupa gambar',
            'keterangan_sni.required' => 'Keterangan Sni wajib diisi',
            'judul_dokumentasi.required' => 'Judul Dokumentasi wajib diisi',
            'keterangan_dokumentasi.required' => 'Keterangan Dokumentasi wajib diisi',
            'judul_konten_berita.required' => 'Judul Konten Berita  wajib diisi',
            'keterangan_berita.required' => 'Keterangan  Berita wajib diisi',
            'alamat.required' => 'Alamat wajib diisi', 
            'website.required' => 'Website wajib diisi',
        ]);
        $id = Frontpage::get()[0]->id;
        $frontpage = Frontpage::find($id);
        $gambar_banner = $frontpage->get()->value('gambar_banner');
        if($request->hasFile('gambar_banner')) {
            $prevImgPath = public_path('assets'.$frontpage->get()->value('gambar_banner'));
            if (File::exists($prevImgPath)) {
                File::delete($prevImgPath); //hapus gambar sebelumnya jika ada
            }

            $imageName = time().'.'.$request->gambar_banner->extension();    
            $request->gambar_banner->move(public_path('assets/images/jumbotron'), $imageName); //move file ke assets
            // $request->gambar_banner->store
            $gambar_banner = '/images/jumbotron/'.$imageName;
        }
        $dataFrontpage = [
            'judul' => $request->judul,
            'keterangan_judul' => $request->keterangan_judul,
            'gambar_banner' => $gambar_banner,
            'keterangan_sni' => $request->keterangan_sni,
            'judul_dokumentasi' => $request->judul_dokumentasi,
            'keterangan_dokumentasi' => $request->keterangan_dokumentasi,
            'judul_konten_berita' => $request->judul_konten_berita,
            'keterangan_berita' => $request->keterangan_berita,
            'alamat' => $request->alamat,
            'website' => $request->website,
        ];
        $frontpage->update($dataFrontpage);
        return redirect('/admin/frontpage')->with('success', 'Berhasil memperbarui halaman depan');
    }

    public function removePopularFaq($id) {
        $faq = Faq::find($id);
        $data = [
            'is_popular' => false,
        ];
        $faq->update($data);
        return back();
    }

    public function addPopularFaq($id) {
        if (count(Faq::where('is_popular', false)->get()) < 3) {
            $faq = Faq::find($id);
            $data = [
                'is_popular' => true,
            ];
            $faq->update($data);
            return back();
        }
        return back()->withErrors('Jumlah FAQ populer sudah mencapai batas maksimal');
    }

    public function hapusDokumentasi($id) {
        $dokumentasi = Dokumentasi::where('id', $id);
        $prevDokumentasi = public_path('assets'.$dokumentasi->get()->value('url_dokumentasi'));
        if (File::exists($prevDokumentasi)) {
            File::delete($prevDokumentasi);
        }
        $dokumentasi->delete();
        return back();
    }

    public function tambahDokumentasi(Request $request)  {
        $jumlahDokumentasi = count(Dokumen::get());
        $maksimalDokumentasi = 10 - $jumlahDokumentasi;
        $request->validate([
            'url_dokumentasi.*' => 'image',
            'url_dokumentasi' => 'required|max:'.strval($maksimalDokumentasi),
        ], [
            'url_dokumentasi.required' => 'Harap masukkan file',
            'url_dokumentasi.image' => 'File harus berupa gambar',
            'url_dokumentasi.max' => 'Maksimal gambar dokumentasi adalah 10',
        ]);
        if ($request->hasFile('url_dokumentasi')) {
            $dok = $request->url_dokumentasi;
            for ($i=0; $i<count($dok); $i++) {
                $imageName = time().$i.'.'.$dok[$i]->extension();
                $dok[$i]->move(public_path('assets/images/dokumentasi'), $imageName);
                Dokumentasi::create(['url_dokumentasi' => '/images/dokumentasi/'.$imageName]);
            }
            return back();
        }
        return back()->withErrors('Gagal  menyimpan foto dokumentasi');
    }
}
