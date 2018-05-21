<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalangBarangOrganisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galang_barang_organisasis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_organisasi');
            $table->unsignedInteger('id_campaign_organisasi');
            $table->string('barang',100);
            $table->integer('jumlah');
            $table->enum('status',['onGoing','paidOff','cancel','success']);
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            $table->foreign('id_organisasi')->references('id')->on('organisasis');
            $table->foreign('id_campaign_organisasi')->references('id')->on('campaign_organisasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galang_barang_organisasis');
    }
}
