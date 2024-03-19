<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('registrasi')->insert([
            'tahun' => fake()->year(),
            'peserta_id' => null,
            'status_id' => 1,
            'stage_id' => 1,
            'kategori_organisasi_id' => 1,
            'sekretariat_id' => 1
        ]);
    }
}
