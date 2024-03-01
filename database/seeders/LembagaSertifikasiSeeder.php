<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LembagaSertifikasiSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $lembaga_sertifikasi = array(
            array('id' => '1', 'nama' => 'Sucofindo'),
            array('id' => '2', 'nama' => 'Balai Besar Standardisasi dan Pelayanan Jasa Industri Agro (BBIA)'),
            array('id' => '3', 'nama' => 'PT TUV NORD Indonesia'),
        );

        DB::table('lembaga_sertifikasi')->insert($lembaga_sertifikasi);
    }
}