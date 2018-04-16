<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidationusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validationusers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->string('no_telp',15);
            $table->string('lokasi',100);
            $table->text('bio');
            $table->string('profil_pic',200);
            $table->string('ktp_pic',200);
            $table->string('verif_pic',200);
            $table->biginteger('wallet');
            $table->biginteger('camp_earn');
            $table->enum('status',['verified','non-verified']);
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
        Schema::dropIfExists('validationusers');
    }
}
