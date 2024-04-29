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
            $table->integer('registrasi_id')->unsigned();
            $table->tinyInteger('dokumen_id')->unsigned();
            $table->string('url_dokumen');
            $table->enum('status',['proses','ditolak','disetujui'])->nullable();
            $table->text('feedback');
            $table->timestamp('review_at')->nullable(true);
            // $table->integer('review_by');
            //$table->foreign('review_by')->references('id')->on('users');
            $table->timestamps();

            $table->unsignedBigInteger('created_by')->nullable(true) ;
            $table->unsignedBigInteger('updated_by')->nullable(true);
            $table->enum('role_by', ['User', 'Peserta']);
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable(true);

            $table->foreign('registrasi_id')->references('id')->on('registrasi');
            $table->foreign('dokumen_id')->references('id')->on('dokumen');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi_dokumen_peserta');
    }
};
