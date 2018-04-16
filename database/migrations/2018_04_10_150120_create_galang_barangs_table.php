<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalangBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galang_barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user_organisasi');
            $table->unsignedInteger('id_campaign_user_organisasi');
            $table->string('barang',100);
            $table->integer('jumlah');
            $table->enum('status',['onGoing','paidOff','cancel']);
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            $table->foreign('id_user_organisasi')->references('id')->on('users');
            // $table->foreign('id_user_organisasi')->references('id')->on('organisasis');
            // $table->foreign('id_campaign_user_organisasi')->references('id')->on('campaign_users');
            $table->foreign('id_campaign_user_organisasi')->references('id')->on('campaign_organisasis');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galang_barangs');
    }
}
