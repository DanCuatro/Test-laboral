<?php

namespace App\Model\Usuario;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
   protected $fillable = ['name','estado'];

   public function puestos(){
   		return $this->belongsToMany('App\Model\Usuario\Puesto');
   }
   
}
