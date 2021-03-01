<?php

namespace App\Model\Cuestionario;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    protected $table = "dimensiones";

    protected $fillable = [
        'nombre', 'estado'
    ];

    public function dominio() {
        return $this->belongsTo('App\Model\Cuestionario\Dominio');
    }
    public function riesgometrica() {
        return $this->belongsTo('App\Model\Cuestionario\RiesgoMetrica','riesgo_metrica_id');
    }
    //hasMany
    public function dimensionCalificada() {
        return $this->hasMany('App\Model\Cuestionario\DimensionCalificada');
    }
    public function pregunta(){
        return $this->hasMany('App\Model\Cuestionario\Pregunta');
    }
    
}
