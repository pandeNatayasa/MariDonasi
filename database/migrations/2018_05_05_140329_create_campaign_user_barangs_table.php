<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignUserBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_user_barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_campaign_user');
            $table->string('nama_barang',100);
            $table->integer('target_jumlah');
            $table->integer('jumlah_sementara');
            $table->integer('jumlah_sisa');
            $table->string('satuan');
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            
            $table->foreign('id_campaign_user')->references('id')->on('campaign_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_user_barangs');
    }
}
