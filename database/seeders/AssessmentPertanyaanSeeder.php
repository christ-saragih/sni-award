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
        $assessment_pertanyaan = [
            ['id' => '1',  'assessment_sub_kategori_id' => '1', 'pertanyaan' => 'Apakah organisasi mempertimbangkan standar (SNI) dan penilaian kesesuaian dalam penetapan visi, misi dan tata nilai?'],
            ['id' => '2',  'assessment_sub_kategori_id' => '1', 'pertanyaan' => 'Apakah organisasi mensosialisasi standar (SNI] dan penilaian kesesuaian ke internal maupun mitra ]'],
            ['id' => '3',  'assessment_sub_kategori_id' => '1', 'pertanyaan' => 'Apakah organisasi memantau dan mengevaluasi pencapaian visi misi dan tata nilai?'],
            ['id' => '4',  'assessment_sub_kategori_id' => '1', 'pertanyaan' => 'Apakah visi,misi dan tata nilai sudah selaras dengan sasaran dan tujuan organisasi?'],
            ['id' => '5',  'assessment_sub_kategori_id' => '2', 'pertanyaan' => 'Apakah organisasi mempertimbangkan standar (SNI] dan penilaian kesesuaian dalam penetapan GCG?'],
            ['id' => '6',  'assessment_sub_kategori_id' => '2', 'pertanyaan' => 'Apakah aspek governasi telah diterapkan didalam organisasi'],
            ['id' => '7',  'assessment_sub_kategori_id' => '2', 'pertanyaan' => 'Apakah organisasi        melakukan pemantauan        dan        evaluasi        penerapan governansi dan tindak lanjutnya?'],
            ['id' => '8',  'assessment_sub_kategori_id' => '2', 'pertanyaan' => 'Apakah organisasi telah melakukan penyelarasan penerapan governansi?'],
            ['id' => '9',  'assessment_sub_kategori_id' => '3', 'pertanyaan' => 'Apakah organisasi mempertimbangkan standar (SNI] dan penilaian kesesuaian dalam penetapan kebijakan tanggung jawab sosial?'],
            ['id' => '10', 'assessment_sub_kategori_id' => '3',  'pertanyaan' => 'Apakah organisasi telah menerapkan program dan rencana tindak lanjut (action plan] yang telah ditetapkan?'],
            ['id' => '11', 'assessment_sub_kategori_id' => '3',  'pertanyaan' => 'Apakah organisasi  melakukan evaluasi dan tindak lanjut kegiatan tanggung jawab sosial ?'],
            ['id' => '12', 'assessment_sub_kategori_id' => '3',  'pertanyaan' => 'Apakah organisasi telah melakukan penyelarasan kegiatan tanggung jawab sosial ?'],
            ['id' => '13', 'assessment_sub_kategori_id' => '4',  'pertanyaan' => 'Apakah organisasi mempertimbangkan SPK dalam proses pengembangan strategi organisasi?'],
            ['id' => '14', 'assessment_sub_kategori_id' => '4',  'pertanyaan' => 'Apakah organisasi telah menetapkan strategi termasuk hal-hal yang berhubungan dengan pemenuhan regulasi dan standardisasi atau SNI?'],
            ['id' => '15', 'assessment_sub_kategori_id' => '4',  'pertanyaan' => 'Apakah  organisasi  melakukan  pemantauan  dan  evaluasi  terhadap  proses pembelajaran pengembangan strategi?'],
            ['id' => '16', 'assessment_sub_kategori_id' => '4',  'pertanyaan' => 'Apakah organisasi melakukan penyelarasan terhadap sistem penyelenggaraan proses produksi dan pengelolaan organisasi?'],
            ['id' => '17', 'assessment_sub_kategori_id' => '5',  'pertanyaan' => 'Apakah organisasi mengembangkan dan menjabarkan strategi ke dalam rencana kerja tahunan termasuk rencana pengembangan dan penerapan standar/SNI serta indikator kinerjanya?'],
            ['id' => '18', 'assessment_sub_kategori_id' => '5',  'pertanyaan' => 'Apakah organisasi menetapkan alokasi sumber daya yang diperlukan untuk mendukung sasaran strategis dan mencapai rencana kerja tahunan di atas?'],
            ['id' => '19', 'assessment_sub_kategori_id' => '5',  'pertanyaan' => 'Apakah organisasi menetapkan alokasi sumber daya yang diperlukan untuk mendukung sasaran strategis dan mencapai rencana kerja tahunan di atas?'],
            ['id' => '20', 'assessment_sub_kategori_id' => '5',  'pertanyaan' => 'Apakah organisasi melakukan penyelarasan hasil tindak lanjut rekomendasi pada fungsi pengelolaan organisasi?'],
            ['id' => '21', 'assessment_sub_kategori_id' => '6',  'pertanyaan' => 'Apakah organisasi mempertimbangkan standar (SNI] dalam proses pendekatan dan metode untuk mengetahui kebutuhan keinginan dan harapan pelanggan?'],
            ['id' => '22', 'assessment_sub_kategori_id' => '6',  'pertanyaan' => 'Apakah organisasi  melakukan  secara  konsisten  penerapan  metode  dalam mengembangkan informasi kebutuhan, keinginan dan harapan pelanggan?'],
            ['id' => '23', 'assessment_sub_kategori_id' => '6',  'pertanyaan' => 'Apakah organisasi  evaluasi pendekatan dan metode yang dikembangkan untuk mengumpulkan informasi kebutuhan, keinginan dan harapan pelanggan?'],
            ['id' => '24', 'assessment_sub_kategori_id' => '6',  'pertanyaan' => 'Apakah organisasi melaksanakan penyelarasan hasil tindak lanjut evaluasi pendekatan dan metode yang dikembangkan?'],
            [
                'id' => '25',
                'assessment_sub_kategori_id' => '7',
                'pertanyaan' => 'Apakah organisasi mempertimbangkan standar (SNI) dalam mendapatkan informasi, berinteraksi dan mengidentifikasi kebutuhan, keinginan dan harapan pelanggan?'
            ],
            [
                'id' => '26',
                'assessment_sub_kategori_id' => '7',
                'pertanyaan' => 'Apakah organisasi melakukan secara konsisten penerapan metode untuk mengembangkan informasi kebutuhan, keinginan dan harapan pelanggan?'
            ],
            [
                'id' => '27',
                'assessment_sub_kategori_id' => '7',
                'pertanyaan' => 'Apakah Organisasi telah melakukan evaluasi pendekatan dan metode yang dikembangkan untuk mengumpulkan informasi kebutuhan, keinginan dan harapan pelanggan?'
            ],
            [
                'id' => '28',
                'assessment_sub_kategori_id' => '7',
                'pertanyaan' => 'Apakah organisasi melaksanakan penyelarasan hasil tindak lanjut evaluasi pendekatan dan metode yang dikembangkan?'
            ],
            [
                'id' => '29',
                'assessment_sub_kategori_id' => '8',
                'pertanyaan' => 'Apakah organisasi mempertimbangkan standar (SNI) dalam melakukan pendekatan dan metode pengembangan sistem manajemen sumber daya manusia?'
            ],
            [
                'id' => '30',
                'assessment_sub_kategori_id' => '8',
                'pertanyaan' => 'Bagaimana organisasi melakukan secara konsisten penerapan metode pengembangan sistem manajemen sumber daya manusia yang diterapkan?'
            ],
            [
                'id' => '31',
                'assessment_sub_kategori_id' => '8',
                'pertanyaan' => 'Apakah organisasi telah melakukan evaluasi dan tindak lanjut pelaksanaan pendekatan dan metode pengembangan sistem manajemen SDM yang diterapkan?'
            ],
            [
                'id' => '32',
                'assessment_sub_kategori_id' => '8',
                'pertanyaan' => 'Apakah organisasi melakukan penyelarasan terhadap sistem penyelenggaraan proses produksi dan pengelolaan organisasi?'
            ],
            [
                'id' => '33',
                'assessment_sub_kategori_id' => '9',
                'pertanyaan' => 'Apakah organisasi mempertimbangkan SPK dalam menetapkan pendekatan dan metode program pengembangan infrastruktur yang dilakukan organisasi?'
            ],
            [
                'id' => '34',
                'assessment_sub_kategori_id' => '9',
                'pertanyaan' => 'Apakah organisasi sudah melakukan secara konsisten penerapan metode untuk mewujudkan lingkungan kerja yang kondusif?'
            ],
            [
                'id' => '35',
                'assessment_sub_kategori_id' => '9',
                'pertanyaan' => 'Apakah organisasi melakukan pemantauan, evaluasi dan tindak lanjut pendekatan dan metode yang dikembangkan dalam mewujudkan lingkungan kerja yang kondusif?'
            ],
            [
                'id' => '36',
                'assessment_sub_kategori_id' => '9',
                'pertanyaan' => 'Apakah organisasi melakukan penyelarasan terhadap sistem penyelenggaraan proses produksi dan pengelolaan organisasi?'
            ],
            [
                'id' => '37',
                'assessment_sub_kategori_id' => '10',
                'pertanyaan' => 'Apakah organisasi mempertimbangkan standar (SNI) dalam melakukan pendekatan dan metode pengembangan sistem operasi untuk memenuhi seluruh persyaratan pemegang saham, SNI pelanggan, regulasi, masyarakat, dan pasar?'
            ],
            [
                'id' => '38',
                'assessment_sub_kategori_id' => '10',
                'pertanyaan' => 'Apakah organisasi telah memanfaatkan secara konsisten standar/SNI yang digunakan untuk mengembangkan dan menerapkan sistem operasi?'
            ],
            [
                'id' => '39',
                'assessment_sub_kategori_id' => '10',
                'pertanyaan' => 'Apakah organisasi telah melakukan pemantauan, evaluasi dan tindak lanjut pelaksanaan pendekatan dan metode pengembangan sistem operasi untuk memastikan bahwa seluruh persyaratan telah dipenuhi dan meninjau efektifitas perencanaan dan pengendalian sistem operasi?'
            ],
            [
                'id' => '40',
                'assessment_sub_kategori_id' => '10',
                'pertanyaan' => 'Apakah organisasi melakukan penyelarasan hasil evaluasi pelaksanaan pendekatan dan metode pengembangan sistem operasi?'
            ],
            [
                'id' => '41',
                'assessment_sub_kategori_id' => '11',
                'pertanyaan' => 'Apakah organisasi mempertimbangkan standar (SNI) dalam menetapkan pendekatan dan metode sistem pengadaan barang dan jasa?'
            ],
            [
                'id' => '42',
                'assessment_sub_kategori_id' => '11',
                'pertanyaan' => 'Apakah organisasi telah melakukan secara konsisten penerapan metode dan penerapan persyaratan SNI, penggunaan kandungan dalam negeri (local content) serta regulasi dalam kontrak pengadaan barang dan jasa?'
            ],
            [
                'id' => '43',
                'assessment_sub_kategori_id' => '11',
                'pertanyaan' => 'Apakah organisasi telah melakukan pemantauan, evaluasi dan tindak lanjut pendekatan dan metode yang dikembangkan dalam meningkatkan kesadaran, kemampuan dan kinerja pemasok?'
            ],
            [
                'id' => '44',
                'assessment_sub_kategori_id' => '11',
                'pertanyaan' => 'Apakah organisasi melakukan penyelarasan hasil evaluasi pelaksanaan program edukasi pemasok terkait dengan penggunaan standar/SNI?'
            ],
            [
                'id' => '45',
                'assessment_sub_kategori_id' => '12',
                'pertanyaan' => 'Apakah organisasi mempertimbangkan standar (SNI) dalam melakukan pendekatan dan metode pengelolaan data dan informasi (pemilihan, pengumpulan, penyelarasan dan pengintegrasian) termasuk data pembanding untuk digunakan dalam pengukuran kinerja organisasi dan pencapaian sasaran strategis?'
            ],
            [
                'id' => '46',
                'assessment_sub_kategori_id' => '12',
                'pertanyaan' => 'Apakah organisasi menerapkan secara konsisten metode pengelolaan data dan informasi, termasuk data pembanding untuk digunakan dalam pengukuran kinerja organisasi dan pencapaian sasaran strategis?'
            ],
            [
                'id' => '47',
                'assessment_sub_kategori_id' => '12',
                'pertanyaan' => 'Apakah organisasi telah melakukan pemantauan, evaluasi dan tindak lanjut metode yang dikembangkan dalam pengelolaan data dan informasi?'
            ],
            [
                'id' => '48',
                'assessment_sub_kategori_id' => '12',
                'pertanyaan' => 'Apakah organisasi telah melaksanakan penyelarasan tindak lanjut hasil evaluasi pendekatan dan metode yang dikembangkan?'
            ],
            [
                'id' => '49',
                'assessment_sub_kategori_id' => '13',
                'pertanyaan' => 'Apakah organisasi mempertimbangkan standar (SNI) dalam menetapkan pendekatan dan metode untuk meningkatkan pengetahuan dan pembelajaran organisasi dari hasil pengukuran dan analisis data dan informasi kinerja seluruh fungsi organisasi?'
            ],
            [
                'id' => '50',
                'assessment_sub_kategori_id' => '13',
                'pertanyaan' => 'Apakah organisasi telah menerapkan secara konsisten metode untuk meningkatkan pengelolaan pengetahuan dan pembelajaran organisasi dari hasil pengukuran dan analisis data dan informasi kinerja seluruh fungsi organisasi?'
            ],
            [
                'id' => '51',
                'assessment_sub_kategori_id' => '13',
                'pertanyaan' => 'Apakah organisasi telah melakukan pemantauan, evaluasi dan tindak lanjut pendekatan dan metode pengelolaan pengetahuan dan pembelajaran organisasi?'
            ],
            [
                'id' => '52',
                'assessment_sub_kategori_id' => '13',
                'pertanyaan' => 'Apakah organisasi telah melaksanakan penyelarasan tindak lanjut hasil evaluasi pendekatan dan metode yang dikembangkan?'
            ],
            [
                'id' => '53',
                'assessment_sub_kategori_id' => '14',
                'pertanyaan' => 'Apakah organisasi mempertimbangkan standar (SNI) dalam menetapkan pendekatan dan metode untuk memanfaatkan keluaran dari kegiatan pembelajaran organisasi berupa inovasi termasuk kegiatan?'
            ],
            [
                'id' => '54',
                'assessment_sub_kategori_id' => '14',
                'pertanyaan' => 'Apakah organisasi telah menerapkan metode pengelolaan inovasi?'
            ],
            [
                'id' => '55',
                'assessment_sub_kategori_id' => '14',
                'pertanyaan' => 'Apakah organisasi telah melakukan pemantauan, evaluasi dan tindak lanjut pelaksanaan pengelolaan inovasi?'
            ],
            [
                'id' => '56',
                'assessment_sub_kategori_id' => '14',
                'pertanyaan' => 'Apakah organisasi telah melaksanakan penyelarasan tindak lanjut hasil evaluasi pendekatan dan metode yang dikembangkan?'
            ],
        ];

        DB::table('assessment_pertanyaan')->insert($assessment_pertanyaan);
    }
}