<?php

namespace App\Model\Cuestionario;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    //
    protected $fillable = ['nombre', 'estado'];
    
    public function riesgometrica() {
        return $this->belongsTo('App\Model\Cuestionario\RiesgoMetrica','riesgo_metrica_id');
    }
    //hasMany
    public function categoria(){
        return $this->hasMany('App\Model\Cuestionario\Categoria');
    }
    public function periodo(){
        return $this->hasMany('App\Model\Cuestionario\Periodo');
    }
}
