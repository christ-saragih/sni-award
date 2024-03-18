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
        Schema::create('registrasi_dokumen_peserta', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('pendaftaran_id')->unsigned();
            $table->tinyInteger('dokumen_id')->unsigned();
            $table->string('url_dokumen');
            $table->enum('status',['proses','ditolak','disetujui'])->nullable();
            $table->string('feedback');

            $table->foreign('pendaftaran_id')->references('id')->on('pendaftaran_peserta');
            $table->foreign('dokumen_id')->references('id')->on('dokumen');
            $table->timestamp('review_at')->nullable();
            $table->integer('review_by')->nullable();
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
        Schema::dropIfExists('registrasi_dokumen_peserta');
    }
};