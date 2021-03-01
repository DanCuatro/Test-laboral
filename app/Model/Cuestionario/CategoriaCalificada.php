<?php

namespace App\Model\Cuestionario;

use Illuminate\Database\Eloquent\Model;

class CategoriaCalificada extends Model
{
    protected $fillable = [
        'calificacion'
    ];
    //belongsToMany
    public function categoria() {
        return $this->belongsTo('App\Model\Cuestionario\Categoria');
    }
    public function cuestionarioresuelto() {
        return $this->belongsTo('App\Model\Cuestionario\CuestionarioResuelto','cuestionario_resuelto_id');
    }
    public function catnivelriesgo() {
        return $this->belongsTo('App\Model\Cuestionario\CatNivelRiesgo','cat_nivel_riesgo_id');
    }
   /*
   public function categoriacalificada()
    {
        return $this->hasMany('App\Model\CategoriaCalificada');
    }
   */
}
