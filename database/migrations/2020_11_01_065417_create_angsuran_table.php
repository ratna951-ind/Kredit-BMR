<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAngsuranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angsuran', function (Blueprint $table) {
            $table->increments('pinjaman');
            $table->integer('bln_6');
            $table->integer('bln_12');
            $table->integer('bln_18');
            $table->integer('bln_24');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('angsuran');
    }
}
