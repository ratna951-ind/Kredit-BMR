<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_bank', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kode_kios');
            $table->foreign('kode_kios')->references('kode')->on('kios')->onDelete('restrict');
            $table->unsignedInteger('order_id')->nullable();
            $table->foreign('order_id')->references('id')->on('jadwal_order')->onDelete('restrict');
            $table->enum('cara_bayar', ['B', 'C'])->comment('Bank, Cash');
            $table->enum('jenis', ['CO', 'PK', 'P'])->comment('Cash Opname, Pengisian Kas, Pencairan');
            $table->integer('jumlah');
            $table->integer('sisa');
            $table->date('tgl');
            $table->string('bukti_std')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kas_bank');
    }
}
