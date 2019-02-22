<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleAlimentacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_alimentacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad')->unsigned();
            $table->char('horario');
            $table->char('unidad_medida',2);
            $table->integer('id_alimento')->unsigned();
            $table->foreign('id_alimento')->references('id')->on('alimento')
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
        Schema::dropIfExists('detalle_alimentacion');
    }
}
