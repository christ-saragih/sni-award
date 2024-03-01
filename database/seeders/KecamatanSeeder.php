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
        $kecamatan = array(
            array('id'=>'1101010', 'kota_id'=>'1101','nama'=> 'TEUPAH SELATAN1'),
            array('id'=>'1101020', 'kota_id'=>'1101','nama'=> 'SIMEULUE TIMUR1'),
            array('id'=>'1101021', 'kota_id'=>'1101','nama'=> 'TEUPAH BARAT1'),
            array('id'=>'1101022', 'kota_id'=>'1101','nama'=> 'TEUPAH TENGAH1'),
            array('id'=>'1101030', 'kota_id'=>'1101','nama'=> 'SIMEULUE TENGA1H'),
            array('id'=>'1101031', 'kota_id'=>'1101','nama'=> 'TELUK DALAM1'),
            array('id'=>'1101032', 'kota_id'=>'1101','nama'=> 'SIMEULUE CUT1'),
            array('id'=>'1101040', 'kota_id'=>'1101','nama'=> 'SALANG1'),
            array('id'=>'1101050', 'kota_id'=>'1101','nama'=> 'SIMEULUE BARAT1'),
            array('id'=>'1101051', 'kota_id'=>'1101','nama'=> 'ALAFAN1'),
            array('id'=>'1102010', 'kota_id'=>'1102','nama'=> 'PULAU BANYAK1'),
            array('id'=>'1102011', 'kota_id'=>'1102','nama'=> 'PULAU BANYAK B1ARAT'),
            array('id'=>'1102020', 'kota_id'=>'1102','nama'=> 'SINGKIL1'),
            array('id'=>'1102021', 'kota_id'=>'1102','nama'=> 'SINGKIL UTARA1'),
            array('id'=>'1102022', 'kota_id'=>'1102','nama'=> 'KUALA BARU1'),
            array('id'=>'1102030', 'kota_id'=>'1102','nama'=> 'SIMPANG KANAN1'),
            array('id'=>'1102031', 'kota_id'=>'1102','nama'=> 'GUNUNG MERIAH1'),
            array('id'=>'1102032', 'kota_id'=>'1102','nama'=> 'DANAU PARIS1'),
            array('id'=>'1102033', 'kota_id'=>'1102','nama'=> 'SURO1'),
            array('id'=>'1102042', 'kota_id'=>'1102','nama'=> 'SINGKOHOR1'),
            array('id'=>'1102043', 'kota_id'=>'1102','nama'=> 'KOTA BAHARU1'),
            array('id'=>'1103010', 'kota_id'=>'1103','nama'=> 'TRUMON1'),
            array('id'=>'1103011', 'kota_id'=>'1103','nama'=> 'TRUMON TIMUR1'),
            array('id'=>'1103012', 'kota_id'=>'1103','nama'=> 'TRUMON TENGAH1'),
            array('id'=>'1103020', 'kota_id'=>'1103','nama'=> 'BAKONGAN1'),
            array('id'=>'1103021', 'kota_id'=>'1103','nama'=> 'BAKONGAN TIMUR1'),
            array('id'=>'1103022', 'kota_id'=>'1103','nama'=> 'KOTA BAHAGIA1'),
            array('id'=>'1103030', 'kota_id'=>'1103','nama'=> 'KLUET SELATAN1'),
            array('id'=>'1103031', 'kota_id'=>'1103','nama'=> 'KLUET TIMUR1'),
            array('id'=>'1103040', 'kota_id'=>'1103','nama'=> 'KLUET UTARA1'),
            array('id'=>'1103041', 'kota_id'=>'1103','nama'=> 'PASIE RAJA1'),
            array('id'=>'1103042', 'kota_id'=>'1103','nama'=> 'KLUET TENGAH1'),
            array('id'=>'1103050', 'kota_id'=>'1103','nama'=> 'TAPAK TUAN1'),
            array('id'=>'1103060', 'kota_id'=>'1103','nama'=> 'SAMA DUA1'),
            array('id'=>'1103070', 'kota_id'=>'1103','nama'=> 'SAWANG1'),
            array('id'=>'1103080', 'kota_id'=>'1103','nama'=> 'MEUKEK1'),
            array('id'=>'1103090', 'kota_id'=>'1103','nama'=> 'LABUHAN HAJI1'),
            array('id'=>'1103091', 'kota_id'=>'1103','nama'=> 'LABUHAN HAJI T1IMUR'),
            array('id'=>'1103092', 'kota_id'=>'1103','nama'=> 'LABUHAN HAJI B1ARAT'),
            array('id'=>'1104010', 'kota_id'=>'1104','nama'=> 'LAWE ALAS1'),
            array('id'=>'1104011', 'kota_id'=>'1104','nama'=> 'BABUL RAHMAH1'),
            array('id'=>'1104012', 'kota_id'=>'1104','nama'=> 'TANOH ALAS1'),
            array('id'=>'1104020', 'kota_id'=>'1104','nama'=> 'LAWE SIGALA-GA1LA'),
            array('id'=>'1104021', 'kota_id'=>'1104','nama'=> 'BABUL MAKMUR1'),
            array('id'=>'1104022', 'kota_id'=>'1104','nama'=> 'SEMADAM1'),
            array('id'=>'1104023', 'kota_id'=>'1104','nama'=> 'LEUSER1'),
            array('id'=>'1104030', 'kota_id'=>'1104','nama'=> 'BAMBEL1'),
            array('id'=>'1104031', 'kota_id'=>'1104','nama'=> 'BUKIT TUSAM1'),
            array('id'=>'1104032', 'kota_id'=>'1104','nama'=> 'LAWE SUMUR1'),
            array('id'=>'1104040', 'kota_id'=>'1104','nama'=> 'BABUSSALAM1'),
            array('id'=>'1104041', 'kota_id'=>'1104','nama'=> 'LAWE BULAN1'),
        );

        DB::table('kecamatan')->insert($kecamatan);
    }
}
