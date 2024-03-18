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
        Schema::create('registrasi_assessment_peserta', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('pendaftaran_id')->unsigned();
            $table->mediumInteger('assessment_pertanyaan_id')->unsigned();
            $table->mediumInteger('assessment_jawaban_id')->unsigned();
            $table->integer('score')->default(0);

            $table->foreign('pendaftaran_id')->references('id')->on('pendaftaran_peserta');
            $table->foreign('assessment_pertanyaan_id')->references('id')->on('assessment_pertanyaan');
            $table->foreign('assessment_jawaban_id')->references('id')->on('assessment_jawaban');
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
        Schema::dropIfExists('registrasi_assessment_peserta');
    }
};