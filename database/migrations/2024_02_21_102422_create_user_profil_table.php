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
        Schema::create('user_profil', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('user_id')->unsigned();
            $table->string('no_hp');
            $table->string('npwp');
            $table->string('no_rekening');
            $table->string('url_cv');
            $table->string('ulr_anti_penyuapan');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
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
        Schema::dropIfExists('user_profil');
    }
};
