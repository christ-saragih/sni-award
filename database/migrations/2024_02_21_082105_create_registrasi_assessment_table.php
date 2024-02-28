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
        Schema::create('registrasi_assessment', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->integer('score');
            $table->mediumInteger('registrasi_id')->unsigned();
            $table->mediumInteger('assessment_pertanyaan_id')->unsigned();
            $table->mediumInteger('assessment_jawaban_id')->unsigned();
            $table->timestamps();

            $table->foreign('registrasi_id')->references('id')->on('registrasi');
            $table->foreign('assessment_pertanyaan_id')->references('id')->on('assessment_pertanyaan');
            $table->foreign('assessment_jawaban_id')->references('id')->on('assessment_jawaban');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi_assessment');
    }
};
