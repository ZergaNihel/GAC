<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaquetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquets', function (Blueprint $table) {
            $table->increments('idPaq');
            $table->string('nom_paq');
            $table->string('salle');
            $table->integer('paq_Exam')->unsigned()->nullable();
            $table->timestamps();
             $table-> foreign('paq_Exam')->references('idExam')->on('examens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquets');
    }
}
