<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->string('role')->nullable();
            $table->integer('id_Etu')->unsigned()->nullable();
            $table->integer('id_Ens')->unsigned()->nullable();
             $table->foreign('id_Ens')->references('idEns')->on('enseignants')->onDelete('cascade');
            $table->foreign('id_Etu')->references('idEtu')->on('etudiants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn('role');
             $table->dropColumn('id_Etu');
             $table->dropColumn('id_Ens');
        });
    }
}
