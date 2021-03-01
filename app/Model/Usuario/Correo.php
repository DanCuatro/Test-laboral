<?php

namespace App\Model\Usuario;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    protected $fillable = ['name','estado'];

    public function user(){
        return $this->hasMany('App\User');
    } 
}
