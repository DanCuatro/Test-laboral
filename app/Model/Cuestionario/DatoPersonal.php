<?php

namespace App\Model\Cuestionario;

use Illuminate\Database\Eloquent\Model;

class DatoPersonal extends Model{

    protected $fillable = [
        'puesto_user_id',
        'campu_id',
        'id_generos',
        'id_estados_civil',
        'id_nivele_estudio',
        'id_tipos_contratacion',
        'id_tipos_personal',
        'id_jornada_trabajo'
    ];

    public function campu() {
        return $this->belongsTo('App\Model\Usuario\Campu');
    }

    public function cat_genero(){
        return $this->belongsTo('App\Model\Usuario\Catalogos\Cat_genero', 'id_generos');
    }

    public function cat_estados_civil(){
        return $this->belongsTo('App\Model\Usuario\Catalogos\Cat_estados_civil', 'id_estados_civil');
    }

    public function cat_nivel_estudio(){
        return $this->belongsTo('App\Model\Usuario\Catalogos\Cat_nivel_estudio', 'id_nivele_estudio');
    }

    public function cat_tipos_contratacion(){
        return $this->belongsTo('App\Model\Usuario\Catalogos\Cat_tipos_contratacion', 'id_tipos_contratacion');
    }

    public function cat_tipos_personal(){
        return $this->belongsTo('App\Model\Usuario\Catalogos\Cat_tipos_personal', 'id_tipos_personal');
    }

    public function cat_jornada_trabajo(){
        return $this->belongsTo('App\Model\Usuario\Catalogos\Cat_jornada_trabajo', 'id_jornada_trabajo');
    }

    public function userPuesto(){
        return $this->belongsTo('App\Model\Usuario\User_Puesto','puesto_user_id');
    }  

    public function cuestionarioResuelto() {
        return $this->hasMany('App\Model\Cuestionario\CuestionarioResuelto','dato_personal_id');
    }

}
