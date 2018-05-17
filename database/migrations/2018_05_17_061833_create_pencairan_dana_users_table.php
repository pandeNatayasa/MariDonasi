<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePencairanDanaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencairan_dana_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_campaign_user');
            $table->unsignedInteger('id_rek');
            $table->biginteger('nominal');
            $table->enum('status',['onGoing','cancel','success']);
            // $table->enum('privacy',['anonim','publik']);
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            $table->foreign('id_user')->references('id')->on('users');
            // $table->foreign('id_user_organisasi')->references('id')->on('organisasis');
            $table->foreign('id_campaign_user')->references('id')->on('campaign_users');
            $table->foreign('id_rek')->references('id')->on('rek_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pencairan_dana_users');
    }
}
