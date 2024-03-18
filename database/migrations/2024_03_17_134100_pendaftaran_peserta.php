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
        Schema::create('pendaftaran_peserta', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->year('tahun')->nullable();
            $table->integer('peserta_id')->unsigned();
            $table->enum('status',['aktif','tidak aktif'])->nullable();
            $table->enum('stage',['pendaftaran','cek dokumen','desk evaluation','site evaluation'])->nullable();
            $table->tinyInteger('kategori_organisasi_id')->unsigned();
            $table->integer('sekretariat_id')->unsigned();

            $table->foreign('peserta_id')->references('id')->on('peserta');
            $table->foreign('kategori_organisasi_id')->references('id')->on('kategori_organisasi');
            $table->foreign('sekretariat_id')->references('id')->on('users');
            $table->unsignedBigInteger('created_by')->nullable(true) ;
            $table->unsignedBigInteger('updated_by')->nullable(true);
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable(true);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_peserta');
    }
};