<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stage = array(
            array('nama' => 'Pendaftaran'),
            array('nama' => 'Cek Dokumen '),
            array('nama' => 'Desk Evaluation'),
            array('nama' => 'Site Evaluation'),
        );

        DB::table('stage')->insert($stage);
    }
}
