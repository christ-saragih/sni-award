<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AssessmentPertanyaanSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $assessment_pertanyaan = array(
            array('id' => '1',  'assessment_sub_kategori_id' => '1', 'pertanyaan' => 'Apakah organisasi mempertimbangkan standar (SNI) dan penilaian kesesuaian dalam penetapan visi, misi dan tata nilai?'),
            array('id' => '2',  'assessment_sub_kategori_id' => '1', 'pertanyaan' => 'Apakah organisasi mensosialisasi standar (SNI) dan penilaian kesesuaian ke internal maupun mitra )'),
            array('id' => '3',  'assessment_sub_kategori_id' => '1', 'pertanyaan' => 'Apakah organisasi memantau dan mengevaluasi pencapaian visi misi dan tata nilai?'),
            array('id' => '4',  'assessment_sub_kategori_id' => '1', 'pertanyaan' => 'Apakah visi,misi dan tata nilai sudah selaras dengan sasaran dan tujuan organisasi?'),
            array('id' => '5',  'assessment_sub_kategori_id' => '2', 'pertanyaan' => 'Apakah organisasi mempertimbangkan standar (SNI) dan penilaian kesesuaian dalam penetapan GCG?'),
            array('id' => '6',  'assessment_sub_kategori_id' => '2', 'pertanyaan' => 'Apakah aspek governasi telah diterapkan didalam organisasi'),
            array('id' => '7',  'assessment_sub_kategori_id' => '2', 'pertanyaan' => 'Apakah organisasi        melakukan pemantauan        dan        evaluasi        penerapan governansi dan tindak lanjutnya?'),
            array('id' => '8',  'assessment_sub_kategori_id' => '2', 'pertanyaan' => 'Apakah organisasi telah melakukan penyelarasan penerapan governansi?'),
            array('id' => '9',  'assessment_sub_kategori_id' => '3', 'pertanyaan' => 'Apakah organisasi mempertimbangkan standar (SNI) dan penilaian kesesuaian dalam penetapan kebijakan tanggung jawab sosial?'),
            array('id' => '10', 'assessment_sub_kategori_id' => '3',  'pertanyaan' => 'Apakah organisasi telah menerapkan program dan rencana tindak lanjut (action plan) yang telah ditetapkan?'),
            array('id' => '11', 'assessment_sub_kategori_id' => '3',  'pertanyaan' => 'Apakah organisasi  melakukan evaluasi dan tindak lanjut kegiatan tanggung jawab sosial ?'),
            array('id' => '12', 'assessment_sub_kategori_id' => '3',  'pertanyaan' => 'Apakah organisasi telah melakukan penyelarasan kegiatan tanggung jawab sosial ?'),
        );

        DB::table('assessment_pertanyaan')->insert($assessment_pertanyaan);
    }
}