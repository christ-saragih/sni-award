<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            },
            'judul_berita'=> $judul_berita = fake()->sentence(5),
            'slug' => Str::slug($judul_berita, '-'),
            'deskripsi' => fake()->sentence(50),
            'tanggal' => fake()->date(),
            'file_gambar' => fake()->image(storage_path('app/public/gambar/gambar_berita'), 395, 230, null, false, false, null, true, 'png'),
        ];
    }
}
