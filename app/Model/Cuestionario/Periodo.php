<?php

namespace App\Model\Cuestionario;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model{   
    protected $fillable = [
        'periodo','fecha_inicio','fecha_cierre'
    ];

    //belongsToMany
    public function cuestionario(){
        return $this->belongsTo('App\Model\Cuestionario\Cuestionario');
    }
    //hasMany
    public function cuestionarioresuelto(){
        return $this->hasMany('App\Model\Cuestionario\CuestionarioResuelto');
    }
}
