<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TipeKategoriSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tipe_kategori = array(
            array('id' => '1', 'nama' => 'Kecil'),
            array('id' => '2', 'nama' => 'Jasa'),
            array('id' => '3', 'nama' => 'Barang'),
            array('id' => '4', 'nama' => 'Pendidikan'),
        );

        DB::table('tipe_kategori')->insert($tipe_kategori);
    }
}