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
            $table->integer('id_user_organisasi');
            $table->integer('id_campaign_user_organisasi');
            $table->string('barang',100);
            $table->integer('jumlah');
            $table->enum('status',['onGoing','paidOff','cancel']);
            $table->timestamps();
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
