<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AssessmentKategoriSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $assessment_kategori = array(
            array('id' => '1', 'nama' => 'Kepemimpinan'),
            array('id' => '2', 'nama' => 'Strategi)'),
            array('id' => '3', 'nama' => 'Pelanggan'),
            array('id' => '4', 'nama' => 'Manajemen SDM'),
            array('id' => '5', 'nama' => 'Fokus Operasi'),
            array('id' => '6', 'nama' => 'Pengukuran, Analisis dan KM'),
        );

        DB::table('assessment_kategori')->insert($assessment_kategori);
    }
}