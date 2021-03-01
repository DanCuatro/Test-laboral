<?php

namespace App;

use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // implements MustVerifyEmail
    use Notifiable,HasRolesAndPermissions;

    protected $fillable = [
        'name','estado', 'email', 'password','correo_id',
        'apellido_P',
        'apellido_M',
        'fecha_nacimiento',
        'exp_laboral',
        'id_estados_civil',
        'id_generos',
        'id_nivele_estudio',
        'id_jornada_trabajo',
        'id_tipos_contratacion',
        'id_tipos_personal',
        'id_jornada_trabajo','campu_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function correo() {
        return $this->belongsTo('App\Model\Usuario\Correo');
    }
    public function campu() {
        return $this->belongsTo('App\Model\Usuario\Campu');
    }

    public function puestos() {
        return $this->belongsToMany('App\Model\Usuario\Puesto');
    }

    public function cat_genero()
    {
        return $this->belongsTo('App\Model\Usuario\Catalogos\Cat_genero', 'id_generos');
    }

    public function cat_estados_civil()
    {
        return $this->belongsTo('App\Model\Usuario\Catalogos\Cat_estados_civil', 'id_estados_civil');
    }

    public function cat_nivel_estudio()
    {
        return $this->belongsTo('App\Model\Usuario\Catalogos\Cat_nivel_estudio', 'id_nivele_estudio');
    }

    public function cat_tipos_contratacion()
    {
        return $this->belongsTo('App\Model\Usuario\Catalogos\Cat_tipos_contratacion', 'id_tipos_contratacion');
    }

    public function cat_tipos_personal()
    {
        return $this->belongsTo('App\Model\Usuario\Catalogos\Cat_tipos_personal', 'id_tipos_personal');
    }

    public function cat_jornada_trabajo(){
        return $this->belongsTo('App\Model\Usuario\Catalogos\Cat_jornada_trabajo', 'id_jornada_trabajo');
    }
    //hasMany
    public function cuestionarioresuelto(){
        return $this->hasMany('App\Model\Cuestionario\CuestionarioResuelto');
    }
    public function userPuesto(){
        return $this->hasMany('App\Model\Usuario\User_Puesto','id_user');
    }  
}
