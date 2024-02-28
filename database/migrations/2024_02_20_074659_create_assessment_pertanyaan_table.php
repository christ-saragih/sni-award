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
        Schema::create('assessment_pertanyaan', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->tinyInteger('assessment_sub_kategori_id')->unsigned();
            $table->foreign('assessment_sub_kategori_id')->references('id')->on('assessment_sub_kategori');
            $table->string('pertanyaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_pertanyaan');
    }
};
