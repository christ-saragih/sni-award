<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrasiAssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('registrasi_assessment')->insert([
            'registrasi_id' => 1,
            'assessment_pertanyaan_id' => 1,
            'assessment_jawaban_id' => 1,
            'score' => null
        ]);
    }
}
