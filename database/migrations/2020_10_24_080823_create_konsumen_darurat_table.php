<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonsumenDaruratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsumen_darurat', function (Blueprint $table) {
            $table->string('nik', 18)->primary();
            $table->foreign('nik')->references('nik')->on('konsumen')->onDelete('cascade');
            $table->string('nama_darurat', 50);
            $table->string('hubungan', 30);
            $table->text('alamat_darurat');
            $table->string('telp_darurat', 14);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsumen_darurat');
    }
}
