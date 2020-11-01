<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPembebanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pembebanans', function (Blueprint $table) {
            $table->integer('order_id');
            $table->integer('pembayaranke', 1);
            $table->string('notransaksi', 20);
            $table->date('tgl_bayar');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pembebanans');
    }
}
