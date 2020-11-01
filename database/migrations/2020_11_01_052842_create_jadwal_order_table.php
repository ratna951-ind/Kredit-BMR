<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik',18);
            $table->foreign('nik')->references('nik')->on('konsumen')->onDelete('restrict');
            $table->string('no_kontrak',14);
            $table->date('tgl_jadwal');
            $table->date('tgl_order');
            $table->integer('harga_barang');
            $table->integer('pinjaman_awal');
            $table->integer('pinjaman_disetujui');
            $table->tinyInteger('tenor');
            $table->integer('angsuran');
            $table->integer('adm');
            $table->string('stnk',20);
            $table->string('bpkb_depan',20);
            $table->string('bpkb_belakang',20);
            $table->string('kwt_jb',20);
            $table->string('mtr_dpn',20);
            $table->string('mtr_blkng',20);
            $table->string('mtr_kanan',20);
            $table->string('mtr_kiri',20);
            $table->string('nosin',20);
            $table->string('noka',20);
            $table->string('selfie',20);
            $table->enum('status', ['J', 'O', 'B', 'D'])->comment('Jadwal, Tolak, Order, Batal, Diterima');
            $table->text('pembatalan');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_order');
    }
}
