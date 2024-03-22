<?php

namespace Database\Seeders;

use App\Models\PesertaProfil;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PesertaProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PesertaProfil::create([
            'peserta_id' => 1,
            'url_legalitas_hukum_organisasi' => 'https://example.com/legalitas',
            'url_sppt_sni' => 'https://example.com/sppt',
            'url_sk_kemenkumham' => 'https://example.com/sk-kemenkumham',
            'url_kewenangan_kebijakan' => 'https://example.com/kewenangan-kebijakan',
            'jabatan_tertinggi' => 'CEO',
            'no_hp' => '1234567890',
            'website' => 'https://example.com',
            'tanggal_beroperasi' => Carbon::now(),
            'status_kepemilikan_id' => 1,
            'jenis_produk' => 'barang',
            'deskripsi_produk' => 'Dummy product description',
            'lembaga_sertifikasi_id' => 1,
            'produk_export' => true,
            'negara_tujuan_ekspor' => 'United States',
            'sektor_kategori_organisasi_id' => 1,
            'kekayaan_bersih' => '1000000',
            'hasil_penjualan_tahunan' => '5000000',
            'jenis_organisasi' => 'induk',
            'kewenangan_kebijakan' => 'Dummy policy authority',
            'created_by' => 1,
            'updated_by' => 1,
            'role_by' => 'User',
        ]);
    }
}