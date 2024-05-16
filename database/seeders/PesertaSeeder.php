<?php

namespace Database\Seeders;

use App\Models\Peserta;
use App\Models\PesertaKontak;
use App\Models\PesertaProfil;
use App\Models\Registrasi;
use App\Models\RegistrasiAssessment;
use App\Models\RegistrasiDokumen;
use App\Models\RegistrasiPenilaian;
use App\Models\User;
use App\Models\UserProfil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = UserProfil::factory()->create();
        $peserta_id = Peserta::factory()->create();

        PesertaProfil::factory()->create([
            'peserta_id' => $peserta_id->id,
        ]);

        PesertaKontak::factory()->create([
            'peserta_id' => $peserta_id->id,
        ]);

        $registrasi = Registrasi::factory()->create([
            'peserta_id' => $peserta_id->id,
        ]);

        RegistrasiAssessment::factory()->create([
            'registrasi_id' => $registrasi->id,
        ]);

        RegistrasiDokumen::factory()->create([
            'registrasi_id' => $registrasi->id,
        ]);

        RegistrasiPenilaian::factory()->create([
            'registrasi_id' => $registrasi->id,
            'internal_id' => $user->id
        ]);
    }
}
