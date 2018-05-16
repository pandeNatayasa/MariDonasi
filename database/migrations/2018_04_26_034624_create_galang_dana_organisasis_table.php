<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalangDanaOrganisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galang_dana_organisasis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_organisasi');
            $table->unsignedInteger('id_campaign_organisasi');
            $table->biginteger('nominal');
            $table->string('bukti_transfer',50);
            // $table->enum('bank',['bri','bni','mandiri','bca','cimb']);
            $table->enum('status',['onGoing','paidOff','cancel','success']);
            // $table->enum('privacy',['anonim','publik']);
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            $table->foreign('id_organisasi')->references('id')->on('organisasis');
            // $table->foreign('id_user_organisasi')->references('id')->on('organisasis');
            $table->foreign('id_campaign_organisasi')->references('id')->on('campaign_organisasis');
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
        Schema::dropIfExists('galang_dana_organisasis');
    }
}
