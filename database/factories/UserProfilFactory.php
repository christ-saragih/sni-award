<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfil>
 */
class UserProfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'no_hp' => fake()->phoneNumber(),
            'npwp' => random_int(0000000000000000, 9999999999999999),
            'no_rekening' => random_int(000000000000000, 999999999999999),
            'url_cv' => fake()->url(),
            'url_anti_penyuapan' => fake()->url(),
        ];
    }
}
