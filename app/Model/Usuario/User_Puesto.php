<?php

namespace App\Model\Usuario;

use Illuminate\Database\Eloquent\Model;

class User_Puesto extends Model
{
     protected $table = "puesto_user";
     protected $fillable = ['id_puesto','id_user','fecha_inicio','fecha_final'];

     public function puesto()
     {
         return $this->belongsTo('App\Model\Usuario\Puesto', 'id_puesto');
     }

     public function user()
     {
         return $this->belongsTo('App\User','id_user');
     }
}
