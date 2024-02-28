<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peserta_profil', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('peserta_id');
            $table->string('url_legalitas_hukum_organisasi');
            $table->string('url_sppt_sni');
            $table->string('url_sk_kemenkumham');
            $table->string('url_kewenangan_kebijakan');
            $table->string('jabatan_tertinggi');
            $table->string('no_hp');
            $table->string('website');
            $table->date('tanggal_beroperasi');
            $table->tinyInteger('status_kepemilikan_id')->unsigned();
            $table->enum('jenis_produk', ['barang','jasa','pendidikan']);
            $table->string('deskripsi_produk');
            $table->tinyInteger('lembaga_sertifikasi_id')->unsigned();
            $table->boolean('produk_export');
            $table->string('negara_tujuan_ekspor');
            $table->tinyInteger('sektor_kategori_organisasi_id')->unsigned();
            $table->string('kekayaan_bersih');
            $table->string('hasil_penjualan_tahunan');
            $table->enum('jenis_organisasi',['induk', 'cabang', 'anak', 'tidak']);
            $table->string('kewenangan_kebijakan');
            $table->timestamps();

            $table->foreign('status_kepemilikan_id')->references('id')->on('status_kepemilikan');
            $table->foreign('lembaga_sertifikasi_id')->references('id')->on('lembaga_sertifikasi');
            $table->foreign('sektor_kategori_organisasi_id')->references('id')->on('kategori_organisasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_profil');
    }
};
;
