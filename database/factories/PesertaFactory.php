<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peserta>
 */
class PesertaFactory extends Factory
{
    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => 'Peserta SNI',
            'email' => 'peserta@gmail.com',
            'kategori_organisasi_id' => 1,
            'status' => 'aktif',
            'email_verified_at' => now(),
            'verify_key' => Str::random(100),
            'forgot_password_token' => Str::random(100),
            'password' => static::$password ??= Hash::make('1234567890'),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
