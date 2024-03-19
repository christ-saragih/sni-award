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
        Schema::create('registrasi', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->year('tahun');
            $table->integer('peserta_id')->unsigned();
            $table->tinyInteger('status_id')->unsigned();
            $table->tinyInteger('stage_id')->unsigned();
            $table->tinyInteger('kategori_organisasi_id')->unsigned();
            $table->integer('sekretariat_id')->unsigned();
            $table->timestamps();

            $table->foreign('peserta_id')->references('id')->on('peserta');
            $table->foreign('kategori_organisasi_id')->references('id')->on('kategori_organisasi');
            $table->foreign('sekretariat_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('stage_id')->references('id')->on('stage');
            $table->unsignedBigInteger('created_by')->nullable(true) ;
            $table->unsignedBigInteger('updated_by')->nullable(true);
            $table->enum('role_by', ['User', 'Peserta'])->nullable(true);
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable(true);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi');
    }
};