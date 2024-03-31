<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokumen = array(
            array('nama' => 'Upload Kuisoner', 'status' => 'aktif'),
            array('nama' => 'Lembar Pernyataan Tidak Terlibat Kasus Hokum', 'status' => 'aktif'),
        );

        DB::table('dokumen')->insert($dokumen);
    }
}
