<?php

namespace App\Model\Usuario\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Cat_tipos_personal extends Model
{
    protected $table = "cat_tipos_personal";
    protected $fillable = ['name'];
}
