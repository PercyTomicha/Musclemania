<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firmante extends Model
{
    protected $table='firmante';
    protected $fillable=['id_nivel','id_cargo'];
}
