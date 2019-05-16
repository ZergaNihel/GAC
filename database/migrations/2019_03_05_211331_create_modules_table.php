<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('idMod');
            $table->string('nom');
            $table->string('code');
            $table->integer('ens_responsable')->unsigned()->nullable();
            $table->integer('semestre')->unsigned()->nullable();
             
            $table->timestamps();
             $table-> foreign('ens_responsable')->references('idEns')->on('enseignants')->onDelete('cascade');
            $table-> foreign('semestre')->references('idSem')->on('semestres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
