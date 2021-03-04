<?php

namespace App\Http\Livewire;

use App\Clases\Tiempo;
use Carbon\Carbon;

use Illuminate\Support\Facades\Gate;
use App\Model\Usuario\Area;
use App\Model\Usuario\Puesto;

use App\User;
use Caffeinated\Shinobi\Models\Role;
use App\Model\Cuestionario\Periodo;
use App\Model\Cuestionario\CuestionarioResuelto;
use App\Model\Usuario\User_Puesto;
USE App\Model\Usuario\Catalogos\Cat_tipos_personal;
USE App\Model\Usuario\Catalogos\Cat_tipos_contratacion;
USE App\Model\Usuario\Catalogos\Cat_jornada_trabajo;
use App\Model\Usuario\Catalogos\Cat_genero;
use App\Model\Usuario\Catalogos\Cat_estados_civil;
use App\Model\Usuario\Catalogos\Cat_nivel_estudio;
use App\Model\Usuario\Campu;
use App\Cuestionario;
use App\Cuestionarios_resuelto;
use App\Cuestionarios_calificado;

use App\Model\Cuestionario\Respuesta;
use App\Model\Cuestionario\Seccion;
use App\Model\Cuestionario\Pregunta;

use App\Model\Cuestionario\CategoriaCalificada;
use App\Model\Cuestionario\DominioCalificado;
use App\Model\Cuestionario\DimensionCalificada;

use Livewire\Component;
use Livewire\WithPagination;



class UsuariosComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    // Datos de Usuario
    public  $estado,        $name,              $apPaterno,     $apMaterno, 
            $genereo,       $fechaNacimiento,   $estadoCivil,   $nivelEstudio,  
            $exp_laboral,   $TiposContratacion, $TiposPersonal, $JornadaTrabajo,
            $idUsuario,     $campu;
    // Catalogos
    public  $cat_genero,            $cat_estados_civil, $cat_nivel_estudio,
            $catTiposContratacion,  $catTiposPersonal,  $catJornadaTrabajo, $cat_campu;
    // Vistas y Relaciondos
    public $viewCrut = "default";
    public $viewGeneral = "navegar";
    public $botonStor;

    //Tablas
    public  $user,              $puestos,               $cuestionario,
    $cuestionarios_resueltos,   $cuestionario_resuelto, $cuestionarios_calificado;
    
    public $arrayCuestionarios;
    public $arrayCaDoDiCuestionario=array();
    public $arrayRespuestaCuestionario=array();

    public $arrayAreasPermitidas=array();

    public $buscador;
    public $exp_Lavoral;

    public $cat_Roles;
    public $roles_Empleado=array();
    public $rolNuevo;

    public function mount(){
        $this->catTiposContratacion =Cat_tipos_contratacion::all();
        $this->catTiposPersonal     =Cat_tipos_personal::all();
        $this->catJornadaTrabajo    =Cat_jornada_trabajo::all();
        $this->cat_genero           =Cat_genero::all();
        $this->cat_estados_civil    =Cat_estados_civil::all();
        $this->cat_nivel_estudio    =Cat_nivel_estudio::all();
        $this->cat_nivel_estudio    =Cat_nivel_estudio::all();
        $this->cat_campu            =Campu::all();
    }

    public function render(){
        return view('users.livewire.navegador.usuarios-component',[
        	'usuarios'=>$this->permisos()->orderBy('estado','desc')->orderBy('name','asc')->paginate(8)]);
    }
    public function Buscador($modelo){
        if($this->buscador!=null){
            if($this->buscador=='incompleto'){
                $modelo->where('id_tipos_contratacion',null);
            }elseif(Cat_genero::where('name',$this->buscador)->count()!=0){
                $buscador=$this->buscador;  
                $modelo->wherehas('cat_genero',
                function ($query) use($buscador) {
                    $query->where('name',$buscador);
                });
            }else{
                $modelo->where('name','like','%'.$this->buscador.'%');
            }
        }
        return $modelo;
    }
    public function permisos(){
        if(Gate::check('users.index')){
            //return $this->Buscador(User::where('email_verified_at','!=',null));
            return $this->Buscador(User::where('name','!=',null));
        }else{
            $areas=Area::all();
            //$usuarios=User::where('email_verified_at','asdasdasdasd');
            $usuarios=User::where('name','asdasdasdasd');
            $this->arrayAreasPermitidas=array();
            for($i=0;$i<count($areas);$i++){
                $stringPermiso=$areas[$i]->name.'.users.index';
                if(Gate::check($stringPermiso)){
                    $idArea=$areas[$i]->id;
                    $this->arrayAreasPermitidas[]=$idArea;
                    $usuarios=$usuarios->orwhereHas('userPuesto',function ($query) use($idArea) {
                        $query->whereIn('id_puesto',Puesto::where('area_id',$idArea)->get('id'))->where('fecha_final',null);
                    });//->where('estado',true)
                }
            }
            return $this->Buscador($usuarios);
        }
    }
    public function permisosCrud($tipoPermiso,$idUsuario){
        if(Gate::check('users.'.$tipoPermiso))
        return true;
        else {
            $arrayAreasPermitidas=$this->arrayAreasPermitidas;
            foreach($this->arrayAreasPermitidas as $area){
                $usuarios=User::where('id',$idUsuario)->whereHas('userPuesto',function ($query) use($area) {
                    $query->whereIn('id_puesto',Puesto::where('area_id',$area)->get('id'))->where('fecha_final',null);
                })->get();
                if(count($usuarios)!=0 && Gate::check(Area::find($area)->name.'.users.'.$tipoPermiso) ){
                    return true;
                }
            }
        }
        return false;
    }
    public function verCuestionario($idCuestionario){
        $this->DatadosUsuarios();
        $arrayRespuestaCuestionario = array();
        $cuestionario_resuelto = CuestionarioResuelto::find($idCuestionario);

        $categoria= CategoriaCalificada::where('cuestionario_resuelto_id',$cuestionario_resuelto->id)->get();
        $dominio= DominioCalificado::where('cuestionario_resuelto_id',$cuestionario_resuelto->id)->get();
        $dimension= DimensionCalificada::where('cuestionario_resuelto_id',$cuestionario_resuelto->id)->get();
        $categoriaArray=array();
       // dd($dimension[5]->dimension->dominio->id);
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
            //dd($categoria[$x]->catnivelriesgo);
            $categoriaArray[]=array(
                $categoria[$i]->categoria->nombre,
                $categoria[$i]->calificacion,
                array($categoria[$i]->catnivelriesgo->r,$categoria[$i]->catnivelriesgo->g,$categoria[$i]->catnivelriesgo->b),
                $dominioArray,$numDominio
            );
            $numeroCategoria=$numeroCategoria+$numDominio;
        }
        $this->arrayCaDoDiCuestionario=array(
            $cuestionario_resuelto->calificacion,
            array($cuestionario_resuelto->catnivelriesgo->r,$cuestionario_resuelto->catnivelriesgo->g,$cuestionario_resuelto->catnivelriesgo->b),
            $categoriaArray,
            $numeroCategoria);
        //dd( $this->arrayCaDoDiCuestionario);
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


        $this->arrayRespuestaCuestionario=$arrayRespuestaCuestionario;
        $this->viewGeneral = "cuestionario";
        //dd($this->arrayCaDoDiCuestionario,$this->arrayRespuestaCuestionario);
    }

    public function Descargar($idCuestionario){
        $this->DatadosUsuarios();
        dd($idCuestionario);
        $cuestionario_resuelto = CuestionarioResuelto::find($idCuestionario);
        return view('users.livewire.navegador.cuestionario',compact('cuestionario_resuelto','cuestionarios_calificado'));
    }
    
    
    public function cuestionarios($idUsuario){
        $this->defaultView();
        $this->viewCrut  = "cuestionarios";
        $this->idUsuario = $idUsuario;
        $tiempo     = new Tiempo;
        $encontrar  = false;
        $fecha      = $tiempo->Periodo(User::find($idUsuario)->created_at);
        $periodo    = Periodo::where('periodo','>=',$fecha)->orderBy('periodo','ASC')->get();
        
        for($i=0;$i<count($periodo);$i++){
            $cuestionarios_resueltos = CuestionarioResuelto::where('user_id',$idUsuario)->where('periodo_id',$periodo[$i]->id)->get();
            for($x=0;$x<count($cuestionarios_resueltos);$x++){
                $this->arrayCuestionarios[] = array(true,$tiempo->PeriodoString($periodo[$i]->periodo),$cuestionarios_resueltos[$x]->id);
                $encontrar = true;
            }
            if($encontrar)
                $encontrar = false;
            else
                $this->arrayCuestionarios[] = array(false,$tiempo->PeriodoString($periodo[$i]->periodo));
            
        }
    }

    public function DatadosUsuarios(){
        $usuario = User::find($this->idUsuario);
        $this->estado = $usuario->estado;
        $this->name = $usuario->name;
        $this->apPaterno = $usuario->apellido_P;
        $this->apMaterno = $usuario->apellido_M;
        $this->genereo = $usuario->id_generos;
        $this->fechaNacimiento = $usuario->fecha_nacimiento;
        $this->estadoCivil = $usuario->id_estados_civil;
        $this->nivelEstudio = $usuario->id_nivele_estudio;
        $this->exp_laboral = $usuario->exp_laboral;
        $this->TiposContratacion = $usuario->id_tipos_contratacion;
        $this->TiposPersonal = $usuario->id_tipos_personal;
        $this->JornadaTrabajo = $usuario->id_jornada_trabajo;
        $this->campu = $usuario->campu_id;
    }

    
    public function defaultView(){
        $this->viewCrut = "default";
        $this->TiposContratacion=null;
        $this->TiposPersonal=null;
        $this->JornadaTrabajo=null;
        $this->validate(['estado' => '','rolNuevo' => '']);
        $this->roles_Empleado=array();
        $this->cat_Roles=null;
        $this->rolNuevo=null;
        $this->arrayCuestionarios=null;
    }
   
    public function show($idUsuario){
        $this->defaultView();
        $this->idUsuario = $idUsuario;
        $this->user=User::find($idUsuario);
        $puestos=$this->puestos=User_Puesto::where('id_user',$this->user->id)->orderBy('id_puesto','ASC')->get();
        $fechaInicial= Carbon::now();
        $fechaFinal= Carbon::now();
        foreach($puestos as $puesto){
            if($fechaInicial>$puesto->fecha_inicio){
                $fechaInicial=Carbon::create($puesto->fecha_inicio);
            }
        }
        if(User_Puesto::where('id_user',$this->user->id)->where('fecha_final',null)->count()==0){
            $fechaFinal=$fechaInicial;
            foreach($puestos as $puesto){
                if($fechaFinal<$puesto->fecha_final)
                $fechaFinal=Carbon::create($puesto->fecha_final);
            }
        }
        
        //dd($fechaInicial->format('y-m-d'));
        
        $this->exp_Lavoral=$this->RestaDeFechas($fechaFinal,$fechaInicial);
        
        $arraypuestos=array();
        for($i=0;$i<count($puestos);$i++){
            if($i==0)  
            $arraypuestos[]=array(
                'idPuesto'=>$puestos[$i]->id_puesto,
                'puesto'=>$puestos[$i]->puesto->name,
                'area'=>$puestos[$i]->puesto->area->name,
                'expLaboral' =>$this->RestaDeFechas(Carbon::create($puestos[$i]->fecha_final),Carbon::create($puestos[$i]->fecha_inicio))
            );
            else if($arraypuestos[count($arraypuestos)-1]['idPuesto']==$puestos[$i]->id_puesto){
                $nuevafecha=$this->RestaDeFechas(Carbon::create($puestos[$i]->fecha_final),Carbon::create($puestos[$i]->fecha_inicio));
                $antiguafecha=$arraypuestos[count($arraypuestos)-1]['expLaboral'];
                $arraypuestos[count($arraypuestos)-1]['expLaboral']=$this->SumarDeFechas($nuevafecha,$antiguafecha);
            }else{
                $arraypuestos[]=array(
                    'idPuesto'=>$puestos[$i]->id_puesto,
                    'puesto'=>$puestos[$i]->puesto->name,
                    'area'=>$puestos[$i]->puesto->area->name,
                    'expLaboral' =>$this->RestaDeFechas(Carbon::create($puestos[$i]->fecha_final),Carbon::create($puestos[$i]->fecha_inicio))
                );
            }
        }
        $this->puestos=$arraypuestos;
         $this->viewCrut = "show";
    }

    public function SumarDeFechas($fechaFinal,$fechaInicial){
        $nuevaFecha=$fechaFinal->addYear($fechaInicial->format('y'));
        $nuevaFecha=$nuevaFecha->addMonth($fechaInicial->format('m'));
        $nuevaFecha=$nuevaFecha->addDay($fechaInicial->format('d'));
        return $nuevaFecha;
    }

    public function RestaDeFechas($fechaFinal,$fechaInicial){
        $nuevaFecha=$fechaFinal->subYear($fechaInicial->format('y'));
        $nuevaFecha=$nuevaFecha->subMonth($fechaInicial->format('m'));
        $nuevaFecha=$nuevaFecha->subDay($fechaInicial->format('d'));
        return $nuevaFecha;
    }

    public function editRoles($idUsuario){
        $this->defaultView();
        $roles_Empleado=array();
        $roles=User::find($idUsuario)->roles;
        foreach($roles as $role){
            $roles_Empleado[]=array('id'=>$role->id,'name'=> $role->name);
        }
        $this->roles_Empleado=$roles_Empleado;
        $this->cat_Roles=Role::all();
        $this->idUsuario = $idUsuario;
        $this->viewCrut = "editRoles";

    }

    public function AgregarRol(){
        $this->validate([
            'rolNuevo' => 'required'
        ]);
        $role=Role::find($this->rolNuevo);
        $nuevoRol=array('id'=>$role->id,'name'=> $role->name);
        if(array_search($nuevoRol,$this->roles_Empleado)===false){
            $this->roles_Empleado[]=$nuevoRol;
        }
    }
    
    public function QuitarRol($id,$name){
        //dd("adasd");
        $role=Role::find($this->rolNuevo);
        $nuevoRol=array('id'=>$id,'name'=> $name);
        $ignorarPosicion=array_search($nuevoRol,$this->roles_Empleado);
        $nuevoArreglo=array();
        for($i=0;$i<count($this->roles_Empleado);$i++)
            if($i!=$ignorarPosicion)
                $nuevoArreglo[]=$this->roles_Empleado[$i];
        $this->roles_Empleado=$nuevoArreglo;
    }
    
    public function updateRoles(){
        $usuario = User::find($this->idUsuario);
        $idRoles=array();
        foreach($this->roles_Empleado as $rol){
            $idRoles[]=$rol['id'];
        }
        $usuario->roles()->sync($idRoles);
        $this->defaultView();
    }

    public function editComplemento($idUsuario){
        $this->defaultView();
        $this->viewCrut = "datosComplementario";
        $this->botonStor="update";
        $this->idUsuario = $idUsuario;
        $this->DatadosUsuarios();
        $this->name = (User::find($this->idUsuario))->name;
    }
    
    public function updateComplemento(){
        $this->validate([
            'TiposContratacion' => 'required',
            'TiposPersonal' => 'required',
            'JornadaTrabajo' => 'required'
        ]);
        $usuario = User::find($this->idUsuario);
        $usuario->update([
            'id_tipos_contratacion' => $this->TiposContratacion,
            'id_tipos_personal' => $this->TiposPersonal,
            'id_jornada_trabajo' => $this->JornadaTrabajo
            ]);
        $this->defaultView();
    }

    public function edit($idUsuario){
        $this->defaultView();
        $this->viewCrut = "edit";
        $this->botonStor="update";
        $this->idUsuario = $idUsuario;
        $this->DatadosUsuarios();
        $this->name = (User::find($this->idUsuario))->name;
    }

        
    public function update(){
        $this->validate([
            'name' => 'required',
            'apPaterno' => 'required',
            'apMaterno' => 'required',
            'genereo' => 'required',
            'fechaNacimiento' => 'required',
            'estadoCivil' => 'required',
            'nivelEstudio' => 'required',
            'campu' => 'required'
        ]);
        $usuario = User::find($this->idUsuario);
        $usuario->update([
            'name' => $this->name,
            'apellido_P' => $this->apPaterno,
            'apellido_M' => $this->apMaterno,
            'id_generos' => $this->genereo,
            'fecha_nacimiento' => $this->fechaNacimiento,
            'id_estados_civil' => $this->estadoCivil,
            'id_nivele_estudio' => $this->nivelEstudio,
            'campu_id' => $this->campu
        ]);
        $this->defaultView();
    }

    public function BajaAlta($id){
        $user=User::find($id);
        $user->update(['estado' => !$user->estado]);  
        $this->defaultView();
    }
                        
}
                    