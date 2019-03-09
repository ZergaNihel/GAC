<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->increments('idC');
            $table->string('code');
            $table->double('notefinale')->default(0.00);
            $table->integer('paq_code')->unsigned()->nullable();
            $table->integer('etu_code')->unsigned()->nullable();
            $table->timestamps();
             $table-> foreign('paq_code')->references('idPaq')->on('paquets')->onDelete('cascade');
              $table-> foreign('etu_code')->references('idEtu')->on('etudiants')->onDelete('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codes');
    }
}
