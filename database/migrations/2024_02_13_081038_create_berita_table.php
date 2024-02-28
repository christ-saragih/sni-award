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
        Schema::create('berita', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('kategori_berita_id')->unsigned();
            $table->string('slug',100);
            $table->string('judul_berita',255);
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->string('file_gambar');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('kategori_berita_id')->references('id')->on('kategori_berita');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
