<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Model\Usuario\Area;
use App\Model\Usuario\Peticion;
use App\Model\Usuario\Correo;
use App\Model\Usuario\Puesto;
use App\Model\Usuario\Campu;
use App\Model\Cuestionario\Periodo;
use App\Model\Usuario\Catalogos\Cat_genero;
use App\Model\Usuario\Catalogos\Cat_estados_civil;
use App\Model\Usuario\Catalogos\Cat_nivel_estudio;
use App\User;
use App\Model\Usuario\User_Puesto;
use Carbon\Carbon;
use Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageCambioCorreo;

class DatosPersonalesComponent extends Component
{
    use WithPagination;

    public $viewDatosPersonales;
    public $user;
    public $mensaje;
    public $mensajeDatosFaltantes;
    public $maximaFechaNacimiento;

    //Catalogos
    public $catalogo_area;
    public $catalogo_puesto;
    public $catalogo_genero;
    public $catalogo_campu;
    public $catalogo_estados_civil;
    public $catalogo_nivel_estudio;
    public $periodo;
    public $correo;
    
    //Datos Usuario
    public $name;
    public $apellido_P;
    public $apellido_M;
    public $cat_genero;
    public $campu;
    public $cat_estados_civil;
    public $cat_nivel_estudio;
    public $fecha_nacimiento;

    //Datos Puesto
    public $cat_ara;
    public $cat_puesto;
    public $fechaInicioPuesto;
    public $puestosTrabajando=array();
    public $contadorPuestos=0;

    //Datos Contraseña
    public $contraseña_antigua;
    public $contraseña_nueva;
    public $contraseña_nueva_confirmation;

    //Datos Correo
    public $base;
    public $extencion;
    public $email;
    public $numeroPeticiones;
    public $peticion;

    //Menu de edicion
    public $menuEdicion=array();

    public function mount(){
        //Catalgoso
        $this->catalogo_area            = Area::where('estado',true)->get();
        $this->catalogo_genero          = Cat_genero::all();
        $this->catalogo_campu           = Campu::all();
        $this->catalogo_estados_civil   = Cat_estados_civil::all();
        $this->catalogo_nivel_estudio   = Cat_nivel_estudio::all();
        $this->periodo                  = Periodo::all();
        $this->correo                   = Correo::all();

        $this->arregloAreas             = array();
        $this->viewDatosPersonales      ="show";
        $this->user                     =User::find(Auth::id());
        $this->name                     =$this->user->name;
        $this->apellido_P               =$this->user->apellido_P;
        $this->apellido_M               =$this->user->apellido_M;
        $this->cat_genero               =$this->user->id_generos;
        $this->campu                    =$this->user->campu_id;
        $this->cat_estados_civil        =$this->user->id_estados_civil;
        $this->cat_nivel_estudio        =$this->user->id_nivele_estudio;
        $this->fecha_nacimiento         =$this->user->fecha_nacimiento;
        $this->catalogo_puesto          =array();
        $this->menuEdicion              =array(true,false,false,false);
        $this->numeroPeticiones         =Peticion::where('id_user',Auth::id())->count();
        $this->peticion                 =Peticion::where('id_user',Auth::id())->first();
        $this->maximaFechaNacimiento    =Carbon::now()->subYears(18);
        //dd( $this->maximaFechaNacimiento->format('Y-m-d'));
        $puestoT=User_Puesto::where('id_user',Auth::id())->where('fecha_final',null)->get();
        foreach($puestoT as $item){
            $this->AgregarPuesto($item->id,$item->id_puesto,$item->puesto->area->id,$item->fecha_inicio);
        }
    }
    
    public function render(){
        $this->verificarDatos();
        if($this->cat_ara!=null)
            $this->catalogo_puesto=Puesto::where('area_id',$this->cat_ara)->where('estado',true)->get();
        return view('users.livewire.datosPersonales.registro-component');
    }

    public function verificarDato($dato){
        if($dato==null){
            return "<Dato Faltante>";
        }else if(is_string($dato))
            return $dato;
        else
            return $dato->name;
    }

    public function DefaulData(){
        $this->mensaje=null;
        $this->validate([
            'name'              => '',
            'apellido_P'        => '',
            'apellido_M'        => '',
            'cat_genero'        => '',
            'campu'             => '',
            'cat_estados_civil' => '',
            'cat_nivel_estudio' => '',
            'fecha_nacimiento'  => '',
            'cat_puesto'        => '',
            'fechaInicioPuesto' => '',
            'contraseña_antigua'       => '', 
            'contraseña_nueva'       => '',
            'contraseña_nueva_confirmation' => '' 
        ]);
    }

    public function CambiarView(){
        if($this->viewDatosPersonales=="show")
            $this->viewDatosPersonales="edit";
        else
            $this->viewDatosPersonales="show";
        $this->DefaulData();
    }

    public function CambiarMenu($x){
        $this->menuEdicion[0]=false;
        $this->menuEdicion[1]=false;
        $this->menuEdicion[2]=false;
        $this->menuEdicion[3]=false;
        $this->menuEdicion[$x]=true;
        $this->DefaulData();    
    }

    public function updateDatos(){
        $this->validate([
            'name'          => 'required',
            'apellido_P'    => 'required',
            'apellido_M'    => 'required',
            'cat_genero'    => 'required',
            'campu'         => 'required',
            'cat_estados_civil' => 'required',
            'cat_nivel_estudio' => 'required',
            'fecha_nacimiento'  => 'required'
        ]);
        $this->user->update([
            'name'          => $this->name,
            'apellido_P'    => $this->apellido_P,
            'apellido_M'    => $this->apellido_M,
            'id_generos'    => $this->cat_genero,
            'campu_id'      => $this->campu,
            'id_estados_civil'  => $this->cat_estados_civil,
            'id_nivele_estudio' => $this->cat_nivel_estudio,
            'fecha_nacimiento'  => $this->fecha_nacimiento
        ]);
        $this->user = User::find(Auth::id());
        $this->CambiarView();
    }

    public function ActivarPuesto(){
        if(!($this->user->userPuesto->count()<2) || !($this->periodo->count()<2))
            $this->fechaInicioPuesto=Carbon::now();
        $this->validate([
            'cat_puesto'        => 'required',
            'fechaInicioPuesto' => 'required'
        ]);
        if(User_Puesto::where('id_user',Auth::id())->where('id_puesto',$this->cat_puesto)->where('fecha_final',null)->count()==0){
            $nuevoPuesto=User_Puesto::create([
                'id_puesto'     => $this->cat_puesto,
                'id_user'       => Auth::id(),
                'fecha_inicio'  => $this->fechaInicioPuesto
            ]);
            $this->AgregarPuesto($nuevoPuesto->id,$this->cat_puesto,$this->cat_ara,$this->fechaInicioPuesto);
        }
    }

    public function DesactivarPuesto($id){
        $this->SacarPuesto($id);
        User_Puesto::find($id)->update(['fecha_final' => Carbon::now()]);
    }

    public function AgregarPuesto($id,$cat_puesto,$cat_ara,$fecha){
        $puesto=Puesto::find($cat_puesto);
        $area=Area::find($cat_ara);
        $nuevoElemento=array('id' => $id,'puesto' => $puesto->name,'area' => $area->name,'tiempo' => 'Trabajando aquí desde el '.$fecha);
        if($this->puestosTrabajando==null){
            $this->puestosTrabajando[]=$nuevoElemento;
            $this->contadorPuestos=$this->contadorPuestos+1;
        }else if(array_search($nuevoElemento,$this->puestosTrabajando)===false){
            $this->puestosTrabajando[]=$nuevoElemento;
            $this->contadorPuestos=$this->contadorPuestos+1;
        }
    }

    public function SacarPuesto($id){
        $nuevoArreglo=array();
        foreach($this->puestosTrabajando as $item){
            if($item['id']!=$id)
                $nuevoArreglo[]=$item;
        }
        $this->puestosTrabajando=$nuevoArreglo;
        $this->contadorPuestos= $this->contadorPuestos-1;
    }

    public function CambiarContraseña(){
        if(!Hash::check($this->contraseña_antigua, $this->user->password))
            $this->validate(['contraseña_antigua' => ['required','confirmed'], 'contraseña_nueva' => ['required','string','min:8','confirmed'],'contraseña_nueva_confirmation' => 'required', ]);
        else
            $this->validate(['contraseña_antigua' =>  'required', 'contraseña_nueva' => ['required','string','min:8','confirmed'],'contraseña_nueva_confirmation' => 'required', ]);
        $this->user->update(['password'=>bcrypt($this->contraseña_nueva)]);
        $this->contraseña_antigua=$this->contraseña_nueva=$this->contraseña_nueva_confirmation=null;
        $this->mensaje="La contraseña ha sido Actualizada";
    }

    public function CambiarCorreo(){
        $this->validate([
            'extencion' => ['required']
        ]);
        $this->email=$this->base."@".Correo::find($this->extencion)->name;
        $this->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);
        $this->peticion=Peticion::create([
            'id_user' => Auth::id(),
            'correo_id' => $this->extencion,
            'email' => $this->email,
        ]);
        $this->numeroPeticiones =1;
        $this->enviarEmailCambio($this->peticion->id);
    }

    public function cancelarPeticion($id){
        Peticion::find($id)->delete();
        $this->numeroPeticiones = 0;
        $this->peticion = Peticion::where('id_user',Auth::id())->first();
    }

    public function enviarEmailCambio($id){
        Mail::to(Peticion::find($id)->email)->send(new MessageCambioCorreo($id,User::find(Auth::id())->email));
        $this->mensaje="Se ha enviado el mensaje de para el cambio a su nuevo Correo";
    }
    public function verificarDatos(){
        $this->mensajeDatosFaltantes=null;
        $user=$this->user;
        $arreglo=array();
        $arreglo[0]  = $user->apellido_P;
        $arreglo[1]  = $user->apellido_M;
        $arreglo[2]  = $user->correo_id;
        $arreglo[3]  = $user->id_generos;
        $arreglo[4]  = $user->fecha_nacimiento;
        $arreglo[5]  = $user->id_tipos_contratacion;
        $arreglo[6]  = $user->campu_id;
        $arreglo[7]  = $user->id_estados_civil;
        $arreglo[8]  = $user->id_nivele_estudio;
        $arreglo[9]  = $user->id_tipos_personal;
        $arreglo[10] = $user->id_jornada_trabajo;
        $arreglo[11] = $user->name;

        foreach($arreglo as $item)
            if($item==null)
                $this->mensajeDatosFaltantes="Usted tiene datos Faltantes, no podrá realizar el cuestionario hasta que estén completos";
        if($this->puestosTrabajando==0)
            $this->mensajeDatosFaltantes="Usted tiene datos Faltantes, no podrá realizar el cuestionario hasta que estén completos";
    }
}
