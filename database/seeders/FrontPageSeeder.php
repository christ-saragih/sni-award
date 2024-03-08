<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrontPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $frontpage = [
            [
                'id' => 1,
                'judul' => 'Selamat Datang Di Website SNI Award 2024',
                'keterangan_judul' => 'SNI Award dicanangkan sebagai The National Quality Award of Indonesia sejak tahun 2005',
                'gambar_banner' => '/images/icon/Frame 2.png',
                'keterangan_sni' => 'SNI Award merupakan sebuah pemberian penghargaan tertinggi dari Pemerintah Repubik Indonesia bagi organisasi yang menerapkan Standar Nasional Indonesia (SNI) secara konsisten, berkinerja tinggi, memiliki kemampuan mengelola dinamisasi perubahan dan melakukan transformasi yang diperlukan secara tepat.',
                'judul_dokumentasi' => 'Dokumentasi',
                'keterangan_dokumentasi' => '"Jelajah dan Kenali kami dengan Anda Mulai disini!"',
                'judul_konten_berita' => 'Berita',
                'keterangan_berita' => 'Berita Terkini',
                'alamat' => 'Gedung I BPPT Jl. M.H. Thamrin No.8 Kebon Sirih, Jakarta Pusat 10340',
                'twitter' => '',
                'instagram' => '',
                'youtube' => '',
                'website' => 'https://www.bsn.go.id',
            ]
        ];

        DB::table('frontpage')->insert($frontpage);
    }
}
