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
            $table->integer('registrasi_id')->unsigned();
            $table->tinyInteger('stage')->unsigned();
            $table->integer('evaluator_id')->unsigned();
            $table->integer('lead_evaluator_id')->unsigned();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable(true) ;
            $table->unsignedBigInteger('updated_by')->nullable(true);
            $table->enum('role_by', ['User', 'Peserta'])->nullable(true);
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable(true);

            $table->foreign('registrasi_id')->references('id')->on('registrasi');
            $table->foreign('stage')->references('id')->on('stage');
            $table->foreign('evaluator_id')->references('id')->on('users');
            $table->foreign('lead_evaluator_id')->references('id')->on('users');
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
