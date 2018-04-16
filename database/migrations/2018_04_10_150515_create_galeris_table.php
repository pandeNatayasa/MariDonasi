<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalerisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_campaign');
            $table->string('url_media',200);
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            $table->foreign('id_campaign')->references('id')->on('campaign_users');
            // $table->foreign('id_campaign')->references('id')->on('campaign_organisasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galeris');
    }
}
