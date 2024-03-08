<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $propinsi = [
            ['id' => '11', 'propinsi' => 'ACEH', 'map_id' => 'id-ac', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '12', 'propinsi' => 'SUMATERA UTARA', 'map_id' => 'id-su', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '13', 'propinsi' => 'SUMATERA BARAT', 'map_id' => 'id-sb', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '14', 'propinsi' => 'RIAU', 'map_id' => 'id-ri', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '15', 'propinsi' => 'JAMBI', 'map_id' => 'id-ja', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '16', 'propinsi' => 'SUMATERA SELATAN', 'map_id' => 'id-sl', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '17', 'propinsi' => 'BENGKULU', 'map_id' => 'id-be', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '18', 'propinsi' => 'LAMPUNG', 'map_id' => 'id-la', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '19', 'propinsi' => 'KEPULAUAN BANGKA BELITUNG', 'map_id' => 'id-bb', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '21', 'propinsi' => 'KEPULAUAN RIAU', 'map_id' => 'id-kr', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '31', 'propinsi' => 'DKI JAKARTA', 'map_id' => 'id-jk', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '32', 'propinsi' => 'JAWA BARAT', 'map_id' => 'id-jr', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '33', 'propinsi' => 'JAWA TENGAH', 'map_id' => 'id-jt', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '34', 'propinsi' => 'DAERAH ISTIMEWA YOGYAKARTA', 'map_id' => 'id-yo', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '35', 'propinsi' => 'JAWA TIMUR', 'map_id' => 'id-ji', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '36', 'propinsi' => 'BANTEN', 'map_id' => 'id-bt', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '51', 'propinsi' => 'BALI', 'map_id' => 'id-ba', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '52', 'propinsi' => 'NUSA TENGGARA BARAT', 'map_id' => 'id-nb', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '53', 'propinsi' => 'NUSA TENGGARA TIMUR', 'map_id' => 'id-nt', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '61', 'propinsi' => 'KALIMANTAN BARAT', 'map_id' => 'id-kb', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '62', 'propinsi' => 'KALIMANTAN TENGAH', 'map_id' => 'id-kt', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '63', 'propinsi' => 'KALIMANTAN SELATAN', 'map_id' => 'id-ks', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '64', 'propinsi' => 'KALIMANTAN TIMUR', 'map_id' => 'id-ki', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '65', 'propinsi' => 'KALIMANTAN UTARA', 'map_id' => 'id-ku', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '71', 'propinsi' => 'SULAWESI UTARA', 'map_id' => 'id-sw', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '72', 'propinsi' => 'SULAWESI TENGAH', 'map_id' => 'id-st', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '73', 'propinsi' => 'SULAWESI SELATAN', 'map_id' => 'id-se', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '74', 'propinsi' => 'SULAWESI TENGGARA', 'map_id' => 'id-sg', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '75', 'propinsi' => 'GORONTALO', 'map_id' => 'id-go', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '76', 'propinsi' => 'SULAWESI BARAT', 'map_id' => 'id-sr', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '81', 'propinsi' => 'MALUKU', 'map_id' => 'id-ma', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '82', 'propinsi' => 'MALUKU UTARA', 'map_id' => 'id-mu', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '91', 'propinsi' => 'PAPUA', 'map_id' => 'id-pa', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['id' => '92', 'propinsi' => 'PAPUA BARAT', 'map_id' => 'id-ib', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ];

        DB::table('propinsi')->insert($propinsi);
    }
}
