<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('id_module')->unsigned()->nullable();
            $table->integer('id_Ens')->unsigned()->nullable();
              $table->integer('id_section')->unsigned()->nullable();
             $table->integer('id_seance')->unsigned()->nullable();
             $table->unique(['id_module','id_Ens','id_section','id_seance']);
            $table->timestamps();
             $table-> foreign('id_Ens')->references('idEns')->on('enseignants')->onDelete('cascade');
            $table-> foreign('id_module')->references('idMod')->on('modules')->onDelete('cascade');
             $table-> foreign('id_section')->references('idSec')->on('sections')->onDelete('cascade');
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
        Schema::dropIfExists('cours');
    }
}
