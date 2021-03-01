<?php

namespace App\Model\Usuario;

use Illuminate\Database\Eloquent\Model;

class Peticion extends Model
{
    protected $fillable = ['id_user','correo_id','email'];
    
    public function correo(){
        return $this->belongsTo('App\Model\Usuario\Correo', 'correo_id');
    }

    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
}
