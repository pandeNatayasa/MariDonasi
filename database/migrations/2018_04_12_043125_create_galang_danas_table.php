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
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_campaign_user');
            $table->biginteger('nominal');
            $table->string('bukti_transfer');
            // $table->enum('bank',['bri','bni','mandiri','bca','cimb']);
            $table->enum('status',['onGoing','paidOff','cancel','success']);
            // $table->enum('privacy',['anonim','publik']);
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            $table->foreign('id_user')->references('id')->on('users');
            // $table->foreign('id_user_organisasi')->references('id')->on('organisasis');
            $table->foreign('id_campaign_user')->references('id')->on('campaign_users');
            // $table->foreign('id_campaign_user_organisasi')->references('id')->on('campaign_organisasis');
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
