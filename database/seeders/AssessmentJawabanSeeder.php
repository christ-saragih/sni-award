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
            array('id' => '1', 'assessment_pertanyaan_id' => '1', 'jawaban' => 'Standar tidak menjadi acuan dalam penetapan visi, misi maupun operasional ', 'status_jawaban' => '', 'poin' => '0'),
            array('id' => '2', 'assessment_pertanyaan_id' => '1', 'jawaban' => 'Standar hanya digunakan operasional dalam bagian tertentu', 'status_jawaban' => '', 'poin' => '0'),
            array('id' => '3', 'assessment_pertanyaan_id' => '1', 'jawaban' => 'Standar masih sebatas acuan dalam penetapan visi, misi dan tata nilai', 'status_jawaban' => '', 'poin' => '0'),
            array('id' => '4', 'assessment_pertanyaan_id' => '1', 'jawaban' => 'Visi, misi dan tata nilai secara eksplisit mengacu kepada standar', 'status_jawaban' => '', 'poin' => '0'),
        );

        DB::table('assessment_jawaban')->insert($assessment_jawaban);
    }
}