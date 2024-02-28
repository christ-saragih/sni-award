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
        Schema::create('registrasi_penilaian', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('registrasi_id')->unsigned();
            $table->foreign('registrasi_id')->references('id')->on('registrasi');
            $table->integer('evaluator_id')->unsigned();
            $table->foreign('evaluator_id')->references('id')->on('users');
            $table->enum('jabatan',['evaluator','lead_evaluator']);
            $table->tinyInteger('stage')->unsigned();
            $table->foreign('stage')->references('id')->on('stage');
            $table->string('url_dokumen_penilaian');
            $table->integer('skor');
            $table->text('catatan');
            // final belum
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi_penilaian');
    }
};
