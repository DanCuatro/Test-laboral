<?php

namespace App\Http\Livewire;

use App\Model\Cuestionario\Periodo;
use App\Model\Usuario\Area;
use App\Model\Usuario\Campu;
use App\Model\Usuario\Catalogos\Cat_genero;
use App\Model\Usuario\Catalogos\Cat_estados_civil;
use App\Model\Usuario\Catalogos\Cat_jornada_trabajo;
use App\Model\Usuario\Catalogos\Cat_nivel_estudio;
use App\Model\Usuario\Catalogos\Cat_tipos_contratacion;
use App\Model\Usuario\Catalogos\Cat_tipos_personal;

use App\Model\Cuestionario\CatNivelRiesgo;
use App\Model\Cuestionario\CuestionarioResuelto;
use App\Model\Cuestionario\CategoriaCalificada;
use App\Model\Cuestionario\DominioCalificado;

use App\Model\Cuestionario\Categoria;
use App\Model\Cuestionario\Dominio;
use Livewire\Component;

use Barryvdh\DomPDF\Facade as PDF;

class GraficoComponent extends Component
{
    //Tablas
    public $nievelesRiesgo;
    
    //listas desplegables y mas
    public $listaPeriodos;
    public $listaCategoria;
    public $listaDomonio;
    public $modelosDeControl;
    public $pdf;
    //Variables listas desplegables y mas
    public $idPeriodo;//estos
    public $agrupacion="Cuestionario";//
    public $subAgrupacion;//
    public $idSegmento;//este

    //Sementacion Variables
    public $punteroSegmento=0; //estos
    public $punteroSegmentoAntiguo=0;
   
    //limitacion Varibales
    public $punteroDelimitado=0;
    public $punteroDelimitadoAntiguo=0;
    public $punteroDelimitadoInterno=0;
    
    //Variables Grafica
    public $dato    =array();
    public $ver     =true;
    public $myChart ="myChart1";
    
    //vriables de consulta
    public $whereHasGeneral;
    public $etiquetasLimitadores =array(); //este

    //Divs menu General, Area, Datos-personales
    public $posicionMenu = array(true,false,false);

    //Graficas Guardadas
    public $titulo;
    public $graficasGuardadas=array();
    public $punteroGraficasGuardadas=null;

    public function GuardarGrafica(){
        $this->recargar();
        if(Periodo::find($this->idPeriodo)!=null)
        $nuevoElemento=array(
            "titulo"=>$this->titulo,
            "idPeriodo"=>$this->idPeriodo,
            "agrupacion"=>$this->agrupacion,
            "subAgrupacion"=>$this->subAgrupacion,
            "punteroSegmento"=>$this->punteroSegmento,
            "idSegmento"=>$this->idSegmento,
            "punteroDelimitado"=>$this->punteroDelimitado,
            "punteroDelimitadoInterno"=>$this->punteroDelimitadoInterno,
            "etiquetasLimitadores"=>$this->etiquetasLimitadores,
            "datos"=>$this->dato,
            "periodo"=>Periodo::find($this->idPeriodo)->periodo,
            "categoria"=>$this->listaCategoria,
            "dominio"=>$this->listaDomonio,
        );
        if($this->punteroGraficasGuardadas===null){
            $this->graficasGuardadas[]=$nuevoElemento;
            $this->punteroGraficasGuardadas=count($this->graficasGuardadas)-1;
        }
        else
            $this->graficasGuardadas[$this->punteroGraficasGuardadas]=$nuevoElemento;
    }
    public function EliminarGuardarGrafica($punteroGraficasGuardadas){
        if(($punteroGraficasGuardadas+1)==count($this->graficasGuardadas)) $this->punteroGraficasGuardadas=null;
        else $this->punteroGraficasGuardadas++;
        $nuevoArray=array();
        for($i=0;$i<count($this->graficasGuardadas);$i++)
        if($i!=$punteroGraficasGuardadas)
        $nuevoArray[]=$this->graficasGuardadas[$i];
        $this->graficasGuardadas=$nuevoArray;
    }
    public function CargarGrafica($punteroGraficasGuardadas){
        $this->punteroGraficasGuardadas=$punteroGraficasGuardadas;
        $this->titulo=$this->graficasGuardadas[$punteroGraficasGuardadas]["titulo"];
        $this->idPeriodo=$this->graficasGuardadas[$punteroGraficasGuardadas]["idPeriodo"];
        $this->agrupacion=$this->graficasGuardadas[$punteroGraficasGuardadas]["agrupacion"];
        $this->subAgrupacion=$this->graficasGuardadas[$punteroGraficasGuardadas]["subAgrupacion"];
        $this->punteroSegmento=$this->graficasGuardadas[$punteroGraficasGuardadas]["punteroSegmento"];
        $this->idSegmento=$this->graficasGuardadas[$punteroGraficasGuardadas]["idSegmento"];
        $this->punteroDelimitado=$this->graficasGuardadas[$punteroGraficasGuardadas]["punteroDelimitado"];
        $this->punteroDelimitadoInterno=$this->graficasGuardadas[$punteroGraficasGuardadas]["punteroDelimitadoInterno"];
        $this->etiquetasLimitadores=$this->graficasGuardadas[$punteroGraficasGuardadas]["etiquetasLimitadores"];
        $this->RenderizarGrafica();
    }
    public function NuevoElemento(){
        $this->punteroGraficasGuardadas=null;
        $this->GuardarGrafica();
    }
    
    public function mount(){
        //Variables de control
        $this->subAgrupacion    =1;
        
        //Variables Nucleo
        $this->nievelesRiesgo   =CatNivelRiesgo::all();
        $this->modelo           =CuestionarioResuelto::get(); 
        
        //Cargar lista desplegables y mas
        $this->listaPeriodos    =Periodo::all();

        $this->modelosDeControl=array(
            array('name' => 'Completo','modelos' => null,'whereHas' => null),
            array('name' => 'Área','modelos' => Area::all(),'whereHas' => 'datosPersonales.userPuesto.puesto.area'),
            array('name' => 'Género','modelos' => Cat_genero::all(),'whereHas' => 'datosPersonales.cat_genero'),
            array('name' => 'Estado Civil','modelos' => Cat_estados_civil::all(),'whereHas' => 'datosPersonales.cat_estados_civil'),
            array('name' => 'Jornada de Trabajo','modelos' => Cat_jornada_trabajo::all(),'whereHas' => 'datosPersonales.cat_jornada_trabajo'),
            array('name' => 'Nivel de Estudio','modelos' => Cat_nivel_estudio::all(),'whereHas' => 'datosPersonales.cat_nivel_estudio'),
            array('name' => 'Tipo de Contratación','modelos' => Cat_tipos_contratacion::all(),'whereHas' => 'datosPersonales.cat_tipos_contratacion'),
            array('name' => 'Tipo de Personal','modelos' => Cat_tipos_personal::all(),'whereHas' => 'datosPersonales.cat_tipos_personal'),
            array('name' => 'Campus','modelos' => Campu::all(),'whereHas' => 'datosPersonales.campu'),
        );
    }
    
    public function render(){
        //Actualizar Canavas
        $this->emit('Recargar',$this->dato,$this->myChart);
        //Actualizacion de la 3´era Lista (tabpanel:General) 
        if($this->agrupacion=="Cuestionario"){
            $this->listaCategoria   =null;
            $this->listaDomonio     =null;
        }elseif($this->agrupacion=="Categori"){
            $this->listaCategoria   =Categoria::where('estado',true)->get();
            $this->listaDomonio     =null;
        }elseif($this->agrupacion=="Dominio"){
            $this->listaDomonio     =Dominio::where('estado',true)->get();
            $this->listaCategoria   =null;
        }
        if($this->punteroSegmento!=$this->punteroSegmentoAntiguo){
            $this->punteroSegmentoAntiguo=$this->punteroSegmento;
            if($this->punteroSegmento!=0){
                $this->idSegmento=array();
                for($i=0;$i<count($this->modelosDeControl[$this->punteroSegmento]['modelos']);$i++){
                    $this->idSegmento[]=$this->modelosDeControl[$this->punteroSegmento]['modelos'][$i]["id"];
                }
            }
        }
        return view('graficos.livewire.grafico-component');
    }

    public function recargar(){
       $this->RenderizarGrafica();
    }
    
    public function RenderizarGrafica(){
        $modeloSegmentador=array(Area::all(),Cat_genero::all(),Cat_estados_civil::all(),Cat_jornada_trabajo::all(),Cat_nivel_estudio::all(),Cat_tipos_contratacion::all(),Cat_tipos_personal::all(),Campu::all());
        $label;
        $this->dato=array();
        if($this->modelosDeControl[$this->punteroSegmento]['modelos']==null){
                    $label="Total";
                    $datos=array();
                    foreach($this->nievelesRiesgo as $nivel){
                        $modelo=$this->Limitador();
                        $datos[]=$modelo->where('cat_nivel_riesgo_id',$nivel->id)->count();
                    }
                    $this->dato[]=array($label,$datos);
        }else{
            for($i=0;$i<count($this->idSegmento);$i++){
                if($this->idSegmento[$i]!=null){
                    $label=$modeloSegmentador[$this->punteroSegmento-1]->where('id',$this->idSegmento[$i])->first()->name;
                    $datos=array();
                    foreach($this->nievelesRiesgo as $nivel){
                        $idSegmento=$this->idSegmento[$i];
                        $modelo=$this->Limitador();
                        $charWhereHas=$this->whereHasGeneral.''.$this->modelosDeControl[$this->punteroSegmento]['whereHas'];
                        $datos[]=$modelo->whereHas($charWhereHas, function ($query) use($idSegmento) {
                            $query->where('id',$idSegmento);
                        })->where('cat_nivel_riesgo_id',$nivel->id)->count();
                    }
                    $this->dato[]=array($label,$datos);
                }
            }
        }
        $this->ActualizarCanavas();
    }

    public function Limitador(){
        $modelo=$this->Agrupacion();
        for($i=0;$i<count($this->etiquetasLimitadores);$i++){
            $id=array();
            for($x=0;$x<count($this->etiquetasLimitadores[$i]['ids']);$x++)
                $id[]=$this->etiquetasLimitadores[$i]['ids'][$x]['id'];
            $puntero=$this->etiquetasLimitadores[$i]['puntero'];
            $charWhereHas=$this->whereHasGeneral.''.$this->modelosDeControl[$puntero]['whereHas'];
            $modelo=$modelo->whereHas($charWhereHas, function ($query) use($id) {
                $query->whereIn('id',$id);
            });
        }
        return $modelo;
    }

    public function ActualizarCanavas(){
        if($this->ver) $this->myChart="myChart1";
        else $this->myChart="myChart2";
        $this->ver=!$this->ver;
        $this->emit('Recargar',$this->dato,$this->myChart);
    }

    public function Agrupacion(){
        if($this->agrupacion==="Cuestionario"){
            $this->whereHasGeneral="";
            return CuestionarioResuelto::where('periodo_id',$this->idPeriodo);
        }   
        elseif($this->agrupacion==="Categori"){
            $this->whereHasGeneral='cuestionarioresuelto.';
            $idPeriodo      =$this->idPeriodo;
            $subAgrupacion  =$this->subAgrupacion;
            return CategoriaCalificada::whereHas('cuestionarioresuelto', function ($query) use($idPeriodo) {
                $query->where('periodo_id',$idPeriodo);
            })->whereHas('categoria', function ($query) use($subAgrupacion) {
                $query->where('id',$subAgrupacion);
            });
        }   
        elseif($this->agrupacion==="Dominio"){
            $this->whereHasGeneral='cuestionarioresuelto.';
            $idPeriodo      =$this->idPeriodo;
            $subAgrupacion  =$this->subAgrupacion;
            return DominioCalificado::whereHas('cuestionarioresuelto', function ($query) use($idPeriodo) {
                $query->where('periodo_id',$idPeriodo);
            })->whereHas('dominio', function ($query) use($subAgrupacion) {
                $query->where('id',$subAgrupacion);
            });
        }
    }
    
    public function CambiarMenu($i){
        $this->posicionMenu[0]=false;
        $this->posicionMenu[1]=false;
        $this->posicionMenu[2]=false;
        $this->posicionMenu[$i]=true;
    }

    public function AgregarEtiquetaLimitante(){
        $nuevoElemento1 = $this->punteroDelimitado;
        $nuevoElemento2 = array('id'=>$this->modelosDeControl[$this->punteroDelimitado]["modelos"][$this->punteroDelimitadoInterno]["id"],'name'=>$this->modelosDeControl[$this->punteroDelimitado]["modelos"][$this->punteroDelimitadoInterno]["name"]);
        
        for($i=0;$i<count($this->etiquetasLimitadores);$i++)
            if($nuevoElemento1==$this->etiquetasLimitadores[$i]['puntero']){
                if(array_search($nuevoElemento2,$this->etiquetasLimitadores[$i]['ids'])===false)
                    $this->etiquetasLimitadores[$i]['ids'][]=$nuevoElemento2;
            }else if($i==(count($this->etiquetasLimitadores)-1)){
                $this->etiquetasLimitadores[]=array('puntero'=>$nuevoElemento1,'ids'=>array($nuevoElemento2));
            }
        if(count($this->etiquetasLimitadores)==0)
            $this->etiquetasLimitadores[]=array('puntero'=>$nuevoElemento1,'ids'=>array($nuevoElemento2));
       //dd($this->etiquetasLimitadores);
    }

    public function SacarEtiqueta($i1,$x1){
        $datos=array();
        for($i=0;$i<count($this->etiquetasLimitadores);$i++){
            if($i!=$i1){
                $datos[]=$this->etiquetasLimitadores[$i];
            }else if(count($this->etiquetasLimitadores[$i]['ids'])!=1){
                $datos[]=$this->etiquetasLimitadores[$i]; 
                $subDatos=array();
                for($x=0;$x<count($this->etiquetasLimitadores[$i]['ids']);$x++){
                    if($x!=$x1)$subDatos[]=$this->etiquetasLimitadores[$i]['ids'][$x];
                }
                $datos[$i]['ids']=$subDatos;
            } 
        }
        $this->etiquetasLimitadores=$datos;
    }

    public function PDF(){
        //dd("hola que hace ? s");
        $pdf = PDF::loadView('graficos.livewire.pdf');  
       
        //dd($pdf->download('cuestionario.pdf'));
        return redirect()->route('graficos.pdf');
    }
}