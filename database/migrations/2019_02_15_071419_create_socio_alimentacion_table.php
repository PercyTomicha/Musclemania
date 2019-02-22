<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocioAlimentacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_alimentacion', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_fin');
            $table->date('fecha_inicio');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')
                                        ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_alimentacion')->unsigned();
            $table->foreign('id_alimentacion')->references('id')->on('alimentacion')
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
        Schema::dropIfExists('socio_alimentacion');
    }
}
