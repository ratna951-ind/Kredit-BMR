<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonsumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsumen', function (Blueprint $table) {
            $table->string('nik', 18);
            $table->string('nama', 50);
            $table->string('tmptlahir', 20);
            $table->date('tgllahir');
            $table->text('alamatktp');
            $table->text('alamatskrng');
            $table->string('telp', 14);
            $table->enum('jk', ['L', 'P'])->comment('Laki, Perempuan');
            $table->string('ibukandung', 50);
            $table->enum('status', ['K', 'BK', 'C'])->comment('Kawin, Belum Kawin, Cerai');
            $table->enum('statusrumah', ['Sen', 'K', 'Sew', 'KPR', 'D', 'L'])->comment('Sendiri, Keluarga, Sewa, KPR, Dinas, Lain-lain');
            $table->integer('lamamenetapbulan');
            $table->enum('pendidikanterakhir', ['SD', 'SLTP', 'SLTA', 'Akademi', 'Universitas']);
            $table->string('nama_2', 50);
            $table->string('tmptlahir_2', 20);
            $table->date('tgllahir_2');
            $table->string('gambarktp');
            $table->string('gambarkk');
            $table->string('gambarktp_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsumen');
    }
}
