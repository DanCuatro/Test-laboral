<?php

namespace App\Model\Usuario;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $fillable = ['area_id','name','estado'];

    /*public function user() {
        return $this->belongsToMany('App\User');
    }*/
    
    public function area(){
         return $this->belongsTo('App\Model\Usuario\Area', 'area_id');
    }
    
    //hasMany
    public function cuestionarioresuelto(){
        return $this->hasMany('App\Model\Cuestionario\CuestionarioResuelto');
    } 
    public function userPuesto(){
        return $this->hasMany('App\Model\Usuario\User_Puesto','id_puesto');
    }   
}
