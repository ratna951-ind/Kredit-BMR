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
            $table->string('nik', 18);
            $table->enum('tipe', ['Karyawan', 'Non Karyawan']);
            $table->string('perusahaan', 30);
            $table->integer('masakerja', 3);
            $table->text('alamat');
            $table->string('telp', 14);
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
