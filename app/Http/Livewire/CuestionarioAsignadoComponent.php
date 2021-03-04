<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;

use App\Clases\Tiempo;
use App\Model\Cuestionario\Cuestionario;
use App\Model\Cuestionario\Periodo;
//Notificaciones
use Illuminate\Support\Facades\Mail;
use App\Mail\Message;


class CuestionarioAsignadoComponent extends Component
{
    public $fecha;
    public $periodoData,$periodoString;
    public $repuesta;
    public $cuestionario_id;

    public $fechaInicio;
    public $fechaLimite;

    public $Limite;
    public $habilidad;
    public $errorFecha;
    public $colorAlerta;

    public function __construct(){
        $this->fecha    = Carbon::now();
        $tiempo         = new Tiempo;
        $this->periodoData      =$tiempo->Periodo($this->fecha);
        $this->periodoString=$tiempo->PeriodoString($this->fecha);
        $this->Limite=$tiempo->Periodo($this->fecha)->addMonth(6)->subDay();
        $periodo=Periodo::where('periodo','=',$this->periodoData->format('Y-m-d'))->first();
        
        if($periodo==null){
            $cuestionario=Cuestionario::where('nombre','NOM-035')->where('estado',true)->first();
            $periodo= Periodo::create([
                'periodo' => $this->periodoData,
                'periodoString'=>$this->periodoString
            ]);
            $cuestionario->periodo()->save($periodo); 
            $this->cuestionario_id = $periodo->id;
        }else{
            $this->cuestionario_id = $periodo->id;
            $this->fechaInicio = $periodo->fecha_inicio;
            $this->fechaLimite = $periodo->fecha_cierre;
        } 
        
    }

    public function guardar(){
        $fechasAsignacion=$this->validate([
            'fechaInicio' => 'required',
            'fechaLimite' => 'required'
        ]);
        if ($this->fechaInicio <=$this->fechaLimite){
            $cues=Periodo::find($this->cuestionario_id);
            $cues->update([
                'fecha_inicio' => $this->fechaInicio,
                'fecha_cierre' => $this->fechaLimite
            ]);
            $this->colorAlerta="alert-info";
            $this->errorFecha="fechas Asignadas";
            //enviar notificaciones de asignacion 
            //Mail::to('alucard11096@gmail.com')->send(new Message($fechasAsignacion,$this->periodoString));
        }else{
            $this->colorAlerta="alert-danger";
            $this->errorFecha="La fecha Inicial tiene que ser MENOR que la Final";
        }
    }

    public function render()
    {
        return view('cuestionario.livewire.cuestionario-asignado-component');
    }
}
