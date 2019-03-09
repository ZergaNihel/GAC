<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examens', function (Blueprint $table) {
            $table->increments('idExam');
            $table->string('type');
            $table->string('delais')->nullable();
            $table->string('formule')->nullable();
             $table->string('sujet')->nullable();
            $table->string('corrige_type')->nullable();
            $table->integer('module_Exam')->unsigned()->nullable();
            $table->timestamps();
            $table-> foreign('module_Exam')->references('idMod')->on('modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examens');
    }
}
