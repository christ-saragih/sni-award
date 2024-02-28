<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PropinsiSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $propinsi = array(
            array('id' => '11', 'name' => 'ACEH'),
            array('id' => '12', 'name' => 'SUMATERA UTARA'),
            array('id' => '13', 'name' => 'SUMATERA BARAT'),
            array('id' => '14', 'name' => 'RIAU'),
            array('id' => '15', 'name' => 'JAMBI'),
            array('id' => '16', 'name' => 'SUMATERA SELATAN'),
            array('id' => '17', 'name' => 'BENGKULU'),
            array('id' => '18', 'name' => 'LAMPUNG'),
            array('id' => '19', 'name' => 'KEPULAUAN BANGKA BELITUNG'),
            array('id' => '21', 'name' => 'KEPULAUAN RIAU'),
            array('id' => '31', 'name' => 'DKI JAKARTA'),
            array('id' => '32', 'name' => 'JAWA BARAT'),
            array('id' => '33', 'name' => 'JAWA TENGAH'),
            array('id' => '34', 'name' => 'DI YOGYAKARTA'),
            array('id' => '35', 'name' => 'JAWA TIMUR'),
            array('id' => '36', 'name' => 'BANTEN'),
            array('id' => '51', 'name' => 'BALI'),
            array('id' => '52', 'name' => 'NUSA TENGGARA BARAT'),
            array('id' => '53', 'name' => 'NUSA TENGGARA TIMUR'),
            array('id' => '61', 'name' => 'KALIMANTAN BARAT'),
            array('id' => '62', 'name' => 'KALIMANTAN TENGAH'),
            array('id' => '63', 'name' => 'KALIMANTAN SELATAN'),
            array('id' => '64', 'name' => 'KALIMANTAN TIMUR'),
            array('id' => '65', 'name' => 'KALIMANTAN UTARA'),
            array('id' => '71', 'name' => 'SULAWESI UTARA'),
            array('id' => '72', 'name' => 'SULAWESI TENGAH'),
            array('id' => '73', 'name' => 'SULAWESI SELATAN'),
            array('id' => '74', 'name' => 'SULAWESI TENGGARA'),
            array('id' => '75', 'name' => 'GORONTALO'),
            array('id' => '76', 'name' => 'SULAWESI BARAT'),
            array('id' => '81', 'name' => 'MALUKU'),
            array('id' => '82', 'name' => 'MALUKU UTARA'),
            array('id' => '91', 'name' => 'PAPUA BARAT'),
            array('id' => '94', 'name' => 'PAPUA'),
        );

        DB::table('propinsi')->insert($propinsi);
    }
}