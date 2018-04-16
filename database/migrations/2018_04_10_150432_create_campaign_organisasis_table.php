<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignOrganisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_organisasis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul',100);
            $table->integer('id_organisasi');
            $table->biginteger('target_donasi');
            $table->date('tgl_awal');
            $table->date('deadline');
            $table->string('kategori',150);
            $table->biginteger('dana_sementara');
            $table->biginteger('dana_bersih');
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
        Schema::dropIfExists('campaign_organisasis');
    }
}
