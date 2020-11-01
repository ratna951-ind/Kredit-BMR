<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_banks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kode_kios')->nullable();
            $table->foreign('kode_kios')->references('kode')->on('kios')->onDelete('restrict');
            $table->integer('order_id');
            $table->enum('cara_bayar', ['B', 'C'])->comment('Bank, Cash');
            $table->string('bank', 10);
            $table->enum('jenis', ['CO', 'PK', 'P'])->comment('Cash Opname, Pengisian Kas, Pencairan');
            $table->integer('jumlah');
            $table->integer('sisa');
            $table->date('tgl');
            $table->string('bukti_std', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kas_banks');
    }
}
