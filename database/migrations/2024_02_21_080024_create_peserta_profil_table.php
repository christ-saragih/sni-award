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
            $table->integer('peserta_id');//FK Peserta
            $table->string('url_legalitas_hukum_organisasi')->nullable(true);
            $table->string('url_sppt_sni')->nullable(true);
            $table->string('url_sk_kemenkumham')->nullable(true);
            $table->string('url_kewenangan_kebijakan')->nullable(true);
            $table->string('jabatan_tertinggi')->nullable(true);
            $table->string('no_hp')->nullable(true);
            $table->string('website')->nullable(true);
            $table->date('tanggal_beroperasi')->nullable();
            $table->tinyInteger('status_kepemilikan_id')->unsigned()->nullable(true);// FK Status Kepemilikan
            $table->enum('jenis_produk', ['barang','jasa','pendidikan'])->nullable(true);
            $table->string('deskripsi_produk')->nullable(true);
            $table->tinyInteger('lembaga_sertifikasi_id')->unsigned()->nullable(true);//FK Lembaga Sertifikasi
            $table->boolean('produk_export')->nullable(true);
            $table->string('negara_tujuan_ekspor')->nullable(true);
            $table->tinyInteger('sektor_kategori_organisasi_id')->unsigned()->nullable(true);//FK  Sektor Kategori Organisasi
            $table->string('kekayaan_bersih')->nullable(true);
            $table->string('hasil_penjualan_tahunan')->nullable(true);
            $table->enum('jenis_organisasi',['induk', 'cabang', 'anak', 'tidak'])->nullable(true);
            $table->string('kewenangan_kebijakan')->nullable(true);
            $table->timestamps();

            $table->foreign('status_kepemilikan_id')->references('id')->on('status_kepemilikan');
            $table->foreign('lembaga_sertifikasi_id')->references('id')->on('lembaga_sertifikasi');
            $table->foreign('sektor_kategori_organisasi_id')->references('id')->on('kategori_organisasi');
            $table->unsignedBigInteger('created_by')->nullable(true) ;
            $table->unsignedBigInteger('updated_by')->nullable(true);
$table->enum('role_by', ['User', 'Peserta'])->nullable(true);
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable(true);
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
