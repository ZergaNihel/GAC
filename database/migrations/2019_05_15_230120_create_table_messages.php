<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sujet')->nullable();
            $table->text('msg');
            $table->integer('id_emt')->unsigned();
            $table->integer('id_rcpt')->unsigned();
            $table->timestamps();
            $table->foreign('id_emt')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_rcpt')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
