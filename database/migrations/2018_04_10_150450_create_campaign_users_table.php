<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->string('judul',100);
            $table->biginteger('target_donasi',20);
            $table->date('tgl_awal');
            $table->date('deadline');
            $table->string('kategori',150);
            $table->string('lokasi_penerima',100);
            $table->biginteger('dana_sementara',20);
            $table->biginteger('dana_bersih',20);
            $table->string('pic_verif',200);
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
        Schema::dropIfExists('campaign_users');
    }
}
