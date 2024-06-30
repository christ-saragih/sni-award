<?php

namespace App\Exports;

use App\Models\PesertaProfil;
use App\Models\PesertaKontak;
use App\Models\Registrasi;
use App\Models\RegistrasiAssessment;
use App\Models\RegistrasiDokumen;
use App\Models\RegistrasiEvaluator;
use App\Models\RegistrasiPenilaian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PesertaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Contoh menggabungkan data dari model PesertaProfil
        $PesertaProfile = PesertaProfil::all();

        // Anda bisa melakukan hal yang sama untuk model lainnya dan menggabungkannya
        // Sesuaikan logika penggabungan data sesuai kebutuhan

        return $PesertaProfile; // Ganti dengan koleksi data gabungan
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Sesuaikan judul kolom sesuai dengan data yang Anda ekspor
        return [
            'ID Profil',
            'Nama',
            // Tambahkan lebih banyak judul kolom sesuai dengan data yang diekspor
        ];
    }
}