<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corrections', function (Blueprint $table) {
            $table->increments('id');
            $table->double('note')->default(0.00);
             $table->integer('correcteur')->unsigned()->nullable();
            $table->integer('code_etu')->unsigned()->nullable();
            $table->unique(['correcteur','code_etu']);
            $table->timestamps();
             $table-> foreign('correcteur')->references('id')->on('paquet_ens')->onDelete('cascade');
             $table-> foreign('code_etu')->references('idC')->on('codes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corrections');
    }
}
