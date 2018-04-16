<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rek_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user');
            $table->string('no_rek',20);
            $table->string('nama',50);
            $table->enum('status',['verified','non_verified']);
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rek_users');
    }
}
