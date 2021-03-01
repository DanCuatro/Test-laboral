<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Correo;

class CorreosController extends Controller
{
    public function index(){
        return view('correos.correo'); 
    }

}
