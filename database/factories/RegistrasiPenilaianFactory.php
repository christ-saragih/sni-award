<?php

namespace Database\Factories;

use App\Models\Registrasi;
use App\Models\Stage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegistrasiPenilaian>
 */
class RegistrasiPenilaianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registrasi_id' => Registrasi::factory(),
            'internal_id' => User::factory(),
            'jabatan' => 'evaluator',
            'stage_id' => 1,
            'url_dokumen_penilaian' => Str::random(10),
            'skor' => fake()->numberBetween(0, 100),
            'catatan' => fake()->sentence(5),
        ];
    }
}
