<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table='carrera';
    protected $fillable=['sigla','nombre','id_nivel','costo','horas'];

    public static function carreras($id){
        return Carrera::where('id_nivel','=',$id)
            ->get();
    }
}
