<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faq')->insert([
            [
                'pertanyaan' => 'Bagaimana Cara Mendaftar SNI Award?',
                'jawaban' => 'Pertama Buat Akun Terlebih dahulu agar terdata sebagai peserta.',
                'is_popular' => true,
                
            ],
            [
                'pertanyaan' => 'Kapan SNI Award ini dilaksanakan?',
                'jawaban' => '17 agustus 2024 hingga 17 september 2024 .',
                'is_popular' => true,
                
            ],
            [
                'pertanyaan' => 'Apa saja dokumen yang harus dilengkapi?',
                'jawaban' => 'Lembar Pernyataan Tidak Terlibat Kasus Hukum, Lembar SPPT SNI, Kuisioner .',
                'is_popular' => true,
                
            ],
            [
                'pertanyaan' => 'Apa langkah pertama yang harus dilakukan?',
                'jawaban' => 'melengkapi profil yang dibutuhkan.',
                'is_popular' => false,
                
            ],
            [
                'pertanyaan' => 'Apkah Perlu melengkapi profil?',
                'jawaban' => 'Ya, karena profil akan digunakan untuk keperluan verefikasi.',
                'is_popular' => false,
                
            ],
            [
                'pertanyaan' => 'Apa itu SNI Award?',
                'jawaban' => 'SNI Award adalah penghargaan yang diberikan kepada perusahaan yang telah memenuhi standar SNI.',
                'is_popular' => false,
                
            ],
        ]);
    }
}
