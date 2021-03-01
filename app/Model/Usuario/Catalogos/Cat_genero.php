<?php

namespace App\Model\Usuario\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Cat_genero extends Model
{
    protected $fillable = ['name'];

    public function cat_nivel_estudio()
    {
        return $this->hasOne('App\User', 'id_generos');
    }

}
