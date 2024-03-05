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
        Schema::create('frontpage', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('keterangan_judul');
            $table->string('gambar_banner');
            $table->text('keterangan_sni');
            $table->string('judul_dokumentasi');
            $table->string('keterangan_dokumentasi');
            $table->string('judul_konten_berita');
            $table->string('keterangan_berita');
            $table->string('alamat');
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('website');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontpage');
    }
};
