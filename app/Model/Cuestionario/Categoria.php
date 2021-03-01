<?php

namespace App\Model\Cuestionario;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre', 'estado'
    ];
    
    //belongsToMany
    public function riesgometrica() {
        return $this->belongsTo('App\Model\Cuestionario\RiesgoMetrica','riesgo_metrica_id');
    }
    //hasMany
    public function categoriacalificada()
    {
        return $this->hasMany('App\Model\Cuestionario\CategoriaCalificada');
    }
    public function dominio()
    {
        return $this->hasMany('App\Model\Cuestionario\Dominio');
    }
}
