<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->unsignedInteger('kode_kios');
            $table->foreign('kode_kios')->references('kode')->on('kios')->onDelete('restrict');
            $table->unsignedInteger('peran_id');
            $table->foreign('peran_id')->references('id')->on('peran')->onDelete('restrict');
            $table->enum('aktif',[0,1])->default(1);
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
