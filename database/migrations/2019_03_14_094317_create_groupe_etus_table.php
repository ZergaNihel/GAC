<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupeEtusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupe_etus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sem_groupe')->unsigned()->nullable();
            $table->integer('sec_groupe')->unsigned()->nullable();
            $table->integer('groupe')->unsigned()->nullable();
            $table->unique(['sem_groupe','sec_groupe','groupe']);
            $table->timestamps();
            $table-> foreign('sem_groupe')->references('idSem')->on('semestres')->onDelete('cascade');
            $table-> foreign('sec_groupe')->references('idSec')->on('sections')->onDelete('cascade');
            $table-> foreign('groupe')->references('idG')->on('groupes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groupe_etus');
    }
}
