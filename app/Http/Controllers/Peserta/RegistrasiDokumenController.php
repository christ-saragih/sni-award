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
    public function store(Request $request)
    {
        // Validate the request
        // $request->validate([
        //     'url_dokumen.*' => 'required|file|mimes:pdf',
        // ]);

        $user = Auth::guard('peserta')->user();
        $tahun_sni = Konfigurasi::where('key', 'Tahun SNI Award')->distinct()->pluck('value')->first();
        $registrasi = Registrasi::where('peserta_id', $user->id)
            ->where('tahun', $tahun_sni)->first();

        foreach ($request->file('url_dokumen') as $iteration => $dokumen) {
            $existingDocument = RegistrasiDokumen::where('registrasi_id', $registrasi->id)
                ->where('dokumen_id', $iteration + 1)
                ->first();

            // Delete existing document if it exists
            if ($existingDocument) {
                $existing_document_path = str_replace('/storage', '', $existingDocument->url_dokumen);
                if (File::exists(storage_path("app/public/$existing_document_path"))) {
                    File::delete(storage_path("app/public/$existing_document_path"));
                }
            }

            // Create a new file name and move the uploaded file
            $nama_file_dokumen = 'dokumen_' . now()->format('YmdHis') . '.' . $dokumen->getClientOriginalExtension();
            $directory_path = storage_path("app/public/Peserta/registrasi/dokumen/$user->id");
            $dokumen->move($directory_path, $nama_file_dokumen);
            $url_dokumen = "/storage/Peserta/registrasi/dokumen/$user->id/$nama_file_dokumen";

            // Update or create the RegistrasiDokumen entry
            if ($existingDocument) {
                $existingDocument->update([
                    'url_dokumen' => $url_dokumen,
                    'feedback' => 'Updated document',
                    'status' => 'proses',
                ]);
            } else {
                RegistrasiDokumen::create([
                    'registrasi_id' => $registrasi->id,
                    'dokumen_id' => $iteration + 1,
                    'url_dokumen' => $url_dokumen,
                    'feedback' => 'New document',
                    'status' => 'proses',
                ]);
            }
        }

        return redirect()->back()->with('success', 'Registrasi Dokumen berhasil');
    }
}

