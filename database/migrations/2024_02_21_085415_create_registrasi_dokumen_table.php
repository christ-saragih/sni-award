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
        Schema::create('registrasi_dokumen', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('registrasi_id')->unsigned();
            $table->tinyInteger('dokumen_id')->unsigned();
            $table->string('url_document');
            $table->text('feedback');
            $table->timestamp('review_at');
            $table->integer('review_by');
            $table->foreign('registrasi_id')->references('id')->on('registrasi');
            $table->foreign('dokumen_id')->references('id')->on('dokumen');
            //$table->foreign('review_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi_dokumen');
    }
};
