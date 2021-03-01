<?php

namespace App\Model\Cuestionario;

use Illuminate\Database\Eloquent\Model;

class RiesgoMetrica extends Model
{
    protected $fillable = [
        'metrica_nulo','metrica_bajo','metrica_medio','metrica_alto','metrica_muyalto'
    ];
    
    //hasMany
    public function categoria() {
        return $this->hasMany('App\Model\Cuestionario\Categoria','riesgo_metrica_id');
    }
    public function dimension() {
        return $this->hasMany('App\Model\Cuestionario\Dimension','riesgo_metrica_id');
    }
    public function dominio(){
        return $this->hasMany('App\Model\Cuestionario\Dominio','riesgo_metrica_id');
    }
    public function cuestionario(){
        return $this->hasMany('App\Model\Cuestionario\Cuestionario','riesgo_metrica_id');
    }
}
