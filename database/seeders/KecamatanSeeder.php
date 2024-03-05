<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $kecamatan = [
        //     ['id' => '1101010', 'kota_id' => '1101', 'kecamatan' => 'TEUPAH SELATAN1', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        //     ['id'=>'1101020', 'kota_id'=>'1101','kecamatan'=> 'SIMEULUE TIMUR1', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        //     ['id'=>'1101021', 'kota_id'=>'1101','kecamatan'=> 'TEUPAH BARAT1', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        //     ['id'=>'1101022', 'kota_id'=>'1101','kecamatan'=> 'TEUPAH TENGAH1', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        //     ['id'=>'1101030', 'kota_id'=>'1101','kecamatan'=> 'SIMEULUE TENGA1H', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        //     ['id'=>'1101031', 'kota_id'=>'1101','kecamatan'=> 'TELUK DALAM1', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        // ];

        $kecamatan = array(
            array('id'=>'1101010', 'kota_id'=>'1101','kecamatan'=> 'TEUPAH SELATAN1'),
            array('id'=>'1101020', 'kota_id'=>'1101','kecamatan'=> 'SIMEULUE TIMUR1'),
            array('id'=>'1101021', 'kota_id'=>'1101','kecamatan'=> 'TEUPAH BARAT1'),
            array('id'=>'1101022', 'kota_id'=>'1101','kecamatan'=> 'TEUPAH TENGAH1'),
            array('id'=>'1101030', 'kota_id'=>'1101','kecamatan'=> 'SIMEULUE TENGA1H'),
            array('id'=>'1101031', 'kota_id'=>'1101','kecamatan'=> 'TELUK DALAM1'),
            array('id'=>'1101032', 'kota_id'=>'1101','kecamatan'=> 'SIMEULUE CUT1'),
            array('id'=>'1101040', 'kota_id'=>'1101','kecamatan'=> 'SALANG1'),
            array('id'=>'1101050', 'kota_id'=>'1101','kecamatan'=> 'SIMEULUE BARAT1'),
            array('id'=>'1101051', 'kota_id'=>'1101','kecamatan'=> 'ALAFAN1'),
            array('id'=>'1102010', 'kota_id'=>'1102','kecamatan'=> 'PULAU BANYAK1'),
            array('id'=>'1102011', 'kota_id'=>'1102','kecamatan'=> 'PULAU BANYAK B1ARAT'),
            array('id'=>'1102020', 'kota_id'=>'1102','kecamatan'=> 'SINGKIL1'),
            array('id'=>'1102021', 'kota_id'=>'1102','kecamatan'=> 'SINGKIL UTARA1'),
            array('id'=>'1102022', 'kota_id'=>'1102','kecamatan'=> 'KUALA BARU1'),
            array('id'=>'1102030', 'kota_id'=>'1102','kecamatan'=> 'SIMPANG KANAN1'),
            array('id'=>'1102031', 'kota_id'=>'1102','kecamatan'=> 'GUNUNG MERIAH1'),
            array('id'=>'1102032', 'kota_id'=>'1102','kecamatan'=> 'DANAU PARIS1'),
            array('id'=>'1102033', 'kota_id'=>'1102','kecamatan'=> 'SURO1'),
            array('id'=>'1102042', 'kota_id'=>'1102','kecamatan'=> 'SINGKOHOR1'),
            array('id'=>'1102043', 'kota_id'=>'1102','kecamatan'=> 'KOTA BAHARU1'),
            array('id'=>'1103010', 'kota_id'=>'1103','kecamatan'=> 'TRUMON1'),
            array('id'=>'1103011', 'kota_id'=>'1103','kecamatan'=> 'TRUMON TIMUR1'),
            array('id'=>'1103012', 'kota_id'=>'1103','kecamatan'=> 'TRUMON TENGAH1'),
            array('id'=>'1103020', 'kota_id'=>'1103','kecamatan'=> 'BAKONGAN1'),
            array('id'=>'1103021', 'kota_id'=>'1103','kecamatan'=> 'BAKONGAN TIMUR1'),
            array('id'=>'1103022', 'kota_id'=>'1103','kecamatan'=> 'KOTA BAHAGIA1'),
            array('id'=>'1103030', 'kota_id'=>'1103','kecamatan'=> 'KLUET SELATAN1'),
            array('id'=>'1103031', 'kota_id'=>'1103','kecamatan'=> 'KLUET TIMUR1'),
            array('id'=>'1103040', 'kota_id'=>'1103','kecamatan'=> 'KLUET UTARA1'),
            array('id'=>'1103041', 'kota_id'=>'1103','kecamatan'=> 'PASIE RAJA1'),
            array('id'=>'1103042', 'kota_id'=>'1103','kecamatan'=> 'KLUET TENGAH1'),
            array('id'=>'1103050', 'kota_id'=>'1103','kecamatan'=> 'TAPAK TUAN1'),
            array('id'=>'1103060', 'kota_id'=>'1103','kecamatan'=> 'SAMA DUA1'),
            array('id'=>'1103070', 'kota_id'=>'1103','kecamatan'=> 'SAWANG1'),
            array('id'=>'1103080', 'kota_id'=>'1103','kecamatan'=> 'MEUKEK1'),
            array('id'=>'1103090', 'kota_id'=>'1103','kecamatan'=> 'LABUHAN HAJI1'),
            array('id'=>'1103091', 'kota_id'=>'1103','kecamatan'=> 'LABUHAN HAJI T1IMUR'),
            array('id'=>'1103092', 'kota_id'=>'1103','kecamatan'=> 'LABUHAN HAJI B1ARAT'),
            array('id'=>'1104010', 'kota_id'=>'1104','kecamatan'=> 'LAWE ALAS1'),
            array('id'=>'1104011', 'kota_id'=>'1104','kecamatan'=> 'BABUL RAHMAH1'),
            array('id'=>'1104012', 'kota_id'=>'1104','kecamatan'=> 'TANOH ALAS1'),
            array('id'=>'1104020', 'kota_id'=>'1104','kecamatan'=> 'LAWE SIGALA-GA1LA'),
            array('id'=>'1104021', 'kota_id'=>'1104','kecamatan'=> 'BABUL MAKMUR1'),
            array('id'=>'1104022', 'kota_id'=>'1104','kecamatan'=> 'SEMADAM1'),
            array('id'=>'1104023', 'kota_id'=>'1104','kecamatan'=> 'LEUSER1'),
            array('id'=>'1104030', 'kota_id'=>'1104','kecamatan'=> 'BAMBEL1'),
            array('id'=>'1104031', 'kota_id'=>'1104','kecamatan'=> 'BUKIT TUSAM1'),
            array('id'=>'1104032', 'kota_id'=>'1104','kecamatan'=> 'LAWE SUMUR1'),
            array('id'=>'1104040', 'kota_id'=>'1104','kecamatan'=> 'BABUSSALAM1'),
            array('id'=>'1104041', 'kota_id'=>'1104','kecamatan'=> 'LAWE BULAN1'),
        );

        DB::table('kecamatan')->insert($kecamatan);
    }
}
