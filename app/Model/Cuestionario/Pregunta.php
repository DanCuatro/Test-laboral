<?php

namespace App\Model\Cuestionario;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = [
        'pregunta','escala','estado'
    ];

    public function seccion() {
        return $this->belongsTo('App\Model\Cuestionario\Seccion');
    }
    public function dimension() {
        return $this->belongsTo('App\Model\Cuestionario\Dimension');
    }
    public function respuesta(){
        return $this->hasMany('App\Model\Cuestionario\Respuesta');
    }
}
