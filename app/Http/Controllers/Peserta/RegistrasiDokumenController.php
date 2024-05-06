<?php

namespace App\Http\Controllers\Peserta;

use App\Models\RegistrasiDokumen;
use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\PesertaProfil;
use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrasiDokumenController extends Controller
{
   
    public function store(Request $request){
        // $request->validate([
        //     'url_dokumen*' => 'required|file|mimes:pdf',
        //     // 'registrasi_id.*' => 'required',
        //     // 'dokumen_id.*' => 'required',
        // ]);

        // $file_dokumen = $request->file('url_dokumen');
        // // dd($file_dokumen->getClientOriginalExtension());
        // $dokumen_ekstensi = $file_dokumen->extension();
        // $nama_file = date('ymdhis') . '.' . $dokumen_ekstensi;
        // $file_dokumen->move(public_path('gambar/gambar_berita'), $nama_file);

        $file_dokumen = $request->file('url_dokumen');
        // for ($i = 0; $i < count($request->file('url_dokumen')); $i++){
        $registrasi = Registrasi::whereAny([
            'peserta_id',
            'tahun',
        ], [
            Auth::guard('peserta')->user()->id,
            date('Y'),
        ])->first();
        // dd($request->file());
        // dd($registrasi);
        // dd($request->all());
        // dd($request->file('url_dokumen'));
        foreach ($request->file('url_dokumen') as $iteration=>$dokumen) {
            // $dokumen = $request->file('url_dokumen');
            // dd([$iteration, $dokumen]);
            // dd($request->dokumen_id[$i]);
            $nama_file_dokumen = 'dokumen_' . now()->format('YmdHis') . '.' . $dokumen->getClientOriginalName();
            $dokumen->move(public_path('file/dokumen'), $nama_file_dokumen);
            $existingDocument = RegistrasiDokumen::where('registrasi_id', $registrasi->id)
                                                ->where('dokumen_id', $iteration + 1)
                                                ->first();
            if ($existingDocument && $existingDocument->status === 'ditolak') {
                // Ubah status dokumen menjadi 'proses'
                $existingDocument->update(['status' => 'proses']);
            }
            if ($existingDocument && $existingDocument->status === 'disetujui') {
                return redirect()->back()->with('error', 'Anda tidak dapat mengunggah dokumen lagi karena dokumen telah disetujui.');
            }
           
            RegistrasiDokumen::updateOrCreate([
                'registrasi_id' => $registrasi->id,
                'dokumen_id' => $iteration+1,
                'url_dokumen' => $nama_file_dokumen,
                'feedback' => 'assdasda',
            ]);
        }

        return redirect()->back()->with('success','Registrasi Dokumen berhasil');
    }

    // public function getDokumenPeserta()
    // {
    //     $pesertaProfil = PesertaProfil::select('url_legalitas_hukum_organisasi', 'url_sppt_sni', 'url_sk_kemenkumham', 'url_kewenangan_kebijakan')->get();
    //     return response()->json($pesertaProfil);
    // }
}
