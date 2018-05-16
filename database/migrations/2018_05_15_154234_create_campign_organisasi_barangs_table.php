<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampignOrganisasiBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campign_organisasi_barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_campaign_organisasi');
            $table->string('nama_barang',100);
            $table->integer('target_jumlah');
            $table->integer('jumlah_sementara');
            $table->integer('jumlah_sisa');
            $table->string('satuan');
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            
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
        Schema::dropIfExists('campign_organisasi_barangs');
    }
}
