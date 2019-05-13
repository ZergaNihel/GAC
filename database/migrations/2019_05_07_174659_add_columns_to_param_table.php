<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToParamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('parametres', function (Blueprint $table) {
           $table->string('dep',500)->after('universite');
           $table->string('fac',500)->after('universite');
           $table->string('logo',150)->nullable()->after('promotion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parametres', function (Blueprint $table) {
             $table->dropColumn('dep');
             $table->dropColumn('fac');
             $table->dropColumn('logo');
        });
    }
}
