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
        Schema::create('peserta_alamat', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('peserta_id');
            $table->tinyInteger('propinsi_id');
            $table->tinyInteger('kota_id');
            $table->smallInteger('kecamatan_id');
            $table->string('alamat');
            $table->integer('kode_pos');
            $table->enum('tipe', ['Pubrik', 'organisasi']);
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
        Schema::dropIfExists('peserta_alamat');
    }
};
