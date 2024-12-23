<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AssessmentKategoriSeeder::class,
            AssessmentSubKategoriSeeder::class,
            AssessmentPertanyaanSeeder::class,
            AssessmentJawabanSeeder::class,
            FrontPageSeeder::class,
            // KategoriBeritaSeeder::class,
            TipeKategoriSeeder::class,
            KategoriOrganisasiSeeder::class,
            KonfigurasiSeeder::class,
            LembagaSertifikasiSeeder::class,
            RoleSeeder::class,
            StatusKepemilikanSeeder::class,
            UserSeeder::class,
            UserProfilSeeder::class,
            ProvinsiSeeder::class,
            KotaSeeder::class,
            FrontPageSeeder::class,
            DokumenSeeder::class,
            StatusSeeder::class,
            StageSeeder::class,
            PesertaSeeder::class,
            FaqSeeder::class,
            KecamatanSeeder::class,
            // PesertaProfilSeeder::class,
            // PesertaKontakSeeder::class,
            // RegistrasiSeeder::class,
            // RegistrasiDokumenSeeder::class,
            // RegistrasiAssessmentSeeder::class,
            // RegistrasiPenilaianSeeder::class,
            // BeritaSeeder::class,
            // AcaraSeeder::class,
            // DokumentasiAcaraSeeder::class,
        ]);
    }
}
