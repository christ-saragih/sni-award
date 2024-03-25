<?php

namespace Database\Seeders;

use App\Models\PesertaProfil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PesertaProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PesertaProfil::factory(5)->create();
    }
}