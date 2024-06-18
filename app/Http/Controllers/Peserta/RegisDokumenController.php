<?php

namespace App\Http\Controllers\Peserta;

use App\Models\RegistrasiDokumen;
use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Konfigurasi;
use App\Models\PesertaProfil;
use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class RegistrasiDokumenController extends Controller
{

    public function store(Request $request){
        // $request->validate([
        //     'url_dokumen*' => 'required|file|mimes:pdf',
        //     // 'registrasi_id.*' => 'required',
        //     // 'dokumen_id.*' => 'required',
        // ]);
        
        $user = Auth::guard('peserta')->user();
        $file_dokumen = $request->file('url_dokumen');
        $tahun_sni = Konfigurasi::where('key', 'Tahun SNI Award')->distinct()->pluck('value')->first();
        $registrasi = Registrasi::where('peserta_id', $user->id)
            ->where('tahun', $tahun_sni)->first();
        
        foreach ($request->file('url_dokumen') as $iteration=>$dokumen) {
            $existingDocument = RegistrasiDokumen::where('registrasi_id', $registrasi->id)
                ->where('dokumen_id', $iteration + 1)
                ->first();

            if ($existingDocument) {
                $existing_document_path = str_replace('/storage', '', $existingDocument->url_dokumen);
                if (File::exists(storage_path("app/public/$existing_document_path"))) {
                    File::delete(storage_path("app/public/$existing_document_path"));
                }
            }
            
            $nama_file_dokumen = 'dokumen_' . now()->format('YmdHis') . '.' . $dokumen->hashName();
            $directory_path = storage_path("app/public/Peserta/registrasi/dokumen/$user->id");
            $dokumen->move($directory_path, $nama_file_dokumen);
            if ($existingDocument && $existingDocument->status === 'ditolak') {
                // Ubah status dokumen menjadi 'proses'
                $existingDocument->update([
                    'dokumen_id' => $iteration+1,
                    'url_dokumen' => "/storage/Peserta/registrasi/dokumen/$user->id/$nama_file_dokumen",
                    // 'feedback' => 'assdasda',
                    'status' => 'proses',
            ]);
            } elseif ($existingDocument && $existingDocument->status === 'disetujui') {
                return redirect()->back()->with('error', 'Anda tidak dapat mengunggah dokumen lagi karena dokumen telah disetujui.');
            } else {
                RegistrasiDokumen::create([
                    'registrasi_id' => $registrasi->id,
                    'dokumen_id' => $iteration+1,
                    'url_dokumen' => "/storage/Peserta/registrasi/dokumen/$user->id/$nama_file_dokumen",
                    // 'feedback' => 'assdasda',
                    'status' => 'proses',
                ]);
            }

        }

        return redirect()->back()->with('success','Registrasi Dokumen berhasil');
    }
}
