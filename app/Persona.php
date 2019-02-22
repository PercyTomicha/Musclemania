<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';
    protected $fillable=['nombre','apellidoPaterno','apellidoMaterno','ci','ExpedidoEn','fechaNacimiento','telefono','celular','correoElectronico','pais','ciudad','direccion'];


}
