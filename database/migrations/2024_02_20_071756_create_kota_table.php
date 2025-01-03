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
        Schema::create('kota', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('kota', 40);
            $table->unsignedInteger('propinsi_id')->index();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable(true) ;
            $table->unsignedBigInteger('updated_by')->nullable(true);
            $table->enum('role_by', ['User', 'Peserta'])->nullable(true);
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable(true);
        });

        Schema::table('kota', function (Blueprint $table) {
            $table->foreign('propinsi_id')
            ->references('id')->on('propinsi')
            ->onDelete('restrict') // Atau bisa menggunakan 'cascade' tergantung kebutuhan bisnis
            ->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kota');
    }
};
