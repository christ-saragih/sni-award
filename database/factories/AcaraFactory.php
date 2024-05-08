<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acara>
 */
class AcaraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul_acara'=> $judul_acara = fake()->sentence(5),
            'gambar_thumbnail' => fake()->image(storage_path('app/public/gambar/thumbnail_acara'), 395, 230, null, false, false, null, true, 'png'),
            'slug' => Str::slug($judul_acara, '-'),
            'tanggal' => fake()->date(),
            'deskripsi' => fake()->sentence(50),
        ];
    }
}
