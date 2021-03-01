<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuestionarioController extends Controller
{

    public function resolver(){
        return view('cuestionario.contestar'); 
    }

    public function asignar(){
        return view('cuestionario.asignar'); 
    }

}
