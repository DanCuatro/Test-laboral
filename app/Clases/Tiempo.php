<?php namespace App\Clases;

use Carbon\Carbon;

class Tiempo 
{
    public function PeriodoString($fecha){
        $fecha = new Carbon($fecha);
        $Periodo1 = Carbon::create($fecha->format('Y'),6,30,0,0,0, 'America/Mexico_City');
        if($fecha <= $Periodo1)
            return $fecha->format('Y')." (Enero - Junio)";  
        else
            return $fecha->format('Y')." (Julio - Diciembre)";
    }

    public function Periodo($fecha){
        $fecha = new Carbon($fecha);
        $Periodo1 = Carbon::create($fecha->format('Y'),6,30,0,0,0, 'America/Mexico_City');
        if($fecha <= $Periodo1)
            return Carbon::create($fecha->format('Y'),1,0,0,0,0, 'America/Mexico_City');
        else
            return Carbon::create($fecha->format('Y'),7,1,0,0,0, 'America/Mexico_City');
    }

}