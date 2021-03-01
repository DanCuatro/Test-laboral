<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Model\Cuestionario\CuestionarioResuelto;
use App\Model\Cuestionario\Periodo;
use App\Model\Cuestionario\Pregunta;
use App\Cuestionarios_calificado;
use App\Model\Usuario\User_Puesto;
use App\Clases\Tiempo;
use App\User;
use App\Model\Cuestionario\Seccion;
use Illuminate\Support\Facades\Auth;

use App\Model\Cuestionario\Dimension;
use App\Model\Cuestionario\DatoPersonal;
use App\Model\Cuestionario\Dominio;
use App\Model\Cuestionario\Categoria;
use App\Model\Cuestionario\CatNivelRiesgo;

use App\Model\Cuestionario\DimensionCalificada;
use App\Model\Cuestionario\DominioCalificado;
use App\Model\Cuestionario\CategoriaCalificada;

class CuestionarioComponent extends Component
{
    public $mensajeDatosFaltantes;
    public $seccionArray;
    public $colorMensaje = "alert-danger";
    public $fecha;
    public $cuestionario_calificado_id;
    public $item=array();
    public $respuesta;
    
    public $periodo,$cuestionario_id,$mns,$fechaInicio,$fechaLimite,$periodoString,$vista,$id_cuestionario,$cuestionario_resuelto_id;
    public $numeroPregunta=1;

    public function __construct(){
        //Verificar Que el Usuario tenga los datos completos
        $this->verificarDatos();
        //Encontrar el periodo actual
        $this->fecha    = Carbon::now();
        $tiempo         = new Tiempo;
        $this->periodo      =$tiempo->Periodo($this->fecha);
        $this->periodoString=$tiempo->PeriodoString($this->fecha);

        if($this->mensajeDatosFaltantes!=null){
            $this->vista="datosFaltantes";
        }else{
            //verificar si el periodo exite
            $this->periodo =$cuestionario=Periodo::where('periodo','=',$this->periodo->format('Y-m-d'))->first();
            if($cuestionario==null){
                $this->mns="Aun no se han asignado fechas para este periodo.";
                $this->vista="cuestionario-caduco";
            }else{
                $this->fechaInicio = $cuestionario->fecha_inicio;
                $this->fechaLimite = $cuestionario->fecha_cierre;
                $this->id_cuestionario = $cuestionario->id;
                $cuestionario_resuelto=( CuestionarioResuelto::where('user_id',Auth::id())->where('periodo_id',$cuestionario->id)->first() );
                $finalizado="";
                if($cuestionario_resuelto!=null){
                    $this->cuestionario_id = $cuestionario_resuelto->id;
                    $finalizado=$cuestionario_resuelto->section;
                }

                if($this->fecha < $this->fechaInicio){
                    $this->mns="Aun no inicia el periodo para realizar el Test laboral.(".($this->fechaInicio)." : ".($this->fechaLimite).")";
                    $this->vista="cuestionario-caduco";
                }else if ($this->fecha > $this->fechaLimite){
                    if($cuestionario_resuelto!=null && $finalizado=="finalizado"){
                        $this->BuscarSeccion();
                    }else{
                    $this->mns="Se ha cerrado el periodo para realizar el Test laboral.(".($this->fechaInicio)." : ".($this->fechaLimite).")";
                    $this->vista="cuestionario-caduco";}
                }else{
                    $this->vista="cuestionario-instruciones";
                    if($cuestionario_resuelto==null){
                        $this->CrearCuestionario();
                    }
                    $this->BuscarSeccion();
                }
            } 

        }
    }
    
    public function CrearCuestionario(){
        $cuestionario = CuestionarioResuelto::create(['calificacion' =>0]);
        $dimenciones=Dimension::where('estado',true)->get();
        foreach($dimenciones as $dimencion)
            $dimencion->dimensioncalificada()->save( 
                $cuestionario->dimensioncalificada()->create(['calificacion' => 0])
            );
        $dominios=Dominio::where('estado',true)->get();
        foreach($dominios as $domini){
            $domCal=$cuestionario->dominiocalificado()->create(['calificacion' => 0]);
            $domini->dominiocalificado()->save($domCal);
            CatNivelRiesgo::where('nivel','Nulo')->first()->dominiocalificado()->save($domCal);
        }
        $categorias=Categoria::where('estado',true)->get();
        foreach($categorias as $categoria){
            $catCal=$cuestionario->categoriacalificada()->create(['calificacion' => 0]);
            $categoria->categoriacalificada()->save($catCal);
            CatNivelRiesgo::where('nivel','Nulo')->first()->categoriacalificada()->save($catCal);
        }
        User::find(Auth::id())->cuestionarioresuelto()->save($cuestionario);
        User_Puesto::where('id_user',Auth::id())->where('fecha_final',null)->first()->puesto->cuestionarioresuelto()->save($cuestionario);
        Seccion::where('estado',true)->first()->cuestionarioresuelto()->save($cuestionario);//Modifique
        $this->periodo->cuestionarioresuelto()->save($cuestionario); 
        $this->cuestionario_id = $cuestionario->id;
       
        $datosPersonalesCuestioanrio=DatoPersonal::create([
            'puesto_user_id'    => user::find(Auth::id())->userPuesto()->first()->id,
            'campu_id'  => user::find(Auth::id())->campu_id,
            'id_generos'    => user::find(Auth::id())->id_generos,
            'id_estados_civil'  => user::find(Auth::id())->id_estados_civil,
            'id_nivele_estudio' => user::find(Auth::id())->id_nivele_estudio,
            'id_tipos_contratacion' => user::find(Auth::id())->id_tipos_contratacion,
            'id_tipos_personal' => user::find(Auth::id())->id_tipos_personal,
            'id_jornada_trabajo'    => user::find(Auth::id())->id_jornada_trabajo
        ]);
        $datosPersonalesCuestioanrio->cuestionarioResuelto()->save($cuestionario); 
    }

    public function BuscarSeccion(){
        $secciones=Seccion::where('estado',true)->get();//Optiene las secciones que no estan de baja
        $this->seccionArray=array();
        $puntero=0;
        $cuestionarioResuelto=CuestionarioResuelto::where('id',$this->cuestionario_id)->select('seccion_id')->first();
        /* El puntero indica lo siguiente: 
            -valor:0 Las Secciones ya resueltas
            -valor:1 La Seccion que se tiene que resolver
            -valor:2 Las Secciones que faltan por resolver*/
        $encontreSeccion=false;
        foreach($secciones as $seccion){
            if($seccion->estado) { 
                $preguntas=array();
                foreach($seccion->pregunta as $pregun){
                    if($pregun->estado)
                    $preguntas[]=array($pregun->id,$pregun->pregunta,$pregun->escala);
                }
                if($cuestionarioResuelto->seccion_id!=null && $cuestionarioResuelto->seccion_id==$seccion->id){
                    $encontreSeccion=true;
                    $puntero=1;
                }
                $this->seccionArray[]=array(
                    $seccion->titulo,
                    $seccion->restriccion,
                    $puntero,
                    $preguntas,
                    $seccion->id
                );
                if($encontreSeccion) $puntero=2;
            }
        }
        //Si la ultima seccion en el Array tiene un puntero ya revisado significa que este cuestionario ya fue terminado
        if($cuestionarioResuelto->seccion_id!=null && $this->seccionArray[count($this->seccionArray)-1][2]==0){
            $this->TerminarCuestioanrio();
        }
        //dd($this->seccionArray);
    }

    public function TerminarCuestioanrio(){
        $this->mns="Gracias por contestar este cuestionario.";
        $this->vista="cuestionario-caduco";
        $this->colorMensaje = "alert-success";
    }

    public function AvanzarSiguienteSeccion($seccion){
        $cuestionarioResuelto=CuestionarioResuelto::find($this->cuestionario_id);
        
        $this->seccionArray[$seccion][2]=0;
        if($seccion+1>=count($this->seccionArray)){
            $cuestionarioResuelto->seccion()->associate(Seccion::where('titulo','=','Finalizado')->first())->save();
            $this->TerminarCuestioanrio();
        }else{
            $cuestionarioResuelto->seccion()->associate(Seccion::where('id','=',$this->seccionArray[$seccion+1][4])->first())->save();
            $this->seccionArray[$seccion+1][2]=1;
            $this->numeroPregunta+=count($this->seccionArray[$seccion][3]);
            $this->item=array();
            $this->respuesta=null;
        }
    }
    
    public function StorSection($seccion){
        //dd($this->seccionArray);
        $validacion=[];
        for($x=0;$x<count(($this->seccionArray[$seccion][3]));$x++){
            $validacion+=['item.'.$x => 'required'];
        }
        $this->validate($validacion);
        for($i=0;$i<count($this->seccionArray[$seccion][3]);$i++){
            $respuesta=Pregunta::find($this->seccionArray[$seccion][3][$i][0])->respuesta()->create([
                'respuesta' => $this->item[$i]
            ]);
            CuestionarioResuelto::find($this->cuestionario_id)->respuesta()->save($respuesta);
            $this->ActualizacionCategoriaDominio($respuesta);
        }
        $this->AvanzarSiguienteSeccion($seccion);
    }
    //Para las seeciones que tienen una restriccion de personal 
    public function Restriccion($seccion){
        $this->validate(['respuesta' => 'required']);
        if($this->respuesta=="si"){
            $this->seccionArray[$seccion][1]=null;
        }else{
            $this->AvanzarSiguienteSeccion($seccion);
        }
    }


    public function ActualizacionCategoriaDominio($respuesta){
        //Otener la calificacion 
        $calificacion=$respuesta->respuesta;
        if($respuesta->pregunta->escala)
        $calificacion=$this->InvertirResultado($calificacion);

        $cuestionarioResuelto=CuestionarioResuelto::find($this->cuestionario_id);
        $dimencionCalificada=DimensionCalificada::whereHas('dimension.pregunta.respuesta', function ($query) use($respuesta) {
            $query->where('id',$respuesta->id);
        })->where('cuestionario_resuelto_id',$this->cuestionario_id)->first();
        //dd($dimencionCalificada,$this->cuestionario_id);
        $dominioCalificado=DominioCalificado::whereHas('dominio.dimension.pregunta.respuesta', function ($query) use($respuesta) {
            $query->where('id',$respuesta->id);
        })->where('cuestionario_resuelto_id',$this->cuestionario_id)->first();
        $categoriaCalificada=CategoriaCalificada::whereHas('categoria.dominio.dimension.pregunta.respuesta', function ($query) use($respuesta) {
            $query->where('id',$respuesta->id);
        })->where('cuestionario_resuelto_id',$this->cuestionario_id)->first();
        
        $dimencionCalificada->update(['calificacion' => ($dimencionCalificada->calificacion+$calificacion)]);
        $cuestionarioResuelto->update(['calificacion' => ($cuestionarioResuelto->calificacion+$calificacion)]);
        $dominioCalificado->update(['calificacion' => ($dominioCalificado->calificacion+$calificacion)]);
        $categoriaCalificada->update(['calificacion' => ($categoriaCalificada->calificacion+$calificacion)]);
        
        //Guardar Calificacion y modificar nivel de riego
        $riesgometrica=$dominioCalificado->dominio->riesgometrica;
        $this->RiesgoCalificacion($dominioCalificado,$riesgometrica,$calificacion)->dominiocalificado()->save($dominioCalificado);
        
        $riesgometrica=$categoriaCalificada->categoria->riesgometrica;
        $this->RiesgoCalificacion($categoriaCalificada,$riesgometrica,$calificacion)->categoriacalificada()->save($categoriaCalificada);
        
        $riesgometrica=$cuestionarioResuelto->periodo->cuestionario->riesgometrica;
        $this->RiesgoCalificacion($cuestionarioResuelto,$riesgometrica,$calificacion)->cuestionarioresuelto()->save($cuestionarioResuelto);
        
    }

    public function RiesgoCalificacion($modelo,$riesgometrica,$calificacion){
        if($modelo->calificacion<$riesgometrica->metrica_nulo)
            return CatNivelRiesgo::where('nivel','Nulo')->first();
        elseif($modelo->calificacion<$riesgometrica->metrica_bajo)
            return CatNivelRiesgo::where('nivel','Bajo')->first();
        elseif($modelo->calificacion<$riesgometrica->metrica_medio)
            return CatNivelRiesgo::where('nivel','Medio')->first();
        elseif($modelo->calificacion<$riesgometrica->metrica_alto)
            return CatNivelRiesgo::where('nivel','Alto')->first();
        else
            return CatNivelRiesgo::where('nivel','Muy alto')->first();
    }

    public function InvertirResultado($x){
        $y=4;//limite Superior
        $z=0;//limite Inferior
        $r=$y-$x+$z;
        return $r;
    }

    public function Comenzar(){
        $this->vista="cuestionario-resolver";
    }

    public function render(){
        $this->verificarDatos();
        return view('cuestionario.livewire.cuestionario-component');
    }

    public function storSection14A(){
        $this->validate(['item1' => 'required']);
        if($this->item1== "si"){
            $this->section14 = "section14";
        }else if($this->item1== "no"){
            $this->section14 = "default";
            $cues=Cuestionarios_resuelto::find($this->cuestionario_resuelto_id);
            $cues->update([
                'section' => "finalizado"
            ]);
            $this->colorSection14 = "alert-success";
        }
    }

    public function storSection14(){
        $this->validate(['item1' => 'required','item2' => 'required','item3' => 'required','item4' => 'required']);
        $this->section14 = "default";
        $cues=Cuestionarios_resuelto::find($this->cuestionario_resuelto_id);
        $cues->update([
            'section' => "finalizado",
            's69' => $this->item1,
            's70' => $this->item2,
            's71' => $this->item3,
            's72' => $this->item4
        ]);
        $res=Cuestionarios_calificado::find($this->cuestionario_calificado_id);
        $res->update([
            'dimension20' => $res->dimension20+$this->item1+$this->item2+$this->item3+$this->item4
        ]);
        $this->ActualizacionCategoriaDominio();
        $this->defaulItems();
        $this->colorSection14 = "alert-success";
    }

    public function verificarDatos(){
        $this->mensajeDatosFaltantes=null;
        $user=User::find(Auth::id());
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
        if(User_Puesto::where('id_user',Auth::id())->where('fecha_final',null)->count()==0)
            $this->mensajeDatosFaltantes="Usted tiene datos Faltantes, no podrá realizar el cuestionario hasta que estén completos";
    }
}
