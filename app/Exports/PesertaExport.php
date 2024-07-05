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
use Maatwebsite\Excel\Concerns\WithHeadings;

class PesertaExport implements FromCollection, WithHeadings
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
        // $kontakArray = [];
        if ($data->peserta->peserta_kontak) {
            $counter = 1; // Counter untuk nomor kontak

            foreach ($data->peserta->peserta_kontak as $kontak) {
                $labelKontak = 'Kontak ' . $counter++;

                $detailPesertaProfile[] = [
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
                    'Label Kontak' => $labelKontak,
                    'Nama Kontak' => $kontak->nama ?? '',
                    'No HP Kontak' => $kontak->no_hp ?? '',
                    'Jabatan Kontak' => $kontak->jabatan ?? '',
                ];
            }
        } else {
            $detailPesertaProfile[] = [
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
                'Nama Kontak' => '',
                'No HP Kontak' => '',
                'Jabatan Kontak' => '',
                'Label Kontak' => '',
            ];
        }
    }
    dd($detailPesertaProfile);

    return new Collection($detailPesertaProfile);
}


    /**
     * @return array
     */
    public function headings(): array
    {
        return [
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
            'Tipe',
            'Kontak',
            'Nama Kontak',
            'No HP Kontak',
            'Jabatan Kontak',
        ];
    }
}
