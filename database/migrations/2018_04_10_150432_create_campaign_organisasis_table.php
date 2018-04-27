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
            $table->string('pic_cover_campaign',200);
            $table->string('cerita_singkat',200);
            $table->text('cerita_lengkap');
            $table->unsignedInteger('id_organisasi');
            $table->biginteger('target_donasi');
            $table->date('tgl_awal');
            $table->date('deadline');
            $table->enum('kategori',['Beasiswa & Pendidikan','Lingkungan','Panti Asuhan','Bencana Alam','Menolong Hewan','Kemanusiaan','Kategori Lain']);
            $table->biginteger('dana_sementara');
            $table->biginteger('dana_bersih');
            $table->biginteger('sisa_dana');
            $table->string('pic_verif',200);
            $table->enum('status',['verified','non-verified']);
            $table->timestamps();

            Schema::disableForeignKeyConstraints();
            $table->foreign('id_organisasi')->references('id')->on('organisasis');
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
