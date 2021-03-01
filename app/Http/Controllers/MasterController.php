<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Model\Usuario\Area;
use App\Model\Usuario\Peticion;
use App\Model\Usuario\Correo;
use App\User;
use App\Model\Cuestionario\CategoriaCalificada;
use App\Model\Cuestionario\DominioCalificado;
use App\Model\Cuestionario\DimensionCalificada;
use App\Model\Cuestionario\CatNivelRiesgo;
use App\Model\Cuestionario\Respuesta;
use App\Model\Cuestionario\Seccion;
use App\Model\Cuestionario\Pregunta;
use App\Cuestionario;
use App\Cuestionarios_resuelto;
use App\Cuestionarios_calificado;
use App\Model\Cuestionario\CuestionarioResuelto;
use Barryvdh\DomPDF\Facade as PDF;


class MasterController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //Funciones de menu superior
    public function index(){
        $pemisoArea=$this->permisosArea();
        $pemisoAreaUser=$this->permisosAreaUser();
        return view('home',compact('pemisoArea','pemisoAreaUser'));
    }

    public function AreaIndex(){
        $pemisoArea=$this->permisosArea();
        $pemisoAreaUser=$this->permisosAreaUser();
        if($pemisoArea)
            return view('areas.area',compact('pemisoArea','pemisoAreaUser')); 
        return view('home',compact('pemisoArea','pemisoAreaUser'));
    }

    public function CorreoIndex(){
        $pemisoArea=$this->permisosArea();
        $pemisoAreaUser=$this->permisosAreaUser();
        if(Gate::check('correos.index'))
        return view('correos.correo',compact('pemisoArea','pemisoAreaUser')); 
        return view('home',compact('pemisoArea','pemisoAreaUser'));
    }

    public function CampuIndex(){
        $pemisoArea=$this->permisosArea();
        $pemisoAreaUser=$this->permisosAreaUser();
        if(Gate::check('campus.index'))
        return view('campus.campu',compact('pemisoArea','pemisoAreaUser')); 
        return view('home',compact('pemisoArea','pemisoAreaUser'));
    }

    public function UserDatosPersonal(){
        $pemisoArea=$this->permisosArea();
        $pemisoAreaUser=$this->permisosAreaUser();
        return view('users.datosPersonales',compact('pemisoArea','pemisoAreaUser')); 
    }

    public function UserCuestionarioPDF($idCuestionario){
        $catNivelRiesgo=CatNivelRiesgo::all();
        $arrayRespuestaCuestionario = array();
        $cuestionario_resuelto = CuestionarioResuelto::find($idCuestionario);
        $categoria= CategoriaCalificada::where('cuestionario_resuelto_id',$cuestionario_resuelto->id)->get();
        $dominio= DominioCalificado::where('cuestionario_resuelto_id',$cuestionario_resuelto->id)->get();
        $dimension= DimensionCalificada::where('cuestionario_resuelto_id',$cuestionario_resuelto->id)->get();
        $categoriaArray=array();
        $numeroCategoria=0;
        for($i=0;$i<count($categoria);$i++){
            $dominioArray=array();
            $numDominio=0;
            for($x=0;$x<count($dominio);$x++){
                $dimensionArray=array();
                for($y=0;$y<count($dimension);$y++){
                    if($dimension[$y]->dimension->dominio->id==$dominio[$x]->dominio->id)
                        $dimensionArray[]=array(
                            $dimension[$y]->dimension->nombre,
                            $dimension[$y]->calificacion);
                }
                if($dominio[$x]->dominio->categoria->id==$categoria[$i]->categoria->id){
                    $dominioArray[]=array(
                        $dominio[$x]->dominio->nombre,
                        $dominio[$x]->calificacion,
                        array($dominio[$x]->catnivelriesgo->r,$dominio[$x]->catnivelriesgo->g,$dominio[$x]->catnivelriesgo->b),
                        $dimensionArray,
                        count($dimensionArray)
                    );
                    $numDominio=$numDominio+count($dimensionArray);
                }
            }
            $categoriaArray[]=array(
                $categoria[$i]->categoria->nombre,
                $categoria[$i]->calificacion,
                array($categoria[$i]->catnivelriesgo->r,$categoria[$i]->catnivelriesgo->g,$categoria[$i]->catnivelriesgo->b),
                $dominioArray,$numDominio
            );
            $numeroCategoria=$numeroCategoria+$numDominio;
        }
        $arrayCaDoDiCuestionario=array(
            $cuestionario_resuelto->calificacion,
            array($cuestionario_resuelto->catnivelriesgo->r,$cuestionario_resuelto->catnivelriesgo->g,$cuestionario_resuelto->catnivelriesgo->b),
            $categoriaArray,
            $numeroCategoria);
        $respuestas= Respuesta::where('cuestionario_resuelto_id',$cuestionario_resuelto->id)->get();
        for($i=0;$i<count($respuestas);$i++){
            $seccionId=$respuestas[$i]->pregunta->seccion->id;
            $seccionTitulo=$respuestas[$i]->pregunta->seccion->titulo;
            $preguntaId=$respuestas[$i]->pregunta->id;
            $preguntaTitulo=$respuestas[$i]->pregunta->pregunta;
            $respuesta=$respuestas[$i]->respuesta;
            $encontreSeccion=false;
            $encontrePregunta=false;
            $posicionSeccion;
            if($arrayRespuestaCuestionario!=null)
            for($x=0;$x<count($arrayRespuestaCuestionario);$x++)
                if($arrayRespuestaCuestionario[$x][0]==$seccionId){
                    for($x1=0;$x1<count($arrayRespuestaCuestionario[$x][2]);$x1++)
                        if($arrayRespuestaCuestionario[$x][2][$x1][0]==$preguntaId){
                            $encontrePregunta=true;
                            $x1=count($arrayRespuestaCuestionario[$x][2]);
                        }
                    $encontreSeccion=true;
                    $posicionSeccion=$x;
                    $x=count($arrayRespuestaCuestionario);
                }
            if($encontreSeccion && !$encontrePregunta)
                $arrayRespuestaCuestionario[$posicionSeccion][2][]=array($preguntaId,$preguntaTitulo,$respuesta);
            if(!$encontreSeccion)
                $arrayRespuestaCuestionario[]=array($seccionId,$seccionTitulo,array(array($preguntaId,$preguntaTitulo,$respuesta)));
        }
        
        return view('users.livewire.navegador.descarga',compact('catNivelRiesgo','arrayRespuestaCuestionario','arrayCaDoDiCuestionario','cuestionario_resuelto'));
        $pdf = PDF::loadView('users.livewire.navegador.descarga',compact('catNivelRiesgo','arrayRespuestaCuestionario','arrayCaDoDiCuestionario','cuestionario_resuelto'))->setOptions(['defaultFont'=>"sans-serif"]);  
        set_time_limit(300);
        return $pdf->stream('cuestionario.pdf');
        $user=$cuestionario_resuelto->datosPersonales->userPuesto->user;
        return $pdf->download('cuestionario '.$user->apellido_P.' '.$user->apellido_M.' '.$user->name.' '.$cuestionario_resuelto->periodo->periodo.' .pdf');
    }

    public function UserCambiarCorreo($id){
        $pemisoArea=$this->permisosArea();
        $pemisoAreaUser=$this->permisosAreaUser();
        $peticion=Peticion::find($id);
        $user=User::find($peticion->id_user)->update([
            'email'     => $peticion->email,
            'correo_id' => $peticion->correo_id
            ]);
        $peticion->delete();
        return redirect()->route('home');
    }

    public function UserIndex(){
        $pemisoArea=$this->permisosArea();
        $pemisoAreaUser=$this->permisosAreaUser();
        if($pemisoAreaUser)
        return view('users.usuario',compact('pemisoArea','pemisoAreaUser'));
        return view('home',compact('pemisoArea','pemisoAreaUser'));
    }

    public function CuestionarioResolver(){
        $pemisoArea=$this->permisosArea();
        $pemisoAreaUser=$this->permisosAreaUser();
        return view('cuestionario.contestar',compact('pemisoArea','pemisoAreaUser')); 
    }

    public function CuestionarioAsignar(){
        $pemisoArea=$this->permisosArea();
        $pemisoAreaUser=$this->permisosAreaUser();
        if(Gate::check('cuestionario.asing'))
        return view('cuestionario.asignar',compact('pemisoArea','pemisoAreaUser'));
        return view('home',compact('pemisoArea','pemisoAreaUser'));
    }

    public function GraficosIndex(){
        $pemisoArea=$this->permisosArea();
        $pemisoAreaUser=$this->permisosAreaUser();
        if(Gate::check('graficos.index'))
        return view('graficos.graficos',compact('pemisoArea','pemisoAreaUser')); 
        return view('home',compact('pemisoArea','pemisoAreaUser'));
    }
    

    //Funciones de permisos 
    public function permisosArea(){
        $pemisoArea=false;
        if(Gate::check('areas.index')){
            $pemisoArea=true;
        }else{
            $nombresArea=Area::all();
            for($i=0;$i<count($nombresArea);$i++){
                $stringPermiso=$nombresArea[$i]->name.'.areas.index';
                if(Gate::check($stringPermiso)){
                    $pemisoArea=true;  
                }
            }
        }
        return $pemisoArea;
    }

    public function permisosAreaUser(){
        $pemisoArea=false;
        if(Gate::check('users.index')){
            $pemisoArea=true;
        }else{
            $nombresArea=Area::all();
            for($i=0;$i<count($nombresArea);$i++){
                $stringPermiso=$nombresArea[$i]->name.'.users.index';
                if(Gate::check($stringPermiso))
                    $pemisoArea=true;  
            }
        }
        return $pemisoArea;
    }

    public function pdfGrafico(Request $request){
        $graficasGuardadas = json_decode($request->datos, true);
        $modelosDeControl = json_decode($request->info, true);
        return view('graficos.livewire.pdf',compact('graficasGuardadas','modelosDeControl'));  
        
    }

    public function registrar(){
        $correo=Correo::where('estado',true)->get();
        return view("auth.register",compact('correo'));
    }
}
