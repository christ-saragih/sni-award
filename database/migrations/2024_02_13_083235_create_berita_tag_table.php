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
        Schema::create('berita_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('tag_id')->unsigned();
            $table->bigInteger('berita_id')->unsigned();
            $table->timestamps();

            $table->foreign('tag_id')->references('id')->on('tag_berita');
            $table->foreign('berita_id')->references('id')->on('berita')->onDelete('restrict');

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
        Schema::dropIfExists('berita_tag');
    }
};
