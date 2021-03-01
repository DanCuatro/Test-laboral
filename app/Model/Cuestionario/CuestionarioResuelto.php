<?php

namespace App\Model\Cuestionario;

use Illuminate\Database\Eloquent\Model;

class CuestionarioResuelto extends Model
{
    //belongsToMany
    protected $fillable = ['calificacion'];

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function puesto() {
        return $this->belongsTo('App\Model\Usuario\Puesto','puesto_id');
    }
    public function seccion() {
        return $this->belongsTo('App\Model\Cuestionario\Seccion');
    }
    public function periodo() {
        return $this->belongsTo('App\Model\Cuestionario\Periodo');
    }
    public function catnivelriesgo() {
        return $this->belongsTo('App\Model\Cuestionario\CatNivelRiesgo','cat_nivel_riesgo_id');
    }
    public function datosPersonales() {
        return $this->belongsTo('App\Model\Cuestionario\DatoPersonal','dato_personal_id');
    }
    //hasMany
    public function categoriacalificada() {
        return $this->hasMany('App\Model\Cuestionario\CategoriaCalificada');
    }
    public function dominiocalificado(){
        return $this->hasMany('App\Model\Cuestionario\DominioCalificado');
    }
    public function dimensioncalificada() {
        return $this->hasMany('App\Model\Cuestionario\DimensionCalificada');
    }
    public function respuesta(){
        return $this->hasMany('App\Model\Cuestionario\Respuesta');
    }
}
