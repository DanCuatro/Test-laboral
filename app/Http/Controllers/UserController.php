<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use App\Cat_genero;
use App\Cat_estados_civil;
use App\Cat_nivel_estudio;

use App\Cuestionarios_resuelto;
use App\Cuestionarios_calificado;
use Barryvdh\DomPDF\Facade as PDF;

class UserController extends Controller
{
    
    public $cat_genero;
    public $cat_estados_civil;
    public $cat_nivel_estudio;

    //Dinamico
    public function personal(){
        return view('users.datosPersonales'); 
    }

    public function cuestionario($cuestionario){
        $cuestionario_resuelto = Cuestionarios_resuelto::find($cuestionario);
        $cuestionarios_calificado= Cuestionarios_calificado::where('id_cuestionario_resueltos',$cuestionario_resuelto->id)->first();
        $pdf = PDF::loadView('users.livewire.navegador.descarga',compact('cuestionario_resuelto','cuestionarios_calificado'))->setOptions(['defaultFont' => 'sans-serif']); 
        return $pdf->stream('cuestionario.pdf');
        return $pdf->download('cuestionario.pdf');
    }

    public function index(){
        return view('users.usuario');
    }
    
}
