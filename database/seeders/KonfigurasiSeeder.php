<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KonfigurasiSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $konfigurasi = array(
            array('id' => '1', 'key' => 'Pendaftaran', 'value' => 'FALSE'),
            array('id' => '2', 'key' => 'Tahun SNI Award', 'value' => '2024'),
        );
        
        DB::table('konfigurasi')->insert($konfigurasi);
    }
}