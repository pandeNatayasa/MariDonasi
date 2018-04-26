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
            $table->unsignedInteger('id_user');
            $table->string('judul',100);
            $table->string('pic_cover_campaign',200);
            $table->string('cerita_singkat',200);
            $table->text('cerita_lengkap');
            $table->biginteger('target_donasi');
            $table->date('tgl_awal');
            $table->date('deadline');
            $table->string('kategori',150);
            $table->string('lokasi_penerima',100);
            $table->biginteger('dana_sementara');
            $table->biginteger('dana_bersih');
            $table->string('pic_verif',200);
            $table->enum('status',['verified','non-verified']);
            $table->timestamps();

             Schema::disableForeignKeyConstraints();
            $table->foreign('id_user')->references('id')->on('users');
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
