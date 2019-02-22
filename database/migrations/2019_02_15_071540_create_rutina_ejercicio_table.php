<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRutinaEjercicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutina_ejercicio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('repeticiones')->unsigned();
            $table->integer('series')->unsigned();
            $table->integer('id_rutina')->unsigned();
            $table->foreign('id_rutina')->references('id')->on('rutina')
                                        ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_ejercicio')->unsigned();
            $table->foreign('id_ejercicio')->references('id')->on('ejercicio')
                                        ->onUpdate('cascade')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutina_ejercicio');
    }
}
