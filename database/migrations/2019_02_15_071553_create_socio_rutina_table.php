<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocioRutinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_rutina', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')
                                        ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_rutina')->unsigned();
            $table->foreign('id_rutina')->references('id')->on('rutina')
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
        Schema::dropIfExists('socio_rutina');
    }
}
