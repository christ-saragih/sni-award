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
        Schema::create('acara', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul_acara');
            $table->string('gambar_thumbnail');
            $table->string('slug');
            $table->date('tanggal');
            $table->text('deskripsi');
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
    public function down(): void
    {
        Schema::dropIfExists('acara');
    }
};
