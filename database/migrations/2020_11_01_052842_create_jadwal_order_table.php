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
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->string('nik',18);
            $table->foreign('nik')->references('nik')->on('konsumen')->onUpdate('cascade')->onDelete('restrict');
            $table->string('no_kontrak',14)->nullable();
            $table->date('tgl_jadwal');
            $table->date('tgl_order')->nullable();
            $table->integer('harga_barang')->nullable();
            $table->integer('pinjaman_awal');
            $table->integer('pinjaman_disetujui')->nullable();
            $table->tinyInteger('tenor');
            $table->integer('angsuran');
            $table->integer('adm')->nullable();
            $table->string('stnk',40);
            $table->string('bpkb_depan',40);
            $table->string('bpkb_belakang',40);
            $table->string('kwt_jb',40)->nullable();
            $table->string('mtr_dpn',40);
            $table->string('mtr_blkng',40);
            $table->string('mtr_kanan',40);
            $table->string('mtr_kiri',40);
            $table->string('nosin',40);
            $table->string('noka',40);
            $table->string('selfie',40);
            $table->enum('status', ['J', 'O', 'B', 'D'])->comment('Jadwal, Order, Batal, Diterima')->default('J');
            $table->text('pembatalan')->nullable();

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
