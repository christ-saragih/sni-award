<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\PesertaProfil;

class PesertaDokumenController extends Controller
{
    public function tambahDokumenPeserta(Request $request)
    {
        // Validasi request
        $request->validate([
            'url_legalitas_hukum_organisasi' => 'file|mimes:pdf|max:10000',
            'url_sppt_sni' => 'file|mimes:pdf|max:10000',
            'url_sk_kemenkumham' => 'file|mimes:pdf|max:10000',
            'url_kewenangan_kebijakan' => 'file|mimes:pdf|max:10000',
        ],[
            'url_legalitas_hukum_organisasi.mimes'  => "Ekstensi yang diperbolehkan hanya .PDF",
            'url_legalitas_hukum_organisasi.file' => "Input Harus berupa File", 
            'url_legalitas_hukum_organisasi.max' => "Ukuran file tidak boleh lebih dari 10MB", 
            'url_sppt_sni.mimes' => "Ekstensi yang diperbolehkan hanya .PDF",
            'url_sppt_sni.file' => "Input Harus berupa File", 
            'url_sppt_sni.max' => "Ukuran file tidak boleh lebih dari  10MB",
            'url_sk_kemenkumham.mimes' => "Ekstensi yang diperbolehkan hanya .PDF",
            'url_sk_kemenkumham.file' => "Input Harus berupa File", 
            'url_sk_kemenkumham.max' => "Ukuran file tidak boleh lebih dari  10MB",
            'url_kewenangan_kebijakan.mimes' => "Format File Kewenangan Kebijakan harus dalam format PDF",
            'url_kewenangan_kebijakan.file' => "Input Harus berupa File", 
            'url_kewenangan_kebijakan.max'  => "Ukuran file tidak boleh lebih dari  10MB",
        ]);

        $id = Auth::guard('peserta')->user()->id;
        $peserta_profil = PesertaProfil::where('peserta_id', $id)->first();

        $uploadedFiles = [
            'url_legalitas_hukum_organisasi' => 'legalitas',
            'url_sppt_sni' => 'Spptsni',
            'url_sk_kemenkumham' => 'kemenkumham',
            'url_kewenangan_kebijakan' => 'kewenangan'
        ];

        $updateData = [];
        foreach ($uploadedFiles as $field => $folder) {
            if ($request->hasFile($field)) {
                $existingFilePath = $peserta_profil->$field;

                if (File::exists(storage_path('app/public/' . $existingFilePath))) {
                    File::delete(storage_path('app/public/' . $existingFilePath)); // hapus file sebelumnya jika ada
                }

                $fileName = time() . '.' . $request->$field->extension();
                $request->$field->move(storage_path('app/public/dokumen/' . $folder . '/' . $id), $fileName);
                $updateData[$field] = '/storage/dokumen/' . $folder . '/' . $id . '/' . $fileName;
            }
        }

        if (!empty($updateData)) {
            $peserta_profil->update($updateData);
            return back()->with('success', 'Dokumen berhasil diunggah dan disimpan.');
        }

        return back()->withErrors('Gagal mengunggah dokumen. Pastikan semua dokumen diunggah.');
    }
}
