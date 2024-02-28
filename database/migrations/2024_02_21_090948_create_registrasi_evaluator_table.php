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
        Schema::create('registrasi_evaluator', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->mediumInteger('registrasi_id')->unsigned();
            $table->tinyInteger('stage')->unsigned();
            $table->integer('evaluator_id')->unsigned();
            $table->integer('lead_evaluator_id')->unsigned();
            $table->foreign('registrasi_id')->references('id')->on('registrasi');
            $table->foreign('stage')->references('id')->on('stage');
            $table->foreign('evaluator_id')->references('id')->on('users');
            $table->foreign('lead_evaluator_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi_evaluator');
    }
};
