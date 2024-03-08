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
        Schema::create('assessment_jawaban', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('assessment_pertanyaan_id')->unsigned();
            $table->foreign('assessment_pertanyaan_id')->references('id')->on('assessment_pertanyaan');
            $table->string('jawaban');
            $table->enum('status_jawaban',['FALSE','TRUE'])->nullable(true);
            $table->integer('poin')->nullable(true);
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable(true) ;
            $table->unsignedBigInteger('updated_by')->nullable(true);
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('assessment_jawaban');
    // }
};
