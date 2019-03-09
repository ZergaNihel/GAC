<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEndettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endettes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Etu_end')->unsigned()->nullable();
            $table->integer('module_end')->unsigned()->nullable();
             $table->unique(['Etu_end','module_end']);
            $table->timestamps();
            $table-> foreign('Etu_end')->references('idEtu')->on('etudiants')->onDelete('cascade');
            $table-> foreign('module_end')->references('idMod')->on('modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endettes');
    }
}
