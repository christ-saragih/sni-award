<?php

namespace Database\Factories;

use App\Models\Acara;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DokumentasiAcara>
 */
class DokumentasiAcaraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'acara_id' => Acara::factory(),
            'gambar_konten' => fake()->image('public/gambar/konten_acara', 395, 230, null, false, false, null, true, 'png'),
        ];
    }
}
