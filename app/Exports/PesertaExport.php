<?php

namespace App\Exports;

use App\Models\PesertaProfil;
use App\Models\PesertaKontak;
use App\Models\Registrasi;
use App\Models\RegistrasiAssessment;
use App\Models\RegistrasiDokumen;
use App\Models\RegistrasiEvaluator;
use App\Models\RegistrasiPenilaian;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PesertaExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $PesertaProfile = Registrasi::all();

        $nomor = 1;
        $detailPesertaProfile = [];

        foreach ($PesertaProfile as $data) {
            $kontakArray = [];
            $assessmentArray = [];
            $penilaianArray = [];
            $maxContacts = 2; // Tentukan jumlah maksimum kontak yang akan diambil

            if ($data->peserta->peserta_kontak) {
                $counter = 1; // Counter untuk nomor kontak

                foreach ($data->peserta->peserta_kontak as $kontak) {
                    if ($counter > $maxContacts) break; // Hentikan setelah mencapai maksimum
                    $kontakArray["Nama Kontak $counter"] = $kontak->nama ?? '';
                    $kontakArray["No HP Kontak $counter"] = $kontak->no_hp ?? '';
                    $kontakArray["Jabatan Kontak $counter"] = $kontak->jabatan ?? '';
                    $counter++;
                }

                // Isi kekurangan data kontak dengan string kosong
                while ($counter <= $maxContacts) {
                    $kontakArray["Nama Kontak $counter"] = '';
                    $kontakArray["No HP Kontak $counter"] = '';
                    $kontakArray["Jabatan Kontak $counter"] = '';
                    $counter++;
                }
            } else {
                // Isi semua data kontak dengan string kosong jika tidak ada kontak
                for ($i = 1; $i <= $maxContacts; $i++) {
                    $kontakArray["Nama Kontak $i"] = '';
                    $kontakArray["No HP Kontak $i"] = '';
                    $kontakArray["Jabatan Kontak $i"] = '';
                }
            }

            // if ($data->registrasi_assessment) {
            //     $counter = 1; // Counter untuk nomor kontak

            //     foreach ($data->registrasi_assessment as $assessment) {
            //         if ($counter > $data->registrasi_assessment->count()) break; // Hentikan setelah mencapai maksimum
            //         $assessmentArray["kategori_$counter"] = $assessment->assessment_jawaban->assessment_pertanyaan->assessment_sub_kategori->assessment_kategori->nama ?? '';
            //         $assessmentArray["sub kategori_$counter"] = $assessment->assessment_jawaban->assessment_pertanyaan->assessment_sub_kategori->nama ?? '';
            //         $assessmentArray["pertanyaan_$counter"] = $assessment->assessment_jawaban->assessment_pertanyaan->pertanyaan ?? '';
            //         $assessmentArray["jawaban_$counter"] = $assessment->assessment_jawaban->jawaban ?? '';
            //         $counter++;
            //     }

            //     // Isi kekurangan data kontak dengan string kosong
            //     while ($counter <= $data->registrasi_assessment->count()) {
            //         $assessmentArray["kategori_$counter"] = '';
            //         $assessmentArray["sub kategori_$counter"] = '';
            //         $assessmentArray["pertanyaan_$counter"] = '';
            //         $assessmentArray["jawaban_$counter"] = '';
            //         $counter++;
            //     }
            // } else {
            //     // Isi semua data kontak dengan string kosong jika tidak ada kontak
            //     for ($i = 1; $i <= $data->registrasi_assessment->count(); $i++) {
            //         $assessmentArray["kategori_$i"] = '';
            //         $assessmentArray["sub kategori_$i"] = '';
            //         $assessmentArray["pertanyaan_$i"] = '';
            //         $assessmentArray["jawaban_$i"] = '';
            //     }
            // }

            if ($data->registrasi_penilaian) {
                $counter = 1; // Counter untuk nomor kontak

                foreach ($data->registrasi_penilaian as $penilaian) {
                    if ($counter > $data->registrasi_penilaian->count()) break; // Hentikan setelah mencapai maksimum
                    $penilaianArray["Nama_$counter"] = $penilaian->user->name ?? '';
                    $penilaianArray["Jabatan_$counter"] = $penilaian->jabatan ?? '';
                    $penilaianArray["Stage_$counter"] = $penilaian->stage->nama ?? '';
                    $penilaianArray["Nilai_$counter"] = $penilaian->skor ?? '';
                    $penilaianArray["Catatan_$counter"] = $penilaian->catatan ?? '';
                    $counter++;
                }

                // Isi kekurangan data kontak dengan string kosong
                while ($counter <= $data->registrasi_penilaian->count()) {
                    $penilaianArray["kategori_$counter"] = '';
                    $penilaianArray["Jabatan_$counter"] = '';
                    $penilaianArray["Stage_$counter"] = '';
                    $penilaianArray["Nilai_$counter"] = '';
                    $penilaianArray["Catatan_$counter"] = '';
                    $counter++;
                }
            } else {
                // Isi semua data kontak dengan string kosong jika tidak ada kontak
                for ($i = 1; $i <= $data->registrasi_penilaian->count(); $i++) {
                    $penilaianArray["kategori_$i"] = '';
                    $penilaianArray["Jabatan_$i"] = '';
                    $penilaianArray["Stage_$i"] = '';
                    $penilaianArray["Nilai_$i"] = '';
                    $penilaianArray["Catatan_$i"] = '';
                }
            }

            // dd($penilaianArray);

            // dd($data->registrasi_assessment[0]->assessment_jawaban->assessment_pertanyaan->assessment_sub_kategori->assessment_kategori->nama);
            // dd($data->registrasi_assessment->count());
            // if ($data->registrasi_assessment) {
            //     foreach ($data->registrasi_assessment as $assessment) {
            //         $assessmentArray = [
            //             "Kategori" => $assessment->assessment_jawaban->assessment_pertanyaan->assessment_sub_kategori->assessment_kategori->nama,
            //             "Sub Kategori" => $assessment->assessment_jawaban->assessment_pertanyaan->assessment_sub_kategori->nama,
            //             "Pertanyaan" => $assessment->assessment_jawaban->assessment_pertanyaan->pertanyaan,
            //             "Jawaban" => $assessment->assessment_jawaban->jawaban,
            //         ];
            //     }
            // }

            // dd($assessmentArray);

            $detailPesertaProfile[] = array_merge([
                'No' => $nomor++,
                'Nama' => $data->peserta->nama ?? '',
                'Email' => $data->peserta->email ?? '',
                'Status' => $data->peserta->status ?? '',
                'Kategori Organisasi' => $data->peserta->kategori_organisasi->nama ?? '',
                'Jabatan Tertinggi' => $data->peserta->peserta_profil->jabatan_tertinggi ?? '',
                'No HP' => $data->peserta->peserta_profil->no_hp ?? '',
                'Website' => $data->peserta->peserta_profil->website ?? '',
                'Tanggal Beroperasi' => $data->peserta->peserta_profil->tanggal_beroperasi ?? '',
                'Status Kepemilikan' => $data->peserta->peserta_profil->status_kepemilikan->nama ?? '',
                'Jenis Produk' => $data->peserta->peserta_profil->jenis_produk ?? '',
                'Lembaga Sertifikasi' => $data->peserta->peserta_profil->lembaga_sertifikasi->nama ?? '',
                'Produk Export' => $data->peserta->peserta_profil->produk_export ?? '',
                'Negara Tujuan Ekspor' => $data->peserta->peserta_profil->negara_tujuan_ekspor ?? '',
                'Kekayaan Bersih' => $data->peserta->peserta_profil->kekayaan_bersih ?? '',
                'Hasil Penjualan Tahunan' => $data->peserta->peserta_profil->hasil_penjualan_tahunan ?? '',
                'Jenis Organisasi' => $data->peserta->peserta_profil->jenis_organisasi ?? '',
                'Kewenangan Kebijakan' => $data->peserta->peserta_profil->kewenangan_kebijakan ?? '',
                'Propinsi' => $data->peserta->peserta_alamat->propinsi->propinsi ?? '',
                'Kota' => $data->peserta->peserta_alamat->kota->kota ?? '',
                'Kecamatan' => $data->peserta->peserta_alamat->kecamatan->kecamatan ?? '',
                'Alamat' => $data->peserta->peserta_alamat->alamat ?? '',
                'Kode Pos' => $data->peserta->peserta_alamat->kode_pos ?? '',
                'Tipe' => $data->peserta->peserta_alamat->tipe ?? '',
            ], $kontakArray, $penilaianArray);
        }

        return new Collection($detailPesertaProfile);
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        $PesertaProfile = Registrasi::with('peserta.peserta_kontak')->get();
        // $AssessmenProfile = Registrasi::with('registrasi_assessment')->get();
        $PenilaianProfile = Registrasi::with('registrasi_penilaian')->get();

        // Find the maximum number of contacts
        $maxContacts = 0;
        foreach ($PesertaProfile as $data) {
            $countContacts = $data->peserta->peserta_kontak ? $data->peserta->peserta_kontak->count() : 0;
            if ($countContacts > $maxContacts) {
                $maxContacts = $countContacts;
            }
        }

        // $maxAssessment = 0;
        // foreach ($AssessmenProfile as $data) {
        //     $countAssessments = $data->registrasi_assessment ? $data->registrasi_assessment->count() : 0;
        //     if ($countAssessments > $maxAssessment) {
        //         $maxAssessment = $countAssessments;
        //     }
        // }

        $maxPenilian = 0;
        foreach ($PenilaianProfile as $data) {
            $countPenilaian = $data->registrasi_penilaian ? $data->registrasi_penilaian->count() : 0;
            if ($countPenilaian > $maxPenilian) {
                $maxPenilian = $countPenilaian;
            }
        }

        $headings = [
            'No',
            'Nama',
            'Email',
            'Status',
            'Kategori Organisasi',
            'Jabatan Tertinggi',
            'No HP',
            'Website',
            'Tanggal Beroperasi',
            'Status Kepemilikan',
            'Jenis Produk',
            'Lembaga Sertifikasi',
            'Produk Export',
            'Negara Tujuan Ekspor',
            'Kekayaan Bersih',
            'Hasil Penjualan Tahunan',
            'Jenis Organisasi',
            'Kewenangan Kebijakan',
            'Propinsi',
            'Kota',
            'Kecamatan',
            'Alamat',
            'Kode Pos',
            'Tipe'
        ];

        // Add headings for the maximum number of contacts found
        for ($i = 1; $i <= $maxContacts; $i++) {
            $headings[] = "Nama Kontak $i";
            $headings[] = "No HP Kontak $i";
            $headings[] = "Jabatan Kontak $i";
        }

        // for ($i = 1; $i <= $maxAssessment; $i++) {
        //     $headings[] = "Kategori";
        //     $headings[] = "SubKategori";
        //     $headings[] = "Pertanyaan";
        //     $headings[] = "Jawaban";
        // }

        for ($i = 1; $i <= $maxPenilian; $i++) {
            $headings[] = "Nama";
            $headings[] = "Jabatan";
            $headings[] = "Stage";
            $headings[] = "Nilai";
            $headings[] = "Catatan";
        }

        return $headings;
    }
}
