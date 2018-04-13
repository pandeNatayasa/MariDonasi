<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalangDanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galang_danas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user_organisasi');
            $table->integer('id_campaign_user_organisasi');
            $table->biginteger('nominal',20);
            $table->enum('bank',['bri','bni','mandiri','bca','cimb']);
            $table->enum('status',['onGoing','paidOff','cancel']);
            $table->enum('privacy',['anonim','publik']);
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
        Schema::dropIfExists('galang_danas');
    }
}
