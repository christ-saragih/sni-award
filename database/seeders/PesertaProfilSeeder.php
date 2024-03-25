<?php

namespace Database\Seeders;

use App\Models\PesertaProfil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesertaProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PesertaProfil::factory(5)->create();
    }
}
