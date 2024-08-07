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
            $table->unsignedInteger('peserta_id');
            $table->unsignedInteger('propinsi_id');
            $table->unsignedInteger('kota_id');
            $table->unsignedInteger('kecamatan_id');
            $table->string('alamat');
            $table->integer('kode_pos');
            $table->enum('tipe', ['Pabrik', 'organisasi']);
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable(true) ;
            $table->unsignedBigInteger('updated_by')->nullable(true);
$table->enum('role_by', ['User', 'Peserta'])->nullable(true);
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable(true);
            $table->foreign('kota_id')->references('id')->on('kota');
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
