<?php

namespace App\Model\Cuestionario;

use Illuminate\Database\Eloquent\Model;

class DominioCalificado extends Model
{
    protected $fillable = [
        'calificacion','cat_nivel_riesgos_id'
    ];
    public function dominio() {
        return $this->belongsTo('App\Model\Cuestionario\Dominio');
    }
    public function cuestionarioresuelto() {
        return $this->belongsTo('App\Model\Cuestionario\CuestionarioResuelto','cuestionario_resuelto_id');
    }
    public function catnivelriesgo() {
        return $this->belongsTo('App\Model\Cuestionario\CatNivelRiesgo','cat_nivel_riesgo_id');
    }
}
