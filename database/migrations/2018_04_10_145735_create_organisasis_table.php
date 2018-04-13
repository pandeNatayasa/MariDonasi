<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisasis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('email')->unique();
            $table->string('no_telp',15);
            $table->string('lokasi',100);
            $table->text('bio');
            $table->string('pic',200);
            $table->enum('status',['verified', 'non-verified']);
            $table->string('pic_surat',200);
            $table->date('berlaku_hingga');
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
        Schema::dropIfExists('organisasis');
    }
}
