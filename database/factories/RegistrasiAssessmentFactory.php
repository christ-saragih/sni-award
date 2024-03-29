<?php

namespace Database\Factories;

use App\Models\Registrasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegistrasiAssessment>
 */
class RegistrasiAssessmentFactory extends Factory
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
            // 'assessment_pertanyaan_id' => 1,
            'assessment_jawaban_id' => 1,
            'score' => null
        ];
    }
}
