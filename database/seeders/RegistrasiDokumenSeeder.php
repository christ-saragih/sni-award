<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrasiDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('registrasi_dokumen')->insert([
            'registrasi_id' => 1,
            'dokumen_id' => 1,
            'url_dokumen' => null,
            'status' => 'proses',
            'feedback' => 'asdfg',
        ]);
    }
}