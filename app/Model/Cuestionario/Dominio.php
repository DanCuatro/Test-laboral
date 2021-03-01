<?php

namespace App\Model\Cuestionario;

use Illuminate\Database\Eloquent\Model;

class Dominio extends Model
{
    protected $fillable = [
        'nombre', 'estado'
    ];
    
    public function categoria() {
        return $this->belongsTo('App\Model\Cuestionario\Categoria');
    }
    public function riesgometrica() {
        return $this->belongsTo('App\Model\Cuestionario\RiesgoMetrica','riesgo_metrica_id');
    }
    //hasMany
    public function dimension(){
        return $this->hasMany('App\Model\Cuestionario\Dimension');
    }
    public function dominiocalificado(){
        return $this->hasMany('App\Model\Cuestionario\DominioCalificado');
    }
}
