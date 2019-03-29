<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdGEtudiants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('etudiants', function (Blueprint $table) {
            $table->integer('idG')->unsigned()->nullable()->after('date_naissance');
            $table->foreign('idG')->references('idG')->on('groupes')->onDelete('cascade');
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
            $table->dropForeign(['idG']);
            $table->dropColumn('idG');
        });
    }
}
