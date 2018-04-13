<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekOrganisasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rek_organisasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_organisas');
            $table->string('no_rek',20);
            $table->string('nama',50);
            $table->enum('status',['verified','non_verified']);
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
        Schema::dropIfExists('rek_organisasis');
    }
}
