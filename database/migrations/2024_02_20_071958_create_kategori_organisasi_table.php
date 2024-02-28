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
        Schema::create('kategori_organisasi', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->tinyInteger('tipe_kategori_id')->unsigned();
            $table->string('nama');
            $table->timestamps();

            $table->foreign('tipe_kategori_id')->references('id')->on('tipe_kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_organisasi');
    }
};
