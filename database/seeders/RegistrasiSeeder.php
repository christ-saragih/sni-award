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
            'tahun' => '2024',
            'peserta_id' => 1,
            'status' => 'open',
            'stage' => 'pendaftaran',
            'kategori_organisasi_id' => null,
            'sekretariat_id' => null
        ]);
    }
}