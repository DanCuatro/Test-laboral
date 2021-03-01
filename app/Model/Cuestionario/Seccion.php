<?php

namespace App\Model\Cuestionario;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = "secciones";

    protected $fillable = [
        'titulo','restriccion','estado'
    ];

    //hasMany
    public function cuestionarioresuelto(){
        return $this->hasMany('App\Model\Cuestionario\CuestionarioResuelto');
    } 
    public function pregunta(){
        return $this->hasMany('App\Model\Cuestionario\Pregunta');
    }
}
