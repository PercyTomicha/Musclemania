<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autoridad extends Model
{
    protected $table='autoridad';
    protected $fillable=['rango','nombres','apellidos','id_cargo'];
}
