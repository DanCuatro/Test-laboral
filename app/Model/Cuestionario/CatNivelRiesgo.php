<?php

namespace App\Model\Cuestionario;

use Illuminate\Database\Eloquent\Model;

class CatNivelRiesgo extends Model
{
    protected $fillable = [
        'nombre','nivel','descripcion','r','g','b'
    ];
    //hasMany
    public function categoriacalificada(){
        return $this->hasMany('App\Model\Cuestionario\CategoriaCalificada','cat_nivel_riesgo_id');
    }
    public function cuestionarioresuelto(){
        return $this->hasMany('App\Model\Cuestionario\CuestionarioResuelto','cat_nivel_riesgo_id');
    }
    public function dimensioncalificada() {
        return $this->hasMany('App\Model\Cuestionario\DimensionCalificada','cat_nivel_riesgo_id');
    }
    public function dominiocalificado(){
        return $this->hasMany('App\Model\Cuestionario\DominioCalificado','cat_nivel_riesgo_id');
    }
}
