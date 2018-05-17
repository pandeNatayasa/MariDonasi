<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePencairanDanaOrganisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencairan_dana_organisasis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_organisasi');
            $table->unsignedInteger('id_campaign_organisasi');
            $table->unsignedInteger('id_rek_organisasi');
            $table->biginteger('nominal');
            $table->enum('status',['onGoing','cancel','success']);
            // $table->enum('privacy',['anonim','publik']);
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            $table->foreign('id_organisasi')->references('id')->on('organisasis');
            // $table->foreign('id_user_organisasi')->references('id')->on('organisasis');
            $table->foreign('id_campaign_organisasi')->references('id')->on('campaign_organisasis');
            $table->foreign('id_rek_organisasi')->references('id')->on('rek_organisasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pencairan_dana_organisasis');
    }
}
