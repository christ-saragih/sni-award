<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KategoriOrganisasiSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $kategori_organisasi = array(
            array('id' => '1', 'tipe_kategori_id' => '1', 'nama' => 'Organisasi Kecil Jasa'),
            array('id' => '2', 'tipe_kategori_id' => '1', 'nama' => 'Organisasi Kecil Barang'),
            array('id' => '3', 'tipe_kategori_id' => '2', 'nama' => 'Organisasi Menengah Jasa'),
            array('id' => '4', 'tipe_kategori_id' => '3', 'nama' => 'Organisasi Menengah Produk Sektor Agro dan Pariwisata'),
            array('id' => '5', 'tipe_kategori_id' => '3', 'nama' => 'Organisasi Menengah Produk Sektor Logam, Mesin, Transportasi dan Elektronika'),
            array('id' => '6', 'tipe_kategori_id' => '3', 'nama' => 'Organisasi Menengah Produk Sektor Kimia, Farmasi, Kesehatan, Tekstil, Energi dan Sumber Daya Mineral'),
            array('id' => '7', 'tipe_kategori_id' => '2', 'nama' => 'Organisasi Besar Jasa'),
            array('id' => '8', 'tipe_kategori_id' => '3', 'nama' => 'Organisasi Besar Produk Sektor Agro dan Pariwisata'),
            array('id' => '9', 'tipe_kategori_id' => '3', 'nama' => 'Organisasi Besar Produk Sektor Logam, Mesin, Transportasi dan Elektronika'),
            array('id' => '10', 'tipe_kategori_id' => '3', 'nama' => 'Organisasi Besar Produk Sektor Kimia, Farmasi, Kesehatan, Tekstil, Energi dan Sumber Daya Mineral'),
            array('id' => '11', 'tipe_kategori_id' => '4', 'nama' => 'Organisasi Pendidikan Menengah'),
        );

        DB::table('kategori_organisasi')->insert($kategori_organisasi);
    }
}