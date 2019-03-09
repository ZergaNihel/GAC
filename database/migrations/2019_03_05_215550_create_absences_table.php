<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->increments('idAbs');
            $table->integer('id_td_tp')->unsigned()->nullable();
            $table->integer('id_Etu')->unsigned()->nullable();
            $table->string('justification')->nullable();
            $table->integer('etat');
            $table->string('date');
            $table->integer('etat_just')->default(2);
            $table->unique(['id_td_tp','id_Etu']);
            $table->timestamps();
            $table-> foreign('id_td_tp')->references('id')->on('td_tps')->onDelete('cascade');
            $table-> foreign('id_Etu')->references('idEtu')->on('etudiants')->onDelete('cascade');
             
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absences');
    }
}
