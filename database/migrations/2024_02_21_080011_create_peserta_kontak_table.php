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
        Schema::create('peserta_kontak', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('peserta_id')->unsigned();
            $table->string('nama');
            $table->string('no_hp');
            $table->string('jabatan');
            $table->timestamps();

            $table->foreign('peserta_id')->references('id')->on('peserta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_kontak');
    }
};
