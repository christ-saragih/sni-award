<?php

namespace Database\Factories;

use App\Models\KategoriOrganisasi;
use App\Models\Peserta;
use App\Models\Stage;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registrasi>
 */
class RegistrasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tahun' => fake()->year(),
            'peserta_id' => Peserta::factory(),
            'status_id' => 1,
            // 'status_id' => fake()->randomElement(['open', 'need repaid', 'repaired', 'rejected', 'approved']),
            'stage_id' => 1,
            // 'stage_id' => fake()->randomElement(['Pendaftaran', 'Cek Dokumen ', 'Desk Evaluation', 'Site Evaluation']),
            'kategori_organisasi_id' => 1,
            'sekretariat_id' => null,
        ];
    }
}
