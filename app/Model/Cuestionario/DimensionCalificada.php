<?php

namespace App\Model\Cuestionario;

use Illuminate\Database\Eloquent\Model;

class DimensionCalificada extends Model
{
    protected $fillable = [
        'calificacion',
    ];
    public function dimension() {
        return $this->belongsTo('App\Model\Cuestionario\Dimension');
    }
    public function cuestionarioresuelto() {
        return $this->belongsTo('App\Model\Cuestionario\CuestionarioResuelto');
    }
    public function catnivelriesgo() {
        return $this->belongsTo('App\Model\Cuestionario\CatNivelRiesgo','cat_nivel_riesgo_id');
    }
    
}
