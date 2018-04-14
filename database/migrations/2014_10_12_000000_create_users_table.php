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
            $table->string('name',50);
            $table->string('email',50)->unique();
            $table->string('password',50);
            $table->string('no_telp',15);
            $table->string('lokasi'100);
            $table->text('bio');
            $table->string('profil_pic',200);
            $table->string('ktp_pic',200);
            $table->string('verif_pic',200);
            $table->integer('wallet',50);
            $table->integer('camp_earn',50);
            $table->enum('status',['verified','non-verified']);
            $table->date('last_update');
            $table->rememberToken();
            $table->timestamps();
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
