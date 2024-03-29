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
        Schema::create('peserta_kontak', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('peserta_id')->unsigned();
            $table->string('nama')->nullable(true);
            $table->string('no_hp')->nullable(true);
            $table->string('jabatan')->nullable(true);
            $table->timestamps();

            $table->foreign('peserta_id')->references('id')->on('peserta');

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
        Schema::dropIfExists('peserta_kontak');
    }
};
