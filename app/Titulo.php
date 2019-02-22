<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    protected $table='titulo';
    protected $fillable=['numeracion','fechaEmision','idSolicitante','costo','recogedor','fechaEntrega'];

}
