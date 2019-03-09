<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTdTpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_tps', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('id_module')->unsigned()->nullable();
            $table->integer('id_Ens')->unsigned()->nullable();
             $table->integer('id_groupe')->unsigned()->nullable();
             $table->integer('id_seance')->unsigned()->nullable();
             $table->unique(['id_module','id_Ens','id_groupe','id_seance']);
            $table->timestamps();
             $table-> foreign('id_Ens')->references('idEns')->on('enseignants')->onDelete('cascade');
            $table-> foreign('id_module')->references('idMod')->on('modules')->onDelete('cascade');
              $table-> foreign('id_groupe')->references('idG')->on('groupes')->onDelete('cascade');
                $table-> foreign('id_seance')->references('idSea')->on('seances')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_tps');
    }
}
