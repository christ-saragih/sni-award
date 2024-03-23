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
            array('id' => '13', 'assessment_sub_kategori_id' => '4',  'pertanyaan' => 'Apakah organisasi mempertimbangkan SPK dalam proses pengembangan strategi organisasi?'),
            array('id' => '14', 'assessment_sub_kategori_id' => '4',  'pertanyaan' => 'Apakah organisasi telah menetapkan strategi termasuk hal-hal yang berhubungan dengan pemenuhan regulasi dan standardisasi atau SNI?'),
            array('id' => '15', 'assessment_sub_kategori_id' => '4',  'pertanyaan' => 'Apakah  organisasi  melakukan  pemantauan  dan  evaluasi  terhadap  proses pembelajaran pengembangan strategi?'),
            array('id' => '16', 'assessment_sub_kategori_id' => '4',  'pertanyaan' => 'Apakah organisasi melakukan penyelarasan terhadap sistem penyelenggaraan proses produksi dan pengelolaan organisasi?'),
            array('id' => '17', 'assessment_sub_kategori_id' => '5',  'pertanyaan' => 'Apakah organisasi mengembangkan dan menjabarkan strategi ke dalam rencana kerja tahunan termasuk rencana pengembangan dan penerapan standar/SNI serta indikator kinerjanya?'),
            array('id' => '18', 'assessment_sub_kategori_id' => '5',  'pertanyaan' => 'Apakah organisasi menetapkan alokasi sumber daya yang diperlukan untuk mendukung sasaran strategis dan mencapai rencana kerja tahunan di atas?'),
            array('id' => '19', 'assessment_sub_kategori_id' => '5',  'pertanyaan' => 'Apakah organisasi menetapkan alokasi sumber daya yang diperlukan untuk mendukung sasaran strategis dan mencapai rencana kerja tahunan di atas?'),
            array('id' => '20', 'assessment_sub_kategori_id' => '5',  'pertanyaan' => 'Apakah organisasi melakukan penyelarasan hasil tindak lanjut rekomendasi pada fungsi pengelolaan organisasi?'),
            array('id' => '21', 'assessment_sub_kategori_id' => '6',  'pertanyaan' => 'Apakah organisasi mempertimbangkan standar (SNI) dalam proses pendekatan dan metode untuk mengetahui kebutuhan keinginan dan harapan pelanggan?'),
            array('id' => '22', 'assessment_sub_kategori_id' => '6',  'pertanyaan' => 'Apakah organisasi  melakukan  secara  konsisten  penerapan  metode  dalam mengembangkan informasi kebutuhan, keinginan dan harapan pelanggan?'),
            array('id' => '23', 'assessment_sub_kategori_id' => '6',  'pertanyaan' => 'Apakah organisasi  evaluasi pendekatan dan metode yang dikembangkan untuk mengumpulkan informasi kebutuhan, keinginan dan harapan pelanggan?'),
            array('id' => '24', 'assessment_sub_kategori_id' => '6',  'pertanyaan' => 'Apakah organisasi melaksanakan penyelarasan hasil tindak lanjut evaluasi pendekatan dan metode yang dikembangkan?'),
        );

        DB::table('assessment_pertanyaan')->insert($assessment_pertanyaan);
    }
}