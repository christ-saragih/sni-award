<?php

namespace Database\Factories;

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
        return [
            'peserta_id' => Peserta::factory(),
            'url_legalitas_hukum_organisasi' => fake()->url(),
            'url_sppt_sni' => fake()->url(),
            'url_sk_kemenkumham' => fake()->url(),
            'url_kewenangan_kebijakan' => fake()->url(),
            'jabatan_tertinggi' => fake()->randomElement(['Manager', 'Supervisor', 'Staff']),
            'no_hp' => fake()->phoneNumber(),
            'website' => fake()->url(),
            'tanggal_beroperasi' => fake()->date(),
            'status_kepemilikan_id' => StatusKepemilikan::factory(),

            'npwp' => random_int(0000000000000000, 9999999999999999),
            'no_rekening' => random_int(000000000000000, 999999999999999),
            'url_cv' => fake()->url(),
            'url_anti_penyuapan' => fake()->url(),
        ];
    }
}
