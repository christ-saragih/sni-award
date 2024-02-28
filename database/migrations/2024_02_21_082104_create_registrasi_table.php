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
        Schema::create('registrasi', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->date('tahun');
            $table->integer('peserta_id')->unsigned();
            $table->integer('sekretariat_id')->unsigned();
            $table->tinyInteger('status_id')->unsigned();
            $table->tinyInteger('stage_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('stage_id')->references('id')->on('stage');
            $table->foreign('peserta_id')->references('id')->on('peserta');
            $table->foreign('sekretariat_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi');
    }
};
