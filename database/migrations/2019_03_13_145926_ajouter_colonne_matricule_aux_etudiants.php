<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AjouterColonneMatriculeAuxEtudiants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('etudiants', function (Blueprint $table) {
            $table->string('matricule')->after('idEtu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('etudiants', function (Blueprint $table) {
            $table->dropColumn('matricule');
        });
    }
}
