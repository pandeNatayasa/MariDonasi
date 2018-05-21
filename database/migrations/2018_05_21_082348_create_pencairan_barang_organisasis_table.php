<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePencairanBarangOrganisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencairan_barang_organisasis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_organisasi');
            $table->unsignedInteger('id_campaign_organisasi_barang');
            $table->string('alamat',150);
            $table->integer('jumlah');
            $table->enum('status',['onGoing','cancel','success']);
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            $table->foreign('id_organisasi')->references('id')->on('organisasis');
            $table->foreign('id_campaign_organisasi_barang')->references('id')->on('campign_organisasi_barangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pencairan_barang_organisasis');
    }
}
