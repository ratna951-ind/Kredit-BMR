<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonsumenPekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsumen_pekerjaan', function (Blueprint $table) {
            $table->string('nik', 18)->primary();
            $table->foreign('nik')->references('nik')->on('konsumen')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('tipe', ['Karyawan', 'Non Karyawan']);
            $table->string('perusahaan', 50);
            $table->tinyInteger('masakerja');
            $table->text('alamat_pekerjaan');
            $table->string('telp_pekerjaan', 14)->nullable();
            $table->string('jabatan', 20);
            $table->integer('penghasilan');
            $table->string('perusahaan_2', 50)->nullable();
            $table->text('alamat_pekerjaan_2')->nullable();
            $table->string('telp_pekerjaan_2', 14)->nullable();
            $table->string('jabatan_2', 20)->nullable();
            $table->integer('penghasilan_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsumen_pekerjaan');
    }
}
