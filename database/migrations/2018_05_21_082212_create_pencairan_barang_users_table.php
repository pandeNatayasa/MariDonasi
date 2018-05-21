<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePencairanBarangUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencairan_barang_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_campaign_user_barang');
            $table->string('alamat',150);
            $table->integer('jumlah');
            $table->enum('status',['onGoing','cancel','success']);
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_campaign_user_barang')->references('id')->on('campaign_user_barangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pencairan_barang_users');
    }
}
