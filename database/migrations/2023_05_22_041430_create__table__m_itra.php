<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Mitra', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mitra');
            $table->string('lokasi_bisnis');
            $table->string('detail_mitra');
            $table->string('status_verifikasi', 1)->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Mitra');
    }
};
