<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscribe extends Model
{
    protected $table='inscribe';
    protected $fillable=['id_Carrera','id_Estudiante','registro','fechaInscripcion','titulado'];
}
