<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AjouterColonneIdSemAuxExamens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('examens', function (Blueprint $table) {
            $table->integer('idSem')->unsigned()->nullable()->after('idExam');
            $table->foreign('idSem')->references('idSem')->on('semestres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('examens', function (Blueprint $table) {
            $table->dropForeign(['idSem']);
            $table->dropColumn('idSem');
        });
    }
}
