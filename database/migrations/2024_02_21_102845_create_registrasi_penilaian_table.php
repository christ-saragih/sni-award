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
        Schema::create('registrasi_penilaian', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->integer('registrasi_id')->unsigned();
            $table->integer('internal_id')->unsigned();
            $table->enum('jabatan',['evaluator','lead_evaluator']);
            $table->tinyInteger('stage_id')->unsigned();
            $table->string('url_dokumen_penilaian');
            $table->integer('skor');
            $table->text('catatan');
            $table->boolean('final')->default(0);

            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable(true) ;
            $table->unsignedBigInteger('updated_by')->nullable(true);
            $table->enum('role_by', ['User', 'Peserta'])->nullable(true);
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable(true);

            $table->foreign('registrasi_id')->references('id')->on('registrasi');
            $table->foreign('internal_id')->references('id')->on('users');
            $table->foreign('stage_id')->references('id')->on('stage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi_penilaian');
    }
};
