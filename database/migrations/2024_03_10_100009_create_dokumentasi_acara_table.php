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
        Schema::create('dokumentasi_acara', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('acara_id')->unsigned();
            $table->string('gambar_konten');
            $table->timestamps();

            $table->foreign('acara_id')->references('id')->on('acara')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumentasi_acara');
    }
};
