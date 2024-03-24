<?php

namespace Database\Seeders;

use App\Models\DokumentasiAcara;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokumentasiAcaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DokumentasiAcara::factory(5)->create();
    }
}
