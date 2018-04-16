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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('no_telp',15);
            $table->string('lokasi',100);
            $table->text('bio');
            $table->string('profil_pic',200);
            $table->string('ktp_pic',200);
            $table->string('verif_pic',200);
            $table->biginteger('wallet');
            $table->biginteger('camp_earn');
            $table->enum('status',['verified','non-verified']);
            $table->rememberToken();
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
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
