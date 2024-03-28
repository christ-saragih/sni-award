<?php

namespace Database\Factories;

use App\Models\Peserta;
use App\Models\PesertaKontak;
use Illuminate\Database\Eloquent\Factories\Factory;

class PesertaKontakFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PesertaKontak::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'peserta_id' => Peserta::factory(),
            'nama' => $this->faker->name,
            'no_hp' => $this->faker->phoneNumber,
            'jabatan' => $this->faker->jobTitle,
        ];
    }
}