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
        );

        DB::table('assessment_jawaban')->insert($assessment_jawaban);
    }
}