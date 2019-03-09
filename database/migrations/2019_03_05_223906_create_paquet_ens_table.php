<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaquetEnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquet_ens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_Ens')->unsigned()->nullable();
            $table->integer('id_paq')->unsigned()->nullable();
             $table->unique(['id_Ens','id_paq']);
            $table->timestamps();
            $table-> foreign('id_Ens')->references('idEns')->on('enseignants')->onDelete('cascade');
             $table-> foreign('id_paq')->references('idPaq')->on('paquets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquet_ens');
    }
}
