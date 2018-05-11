<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDompetKebaikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dompet_kebaikans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user');
            $table->biginteger('nominal');
            $table->string('pic_bukti_transfer',50);
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
        Schema::dropIfExists('dompet_kebaikans');
    }
}
