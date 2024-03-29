<?php

namespace Database\Factories;

use App\Models\LembagaSertifikasi;
use App\Models\Peserta;
use App\Models\StatusKepemilikan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PesertaProfil>
 */
class PesertaProfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pesertaId = 1;
        return [
            // 'peserta_id' => function () {
            //     return factory(Peserta::class)->create()->id;
            // },
            'peserta_id' => Peserta::factory(),
            'url_legalitas_hukum_organisasi' => fake()->url(),
            'url_sppt_sni' => fake()->url(),
            'url_sk_kemenkumham' => fake()->url(),
            'url_kewenangan_kebijakan' => fake()->url(),
            'jabatan_tertinggi' => fake()->randomElement(['Manager', 'Supervisor', 'Staff']),
            'no_hp' => fake()->phoneNumber(),
            'website' => fake()->url(),
            'tanggal_beroperasi' => fake()->date(),
            'status_kepemilikan_id' => 1,
            // 'status_kepemilikan_id' => StatusKepemilikan::factory(),
            'jenis_produk' => fake()->randomElement(['barang','jasa','pendidikan']),
            'deskripsi_produk' => fake()->paragraph(1),
            'lembaga_sertifikasi_id' => 1,
            // 'lembaga_sertifikasi_id' => LembagaSertifikasi::factory(),
            'produk_export' => fake()->boolean(),
            'negara_tujuan_ekspor' => fake()->country(),
            'sektor_kategori_organisasi_id' => 1,
            // 'sektor_kategori_organisasi_id' => ,
            'kekayaan_bersih' => fake()->paragraph(1),
            'hasil_penjualan_tahunan' => fake()->currencyCode(),
            'jenis_organisasi' => fake()->randomElement(['induk', 'cabang', 'anak', 'tidak']),
            'kewenangan_kebijakan' => fake()->paragraph(1),
        ];
    }
}
