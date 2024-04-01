<?php

namespace Database\Seeders;

use App\Models\Registrasi;
use App\Models\RegistrasiAssessment;
use App\Models\RegistrasiDokumen;
use App\Models\RegistrasiPenilaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $registrasi = Registrasi::factory()->create();

        // RegistrasiAssessment::factory()->create([
        //     'registrasi_id' => $registrasi->id,
        // ]);

        // RegistrasiDokumen::factory()->create([
        //     'registrasi_id' => $registrasi->id,
        // ]);

        // RegistrasiPenilaian::factory()->create([
        //     'registrasi_id' => $registrasi->id,
        // ]);
    }
}
