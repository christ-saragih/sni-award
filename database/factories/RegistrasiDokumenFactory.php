<?php

namespace Database\Factories;

use App\Models\Registrasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegistrasiDokumen>
 */
class RegistrasiDokumenFactory extends Factory
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
            'dokumen_id' => 1,
            'url_dokumen' => fake()->sentence(5),
            'status' => 'proses',
            'feedback' => fake()->sentence(5),
            // 'review_at' => now(),
        ];
    }
}
