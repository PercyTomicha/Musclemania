<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarreraOfertada extends Model
{
    protected $table='carrera_ofertada';
    protected $fillable=['fechaInicio','fechaConclusion','idLugar','idCarrera'];
}
