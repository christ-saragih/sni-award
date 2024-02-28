<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AssessmentSubKategoriSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $assessment_sub_kategori = array(
            array('id' => '1',  'assessment_kategori_id' => '1', 'nama' => 'Visi, Tata nilai dan Misi'),
            array('id' => '2',  'assessment_kategori_id' => '1', 'nama' => 'Governansi Organisasi)'),
            array('id' => '3',  'assessment_kategori_id' => '1', 'nama' => 'Tanggung Jawab Sosial'),
            array('id' => '4',  'assessment_kategori_id' => '2', 'nama' => 'Pengembangan Strategi'),
            array('id' => '5',  'assessment_kategori_id' => '2', 'nama' => 'Penerapan Strategi'),
            array('id' => '6',  'assessment_kategori_id' => '3', 'nama' => 'Suara Pelanggan'),
            array('id' => '7',  'assessment_kategori_id' => '3', 'nama' => 'Kepuasan dan Kerekatan Pelanggan terhadap Organisasi'),
            array('id' => '8',  'assessment_kategori_id' => '4', 'nama' => 'Manajemen Sumber Daya Manusia (SDM)'),
            array('id' => '9',  'assessment_kategori_id' => '4', 'nama' => 'Lingkungan Kerja'),
            array('id' => '10', 'assessment_kategori_id' => '5', 'nama' => 'Perencanaan dan Pengendalian Proses Produksi'),
            array('id' => '11', 'assessment_kategori_id' => '5', 'nama' => 'Pengembangan Pemasok'),
            array('id' => '12', 'assessment_kategori_id' => '6', 'nama' => 'Pengukuran dan Analisis'),
            array('id' => '13', 'assessment_kategori_id' => '6', 'nama' => 'Manajemen Pengetahuan'),
        );

        DB::table('assessment_sub_kategori')->insert($assessment_sub_kategori);
    }
}