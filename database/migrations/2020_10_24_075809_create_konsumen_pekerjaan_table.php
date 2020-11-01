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
            $table->foreign('nik')->references('nik')->on('konsumen')->onDelete('cascade');
            $table->enum('tipe', ['Karyawan', 'Non Karyawan']);
            $table->string('perusahaan', 30);
            $table->string('masakerja', 3);
            $table->text('alamat');
            $table->string('telp', 14);
            $table->string('jabatan', 20);
            $table->integer('penghasilan');
            $table->string('perusahaan_2', 30);
            $table->text('alamat_2');
            $table->string('telp_2', 14);
            $table->string('jabatan_2', 20);
            $table->integer('penghasilan_2');
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
