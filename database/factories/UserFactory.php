<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'User SNI',
            'email' => 'user@gmail.com',
            'role' => 2,
            'status' => 'aktif',
            'email_verified_at' => now(),
            'verify_key' => Str::random(100),
            'forgot_password_token' => Str::random(100),
            'password' => static::$password ??= Hash::make('1234567890'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function admin()
    {
        static $sequence = 0;
        return $this->state(function (array $attributes) use (&$sequence) {
            $sequence++;
            $emailPrefix = $sequence === 1 ? 'admin' : "admin$sequence";
            $namePrefix = $sequence === 1 ? 'Administrator SNI' : "Administrator SNI $sequence";

            return [
                'name' => $namePrefix,
                'email' => "$emailPrefix@gmail.com",
                'role' => 1,
            ];
        });
    }

    public function evaluator()
    {
        static $sequence = 0;
        return $this->state(function (array $attributes) use (&$sequence) {
            $sequence++;
            $emailPrefix = $sequence === 1 ? 'evaluator' : "evaluator$sequence";
            $namePrefix = $sequence === 1 ? 'Evaluator SNI' : "Evaluator SNI $sequence";

            return [
                'name' => $namePrefix,
                'email' => "$emailPrefix@gmail.com",
                'role' => 2,
            ];
        });
    }

    public function leadEvaluator()
    {
        static $sequence = 0;
        return $this->state(function (array $attributes) use (&$sequence) {
            $sequence++;
            $emailPrefix = $sequence === 1 ? 'leadevaluator' : "leadevaluator$sequence";
            $namePrefix = $sequence === 1 ? 'Lead Evaluator SNI' : "Lead Evaluator SNI $sequence";

            return [
                'name' => $namePrefix,
                'email' => "$emailPrefix@gmail.com",
                'role' => 3,
            ];
        });
    }
}
