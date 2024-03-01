<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StatusKepemilikanSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $status_kepemilikan = array(
            array('id' => '1', 'nama' => 'Perusahaan Perseorangan'),
            array('id' => '2', 'nama' => 'Firma'),
            array('id' => '3', 'nama' => 'Penanaman Modal Asing (PMA)'),
            array('id' => '4', 'nama' => 'Penanaman Modal Asing (PMA)'),
            array('id' => '5', 'nama' => 'Perseroan Komanditer (CV)'),
            array('id' => '6', 'nama' => 'Perseroan Terbatas (PT)'),
            array('id' => '7', 'nama' => 'Perseroan Terbatas Negara (Persero)'),
            array('id' => '8', 'nama' => 'Perusahaan Daerah (PD)'),
            array('id' => '9', 'nama' => 'Perusahaan Negara Jawatan (Perjan)'),
            array('id' => '10', 'nama' => 'Perusahaan Negara Jawatan (Perjan)'),
            array('id' => '11', 'nama' => 'Koperasi'),
            array('id' => '12', 'nama' => 'Usaha Dagang (UD)'),
            array('id' => '13', 'nama' => 'Yayasan'),
        );

        DB::table('status_kepemilikan')->insert($status_kepemilikan);
    }
}