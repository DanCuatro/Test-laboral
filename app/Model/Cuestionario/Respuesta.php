<?php

namespace App\Model\Cuestionario;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable = [
        'respuesta'
    ];

    public function pregunta() {
        return $this->belongsTo('App\Model\Cuestionario\Pregunta');
    }
    public function cuestionarioresuelto() {
        return $this->belongsTo('App\Model\Cuestionario\CuestionarioResuelto');
    }
    
}
