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
        Schema::create('assessment_sub_kategori', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->tinyInteger('assessment_kategori_id')->unsigned();
            $table->foreign('assessment_kategori_id')->references('id')->on('assessment_kategori');
            $table->string('nama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_sub_kategori');
    }
};
