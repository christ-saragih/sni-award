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
        Schema::create('kota', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->tinyInteger('propinsi_id')->unsigned();
            $table->string('nama');
            $table->timestamps();
            $table->foreign('propinsi_id')->references('id')->on('propinsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kota');
    }
};
