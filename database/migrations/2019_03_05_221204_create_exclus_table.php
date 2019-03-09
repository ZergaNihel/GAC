<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExclusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exclus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Etu_exc')->unsigned()->nullable();
            $table->integer('module_exc')->unsigned()->nullable();
            $table->unique(['Etu_exc','module_exc']);
            $table->timestamps();
            $table-> foreign('Etu_exc')->references('idEtu')->on('etudiants')->onDelete('cascade');
            $table-> foreign('module_exc')->references('idMod')->on('modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exclus');
    }
}
