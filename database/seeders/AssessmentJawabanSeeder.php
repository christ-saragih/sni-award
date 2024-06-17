<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AssessmentJawabanSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $assessment_jawaban = array(
            array('id' => '1', 'assessment_pertanyaan_id' => '1', 'jawaban' => 'Standar tidak menjadi acuan dalam penetapan visi, misi maupun operasional'),
            array('id' => '2', 'assessment_pertanyaan_id' => '1', 'jawaban' => 'Standar hanya digunakan operasional dalam bagian tertentu'),
            array('id' => '3', 'assessment_pertanyaan_id' => '1', 'jawaban' => 'Standar masih sebatas acuan dalam penetapan visi, misi dan tata nilai'),
            array('id' => '4', 'assessment_pertanyaan_id' => '1', 'jawaban' => 'Visi, misi dan tata nilai secara eksplisit mengacu kepada standar'),
            array('id' => '5', 'assessment_pertanyaan_id' => '2', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian unit organisasi, dengan sebagian kecil aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '6', 'assessment_pertanyaan_id' => '2', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian besar unit organisasi, dengan beberapa aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '7', 'assessment_pertanyaan_id' => '2', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan hampir keseluruh unit organisasi, dengan sebagian besar aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '8', 'assessment_pertanyaan_id' => '2', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '9', 'assessment_pertanyaan_id' => '3', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '10', 'assessment_pertanyaan_id' => '3', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '11', 'assessment_pertanyaan_id' => '3', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '12', 'assessment_pertanyaan_id' => '3', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '13', 'assessment_pertanyaan_id' => '4', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '14', 'assessment_pertanyaan_id' => '4', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '15', 'assessment_pertanyaan_id' => '4', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '16', 'assessment_pertanyaan_id' => '4', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '17', 'assessment_pertanyaan_id' => '5', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '18', 'assessment_pertanyaan_id' => '5', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '19', 'assessment_pertanyaan_id' => '5', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '20', 'assessment_pertanyaan_id' => '5', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '21', 'assessment_pertanyaan_id' => '6', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '22', 'assessment_pertanyaan_id' => '6', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '23', 'assessment_pertanyaan_id' => '6', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '24', 'assessment_pertanyaan_id' => '6', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '25', 'assessment_pertanyaan_id' => '7', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '26', 'assessment_pertanyaan_id' => '7', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '27', 'assessment_pertanyaan_id' => '7', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '28', 'assessment_pertanyaan_id' => '7', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '29', 'assessment_pertanyaan_id' => '8', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '30', 'assessment_pertanyaan_id' => '8', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '31', 'assessment_pertanyaan_id' => '8', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '32', 'assessment_pertanyaan_id' => '8', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '33', 'assessment_pertanyaan_id' => '9', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '34', 'assessment_pertanyaan_id' => '9', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '35', 'assessment_pertanyaan_id' => '9', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '36', 'assessment_pertanyaan_id' => '9', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '37', 'assessment_pertanyaan_id' => '10', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '38', 'assessment_pertanyaan_id' => '10', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '39', 'assessment_pertanyaan_id' => '10', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '40', 'assessment_pertanyaan_id' => '10', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '41', 'assessment_pertanyaan_id' => '11', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '42', 'assessment_pertanyaan_id' => '11', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '43', 'assessment_pertanyaan_id' => '11', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '44', 'assessment_pertanyaan_id' => '11', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '45', 'assessment_pertanyaan_id' => '12', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '46', 'assessment_pertanyaan_id' => '12', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '47', 'assessment_pertanyaan_id' => '12', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '48', 'assessment_pertanyaan_id' => '12', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '49', 'assessment_pertanyaan_id' => '13', 'jawaban' => 'Standar tidak menjadi acuan dalam proses pengembangan strategi organisasi '),
            array('id' => '50', 'assessment_pertanyaan_id' => '13', 'jawaban' => 'Standar masih sebatas acuan dalam proses pengembangan strategi organisasi'),
            array('id' => '51', 'assessment_pertanyaan_id' => '13', 'jawaban' => 'Standar hanya digunakan operasional dalam bagian tertentu'),
            array('id' => '52', 'assessment_pertanyaan_id' => '13', 'jawaban' => 'Strategi organisasii secara eksplisit mengacu kepada standar'),
            array('id' => '53', 'assessment_pertanyaan_id' => '14', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian unit organisasi, dengan sebagian kecil aspek standardisasi dan penilaian kesesuaian '),
            array('id' => '54', 'assessment_pertanyaan_id' => '14', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian besar unit organisasi, dengan beberapa aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '55', 'assessment_pertanyaan_id' => '14', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan hampir keseluruh unit organisasi, dengan sebagian besar aspek standardisasi dan penilaian kesesuaian '),
            array('id' => '56', 'assessment_pertanyaan_id' => '14', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '57', 'assessment_pertanyaan_id' => '15', 'jawaban' => 'Evaluasi dilakukan secara periodik. Evaluasi dilakukan berdasarkan fakta dan data hasil kinerja namun tindak lanjut belum efektif '),
            array('id' => '58', 'assessment_pertanyaan_id' => '15', 'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran.'),
            array('id' => '59', 'assessment_pertanyaan_id' => '15', 'jawaban' => 'SAda evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keungulan di sebagian fungsi dan unit Organisasi.'),
            array('id' => '60', 'assessment_pertanyaan_id' => '15', 'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keungulan di seluruh fungsi dan unit Organisasi.'),
            array('id' => '61', 'assessment_pertanyaan_id' => '16', 'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan dasar Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang'),
            array('id' => '62', 'assessment_pertanyaan_id' => '16', 'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi.'),
            array('id' => '63', 'assessment_pertanyaan_id' => '16', 'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi.Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul.'),
            array('id' => '64', 'assessment_pertanyaan_id' => '16', 'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi.Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul. Ada penyelarasan tindak lanjut hasil pembelajaran dan terobosan yang menjadi sistem baru keunggulan organisasi.'),
            array('id' => '65', 'assessment_pertanyaan_id' => '17', 'jawaban' => 'Perusahaan belum secara jelas mengalokasikan sumber daya dan belum menetapkan KPI yang berkaitan dengan standar (SNI)'),
            array('id' => '66', 'assessment_pertanyaan_id' => '17', 'jawaban' => 'Perusahaan mengalokasikan sumber daya terbatas dan belum menetapkan KPI yang berkaitan dengan standar (SNI) '),
            array('id' => '67', 'assessment_pertanyaan_id' => '17', 'jawaban' => 'Perusahaan sudah mengalokasikan sumber daya yang memadai namun belum menetapkan KPI yang berkaitan dengan standar (SNI)'),
            array('id' => '68', 'assessment_pertanyaan_id' => '17', 'jawaban' => 'Perusahaan sudah mengalokasikan sumber daya yang memadai dan telah menetapkan KPI yang berkaitan dengan standar (SNI)'),
            array('id' => '69', 'assessment_pertanyaan_id' => '18', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian unit organisasi, dengan sebagian kecil aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '70', 'assessment_pertanyaan_id' => '18', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian besar unit organisasi, dengan beberapa aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '71', 'assessment_pertanyaan_id' => '18', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan hampir keseluruh unit organisasi, dengan sebagian besar aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '72', 'assessment_pertanyaan_id' => '18', 'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian'),
            array('id' => '73', 'assessment_pertanyaan_id' => '19', 'jawaban' => 'Evaluasi dilakukan secara periodik. Evaluasi dilakukan berdasarkan fakta dan data hasil kinerja namun tindak lanjut belum efektif '),
            array('id' => '74', 'assessment_pertanyaan_id' => '19', 'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran.'),
            array(
                'id' => '75',
                'assessment_pertanyaan_id' => '19',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keungulan di sebagian fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '76',
                'assessment_pertanyaan_id' => '19',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keungulan di seluruh fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '77',
                'assessment_pertanyaan_id' => '20',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan dasar Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang.'
            ),
            array(
                'id' => '78',
                'assessment_pertanyaan_id' => '20',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi.'
            ),
            array(
                'id' => '79',
                'assessment_pertanyaan_id' => '20',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul.'
            ),
            array(
                'id' => '80',
                'assessment_pertanyaan_id' => '20',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul. Ada penyelarasan tindak lanjut hasil pembelajaran dan terobosan yang menjadi sistem baru keunggulan organisasi.'
            ),
            array(
                'id' => '81',
                'assessment_pertanyaan_id' => '21',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem, untuk mendapatkan informasi berinteraksi dan mengidentifikasi kebutuhan keinginan dan harapan pelanggan.'
            ),
            array(
                'id' => '82',
                'assessment_pertanyaan_id' => '21',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem, untuk mendapatkan informasi berinteraksi dan mengidentifikasi kebutuhan keinginan dan harapan pelanggan dengan berbasis pada SNI ISO10008.'
            ),
            array(
                'id' => '83',
                'assessment_pertanyaan_id' => '21',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem, untuk mendapatkan informasi berinteraksi dan mengidentifikasi kebutuhan keinginan dan harapan pelanggan berbasis pada SNI ISO 10008 dan memiliki program untuk mengedukasi/awareness customer penggunaan SNI.'
            ),
            array(
                'id' => '84',
                'assessment_pertanyaan_id' => '21',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem, untuk mendapatkan informasi berinteraksi dan mengidentifikasi kebutuhan keinginan dan harapan pelanggan, sudah berbasis SNI ISO10008 dan memiliki program untuk mengedukasi/awareness customer penggunaan SNI dan menjadi role model.'
            ),
            array(
                'id' => '85',
                'assessment_pertanyaan_id' => '22',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian unit organisasi, dengan sebagian kecil aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '86',
                'assessment_pertanyaan_id' => '22',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian besar unit organisasi, dengan beberapa aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '87',
                'assessment_pertanyaan_id' => '22',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan hampir keseluruh unit organisasi, dengan sebagian besar aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '88',
                'assessment_pertanyaan_id' => '22',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '89',
                'assessment_pertanyaan_id' => '23',
                'jawaban' => 'Evaluasi dilakukan secara periodik. Evaluasi dilakukan berdasarkan fakta dan data hasil kinerja namun tindak lanjut belum efektif.'
            ),
            array(
                'id' => '90',
                'assessment_pertanyaan_id' => '23',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran.'
            ),
            array(
                'id' => '91',
                'assessment_pertanyaan_id' => '23',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keunggulan di sebagian fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '92',
                'assessment_pertanyaan_id' => '23',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keunggulan di seluruh fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '93',
                'assessment_pertanyaan_id' => '24',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan dasar Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang.'
            ),
            array(
                'id' => '94',
                'assessment_pertanyaan_id' => '24',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi.'
            ),
            array(
                'id' => '95',
                'assessment_pertanyaan_id' => '24',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul.'
            ),
            array(
                'id' => '96',
                'assessment_pertanyaan_id' => '24',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul. Ada penyelarasan tindak lanjut hasil pembelajaran dan terobosan yang menjadi sistem baru keunggulan organisasi.'
            ),
            array(
                'id' => '97',
                'assessment_pertanyaan_id' => '25',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem, untuk mendapatkan tingkat kepuasan dan penanganan keluhan pelanggan.'
            ),
            array(
                'id' => '98',
                'assessment_pertanyaan_id' => '25',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem, untuk mendapatkan tingkat kepuasan dan penanganan keluhan pelanggan dengan berbasis pada SNI ISO 10002.'
            ),
            array(
                'id' => '99',
                'assessment_pertanyaan_id' => '25',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem, untuk mendapatkan tingkat kepuasan dan penanganan keluhan pelanggan berbasis pada SNI ISO 10002 dan telah menetapkan KPI terkait tingkat kepuasan dan penanganan keluhan pelanggan.'
            ),
            array(
                'id' => '100',
                'assessment_pertanyaan_id' => '25',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem, untuk mendapatkan tingkat kepuasan dan penanganan keluhan pelanggan, sudah berbasis SNI ISO 10002 dan menggunakan hasil analisis survey keluhan pelanggan untuk menentukan inovasi proses/produk untuk pengembangan di masa mendatang.'
            ),
            array(
                'id' => '101',
                'assessment_pertanyaan_id' => '26',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian unit organisasi, dengan sebagian kecil aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '102',
                'assessment_pertanyaan_id' => '26',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian besar unit organisasi, dengan beberapa aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '103',
                'assessment_pertanyaan_id' => '26',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan hampir keseluruh unit organisasi, dengan sebagian besar aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '104',
                'assessment_pertanyaan_id' => '26',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '105',
                'assessment_pertanyaan_id' => '27',
                'jawaban' => 'Evaluasi dilakukan secara periodik. Evaluasi dilakukan berdasarkan fakta dan data hasil kinerja namun tindak lanjut belum efektif.'
            ),
            array(
                'id' => '106',
                'assessment_pertanyaan_id' => '27',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran.'
            ),
            array(
                'id' => '107',
                'assessment_pertanyaan_id' => '27',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keunggulan di sebagian fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '108',
                'assessment_pertanyaan_id' => '27',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keunggulan di seluruh fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '109',
                'assessment_pertanyaan_id' => '28',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan dasar Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang.'
            ),
            array(
                'id' => '110',
                'assessment_pertanyaan_id' => '28',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi.'
            ),
            array(
                'id' => '111',
                'assessment_pertanyaan_id' => '28',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul.'
            ),
            array(
                'id' => '112',
                'assessment_pertanyaan_id' => '28',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul. Ada penyelarasan tindak lanjut hasil pembelajaran dan terobosan yang menjadi sistem baru keunggulan organisasi.'
            ),
            array(
                'id' => '113',
                'assessment_pertanyaan_id' => '29',
                'jawaban' => 'Standar tidak menjadi acuan dalam melakukan pendekatan dan metode pengembangan sistem manajemen sumber daya manusia organisasi.'
            ),
            array(
                'id' => '114',
                'assessment_pertanyaan_id' => '29',
                'jawaban' => 'Berbasis standar SNI ISO 30414:2018.'
            ),
            array(
                'id' => '115',
                'assessment_pertanyaan_id' => '29',
                'jawaban' => 'Sudah memiliki struktur organisasi yang mengelola standar.'
            ),
            array(
                'id' => '116',
                'assessment_pertanyaan_id' => '29',
                'jawaban' => 'Sudah memiliki program pelatihan terkait standar dan penilaian kesesuaian dalam rangka memenuhi kompetensi dan career path standar dan penilaian kesesuaian.'
            ),
            array(
                'id' => '117',
                'assessment_pertanyaan_id' => '30',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian unit organisasi, dengan sebagian kecil aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '118',
                'assessment_pertanyaan_id' => '30',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian besar unit organisasi, dengan beberapa aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '119',
                'assessment_pertanyaan_id' => '30',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan hampir keseluruh unit organisasi, dengan sebagian besar aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '120',
                'assessment_pertanyaan_id' => '30',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '121',
                'assessment_pertanyaan_id' => '31',
                'jawaban' => 'Evaluasi dilakukan secara periodik. Evaluasi dilakukan berdasarkan fakta dan data hasil kinerja namun tindak lanjut belum efektif.'
            ),
            array(
                'id' => '122',
                'assessment_pertanyaan_id' => '31',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran.'
            ),
            array(
                'id' => '123',
                'assessment_pertanyaan_id' => '31',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keunggulan di sebagian fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '124',
                'assessment_pertanyaan_id' => '31',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keunggulan di seluruh fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '125',
                'assessment_pertanyaan_id' => '32',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan dasar Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang.'
            ),
            array(
                'id' => '126',
                'assessment_pertanyaan_id' => '32',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi.'
            ),
            array(
                'id' => '127',
                'assessment_pertanyaan_id' => '32',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul.'
            ),
            array(
                'id' => '128',
                'assessment_pertanyaan_id' => '32',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul. Ada penyelarasan tindak lanjut hasil pembelajaran dan terobosan yang menjadi sistem baru keunggulan organisasi.'
            ),
            array(
                'id' => '129',
                'assessment_pertanyaan_id' => '33',
                'jawaban' => 'Standar telah menjadi acuan dalam melakukan pendekatan dan metode pengembangan sistem manajemen sumber daya manusia organisasi.'
            ),
            array(
                'id' => '130',
                'assessment_pertanyaan_id' => '33',
                'jawaban' => 'Berbasis standar SNI ISO 450001.'
            ),
            array(
                'id' => '131',
                'assessment_pertanyaan_id' => '33',
                'jawaban' => 'Sudah memiliki struktur organisasi terkait dengan SMK3.'
            ),
            array(
                'id' => '132',
                'assessment_pertanyaan_id' => '33',
                'jawaban' => 'Sudah memiliki program pelatihan terkait standar dan penilaian kesesuaian dalam rangka memenuhi kompetensi dan karir planing standar dan penilaian kesesuaian.'
            ),
            array(
                'id' => '133',
                'assessment_pertanyaan_id' => '34',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian unit organisasi, dengan sebagian kecil aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '134',
                'assessment_pertanyaan_id' => '34',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian besar unit organisasi, dengan beberapa aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '135',
                'assessment_pertanyaan_id' => '34',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan hampir keseluruh unit organisasi, dengan sebagian besar aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '136',
                'assessment_pertanyaan_id' => '34',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '137',
                'assessment_pertanyaan_id' => '35',
                'jawaban' => 'Evaluasi dilakukan secara periodik. Evaluasi dilakukan berdasarkan fakta dan data hasil kinerja namun tindak lanjut belum efektif.'
            ),
            array(
                'id' => '138',
                'assessment_pertanyaan_id' => '35',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran.'
            ),
            array(
                'id' => '139',
                'assessment_pertanyaan_id' => '35',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keunggulan di sebagian fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '140',
                'assessment_pertanyaan_id' => '35',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keunggulan di seluruh fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '141',
                'assessment_pertanyaan_id' => '36',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan dasar Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang.'
            ),
            array(
                'id' => '142',
                'assessment_pertanyaan_id' => '36',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi.'
            ),
            array(
                'id' => '143',
                'assessment_pertanyaan_id' => '36',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul.'
            ),
            array(
                'id' => '144',
                'assessment_pertanyaan_id' => '36',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul. Ada penyelarasan tindak lanjut hasil pembelajaran dan terobosan yang menjadi sistem baru keunggulan organisasi.'
            ),
            array(
                'id' => '145',
                'assessment_pertanyaan_id' => '37',
                'jawaban' => 'Sudah memiliki metode pengembangan sistem operasi untuk memenuhi seluruh persyaratan pemegang saham, SNI pelanggan, regulasi, masyarakat, dan pasar.'
            ),
            array(
                'id' => '146',
                'assessment_pertanyaan_id' => '37',
                'jawaban' => 'SNI sudah diterapkan sebagai masukan penetapan proses produksi dan pengendaliannya.'
            ),
            array(
                'id' => '147',
                'assessment_pertanyaan_id' => '37',
                'jawaban' => 'SNI sudah diterapkan sebagai masukan penetapan proses produksi dan pengendaliannya namun hanya memenuhi SNI Pelanggan dan regulasi pemerintah.'
            ),
            array(
                'id' => '148',
                'assessment_pertanyaan_id' => '37',
                'jawaban' => 'Pendekatan dan metode pengembangan sistem operasi telah mampu memenuhi seluruh persyaratan pemegang saham, SNI pelanggan, regulasi, masyarakat, dan pasar secara eksplisit mengacu kepada standar.'
            ),
            array(
                'id' => '149',
                'assessment_pertanyaan_id' => '38',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian unit organisasi, dengan sebagian kecil aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '150',
                'assessment_pertanyaan_id' => '38',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian besar unit organisasi, dengan beberapa aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '151',
                'assessment_pertanyaan_id' => '38',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan hampir keseluruh unit organisasi, dengan sebagian besar aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '152',
                'assessment_pertanyaan_id' => '38',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '153',
                'assessment_pertanyaan_id' => '39',
                'jawaban' => 'Evaluasi dilakukan secara periodik. Evaluasi dilakukan berdasarkan fakta dan data hasil kinerja namun tindak lanjut belum efektif.'
            ),
            array(
                'id' => '154',
                'assessment_pertanyaan_id' => '39',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran.'
            ),
            array(
                'id' => '155',
                'assessment_pertanyaan_id' => '39',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keunggulan di sebagian fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '156',
                'assessment_pertanyaan_id' => '39',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keunggulan di seluruh fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '157',
                'assessment_pertanyaan_id' => '40',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan dasar Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang.'
            ),
            array(
                'id' => '158',
                'assessment_pertanyaan_id' => '40',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi.'
            ),
            array(
                'id' => '159',
                'assessment_pertanyaan_id' => '40',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul.'
            ),
            array(
                'id' => '160',
                'assessment_pertanyaan_id' => '40',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul. Ada penyelarasan tindak lanjut hasil pembelajaran dan terobosan yang menjadi sistem baru keunggulan organisasi.'
            ),
            array(
                'id' => '161',
                'assessment_pertanyaan_id' => '41',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem terkait dengan pengendalian dan pengembangan pemasok.'
            ),
            array(
                'id' => '162',
                'assessment_pertanyaan_id' => '41',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem terkait dengan pengendalian dan pengembangan pemasok dengan persyaratan SNI dalam proses tender.'
            ),
            array(
                'id' => '163',
                'assessment_pertanyaan_id' => '41',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem terkait dengan pengendalian dan pengembangan pemasok dengan persyaratan SNI dalam proses tender dan pemenuhan TKDN.'
            ),
            array(
                'id' => '164',
                'assessment_pertanyaan_id' => '41',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem terkait dengan pengendalian dan pengembangan pemasok dengan persyaratan SNI dalam proses tender dan pemenuhan TKDN serta telah melakukan edukasi SNI kepada pemasok.'
            ),
            array(
                'id' => '165',
                'assessment_pertanyaan_id' => '42',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian unit organisasi, dengan sebagian kecil aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '166',
                'assessment_pertanyaan_id' => '42',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian besar unit organisasi, dengan beberapa aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '167',
                'assessment_pertanyaan_id' => '42',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan hampir keseluruh unit organisasi, dengan sebagian besar aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '168',
                'assessment_pertanyaan_id' => '42',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '169',
                'assessment_pertanyaan_id' => '43',
                'jawaban' => 'Evaluasi dilakukan secara periodik. Evaluasi dilakukan berdasarkan fakta dan data hasil kinerja namun tindak lanjut belum efektif.'
            ),
            array(
                'id' => '170',
                'assessment_pertanyaan_id' => '43',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran.'
            ),
            array(
                'id' => '171',
                'assessment_pertanyaan_id' => '43',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keunggulan di sebagian fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '172',
                'assessment_pertanyaan_id' => '43',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keunggulan di seluruh fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '173',
                'assessment_pertanyaan_id' => '44',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan dasar Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang.'
            ),
            array(
                'id' => '174',
                'assessment_pertanyaan_id' => '44',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi.'
            ),
            array(
                'id' => '175',
                'assessment_pertanyaan_id' => '44',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul.'
            ),
            array(
                'id' => '176',
                'assessment_pertanyaan_id' => '44',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul. Ada penyelarasan tindak lanjut hasil pembelajaran dan terobosan yang menjadi sistem baru keunggulan organisasi.'
            ),
            array(
                'id' => '177',
                'assessment_pertanyaan_id' => '45',
                'jawaban' => 'Sudah memiliki metode pengelolaan data dan informasi.'
            ),
            array(
                'id' => '178',
                'assessment_pertanyaan_id' => '45',
                'jawaban' => 'Perusahaan sudah menggunakan aplikasi untuk melakukan tracking progres dan pencapaian KPI, strategi objektif.'
            ),
            array(
                'id' => '179',
                'assessment_pertanyaan_id' => '45',
                'jawaban' => 'Perusahaan sudah melakukan sistem pengelolaan database yang terintegrasi.'
            ),
            array(
                'id' => '180',
                'assessment_pertanyaan_id' => '45',
                'jawaban' => 'Perusahaan sudah melakukan sistem pengelolaan database yang terintegrasi dan menerapkan SNI ISO 370001.'
            ),
            array(
                'id' => '181',
                'assessment_pertanyaan_id' => '46',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian unit organisasi, dengan sebagian kecil aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '182',
                'assessment_pertanyaan_id' => '46',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian besar unit organisasi, dengan beberapa aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '183',
                'assessment_pertanyaan_id' => '46',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan hampir keseluruh unit organisasi, dengan sebagian besar aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '184',
                'assessment_pertanyaan_id' => '46',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '185',
                'assessment_pertanyaan_id' => '47',
                'jawaban' => 'Evaluasi dilakukan secara periodik. Evaluasi dilakukan berdasarkan fakta dan data hasil kinerja namun tindak lanjut belum efektif.'
            ),
            array(
                'id' => '186',
                'assessment_pertanyaan_id' => '47',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran.'
            ),
            array(
                'id' => '187',
                'assessment_pertanyaan_id' => '47',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keungulan di sebagian fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '188',
                'assessment_pertanyaan_id' => '47',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keungulan di seluruh fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '189',
                'assessment_pertanyaan_id' => '48',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan dasar Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang.'
            ),
            array(
                'id' => '190',
                'assessment_pertanyaan_id' => '48',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi.'
            ),
            array(
                'id' => '191',
                'assessment_pertanyaan_id' => '48',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul.'
            ),
            array(
                'id' => '192',
                'assessment_pertanyaan_id' => '48',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul. Ada penyelarasan tindak lanjut hasil pembelajaran dan terobosan yang menjadi sistem baru keunggulan organisasi.'
            ),
            array(
                'id' => '193',
                'assessment_pertanyaan_id' => '49',
                'jawaban' => 'Sudah memiliki metode pengelolaan pengetahuan dan pembelajaran organisasi secara internal.'
            ),
            array(
                'id' => '194',
                'assessment_pertanyaan_id' => '49',
                'jawaban' => 'Perusahaan sudah melakukan transfer knowledge internal dan eksternal.'
            ),
            array(
                'id' => '195',
                'assessment_pertanyaan_id' => '49',
                'jawaban' => 'Perusahaan sudah melakukan transfer knowledge internal dan eksternal dengan menggunakan aplikasi yang terintegrasi.'
            ),
            array(
                'id' => '196',
                'assessment_pertanyaan_id' => '49',
                'jawaban' => 'Perusahaan sudah melakukan transfer knowledge internal dan eksternal dengan menggunakan aplikasi yang terintegrasi dan memiliki modul-modul pelatihan maupun knowledge terkait dengan SNI.'
            ),
            array(
                'id' => '197',
                'assessment_pertanyaan_id' => '50',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian unit organisasi, dengan sebagian kecil aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '198',
                'assessment_pertanyaan_id' => '50',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian besar unit organisasi, dengan beberapa aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '199',
                'assessment_pertanyaan_id' => '50',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan hampir keseluruh unit organisasi, dengan sebagian besar aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '200',
                'assessment_pertanyaan_id' => '50',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '201',
                'assessment_pertanyaan_id' => '51',
                'jawaban' => 'Evaluasi dilakukan secara periodik. Evaluasi dilakukan berdasarkan fakta dan data hasil kinerja namun tindak lanjut belum efektif.'
            ),
            array(
                'id' => '202',
                'assessment_pertanyaan_id' => '51',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran.'
            ),
            array(
                'id' => '203',
                'assessment_pertanyaan_id' => '51',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keungulan di sebagian fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '204',
                'assessment_pertanyaan_id' => '51',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keungulan di seluruh fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '205',
                'assessment_pertanyaan_id' => '52',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan dasar Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang.'
            ),
            array(
                'id' => '206',
                'assessment_pertanyaan_id' => '52',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi.'
            ),
            array(
                'id' => '207',
                'assessment_pertanyaan_id' => '52',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul.'
            ),
            array(
                'id' => '208',
                'assessment_pertanyaan_id' => '52',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul. Ada penyelarasan tindak lanjut hasil pembelajaran dan terobosan yang menjadi sistem baru keunggulan organisasi.'
            ),
            array(
                'id' => '209',
                'assessment_pertanyaan_id' => '53',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem terkait dengan Manajemen Inovasi.'
            ),
            array(
                'id' => '210',
                'assessment_pertanyaan_id' => '53',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem terkait dengan Manajemen Inovasi hanya terbatas kepada perbaikan proses.'
            ),
            array(
                'id' => '211',
                'assessment_pertanyaan_id' => '53',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem terkait dengan Manajemen Inovasi mencakup proses dan produk yang mengacu kepada ISO 56002.'
            ),
            array(
                'id' => '212',
                'assessment_pertanyaan_id' => '53',
                'jawaban' => 'Sudah memiliki metode prosedur atau sistem terkait dengan Manajemen Inovasi mencakup proses dan produk yang mengacu kepada ISO 56002 serta ada inovasi terkait dengan SNI.'
            ),
            array(
                'id' => '213',
                'assessment_pertanyaan_id' => '54',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian unit organisasi, dengan sebagian kecil aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '214',
                'assessment_pertanyaan_id' => '54',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan sebagian besar unit organisasi, dengan beberapa aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '215',
                'assessment_pertanyaan_id' => '54',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach terhadap masukan, proses dan keluaran dan disebarluaskan hampir keseluruh unit organisasi, dengan sebagian besar aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '216',
                'assessment_pertanyaan_id' => '54',
                'jawaban' => 'Ada penerapan pendekatan dan metode yang sesuai dengan tahapan pendekatan/approach untuk semua tingkatan dan disebarluaskan keseluruh unit organisasi, dengan keseluruhan semua aspek standardisasi dan penilaian kesesuaian.'
            ),
            array(
                'id' => '217',
                'assessment_pertanyaan_id' => '55',
                'jawaban' => 'Evaluasi dilakukan secara periodik. Evaluasi dilakukan berdasarkan fakta dan data hasil kinerja namun tindak lanjut belum efektif.'
            ),
            array(
                'id' => '218',
                'assessment_pertanyaan_id' => '55',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran.'
            ),
            array(
                'id' => '219',
                'assessment_pertanyaan_id' => '55',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keungulan di sebagian fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '220',
                'assessment_pertanyaan_id' => '55',
                'jawaban' => 'Ada evaluasi secara periodik, sistematis, dan menyeluruh berdasarkan fakta dan data hasil capaian, serta ada tindaklanjutnya. Ada bukti yang memperlihatkan tingkat efisiensi, efektifitas, dan produktivitas, sebagai hasil perbaikan proses-proses utama Organisasi. Ada hasil pembelajaran dan terobosan yang menjadi keungulan di seluruh fungsi dan unit Organisasi.'
            ),
            array(
                'id' => '221',
                'assessment_pertanyaan_id' => '56',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan dasar Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang.'
            ),
            array(
                'id' => '222',
                'assessment_pertanyaan_id' => '56',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi.'
            ),
            array(
                'id' => '223',
                'assessment_pertanyaan_id' => '56',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul.'
            ),
            array(
                'id' => '224',
                'assessment_pertanyaan_id' => '56',
                'jawaban' => 'Ada pendekatan yang selaras dengan kebutuhan Organisasi saat ini dan yang akan datang, yang teridentifikasi dan dirancang perencanaannya, baik jangka pendek maupun jangka panjang, dalam rangka mewujudkan keunggulan Organisasi. Ada keselarasan pernyataan di antara profil Organisasi, visi dan misi, serta lintas fungsi, yang memperlihatkan tekad untuk menjadi perusahaan yang unggul. Ada penyelarasan tindak lanjut hasil pembelajaran dan terobosan yang menjadi sistem baru keunggulan organisasi.'
            ),
        );

        DB::table('assessment_jawaban')->insert($assessment_jawaban);
    }
}