<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AjouterColonneUniqueAuxAbsences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('absences', function (Blueprint $table) {
            $table->unique(['id_td_tp','id_Etu','date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         /*Schema::table('absences', function (Blueprint $table) {
            //$table->dropColumn('matricule');
        });*/
    }
}
