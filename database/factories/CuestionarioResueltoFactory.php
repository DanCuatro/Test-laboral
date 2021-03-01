<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Cuestionario\DimensionCalificada;
use App\Model\Cuestionario\DominioCalificado;

use App\Model\Cuestionario\CuestionarioResuelto;
use App\Model\Cuestionario\Dimension;
use App\Model\Cuestionario\Dominio;
use App\Model\Cuestionario\Categoria;
use App\Model\Cuestionario\Periodo;
use App\Model\Cuestionario\Seccion;
use App\Model\Cuestionario\Cuestionario;

use App\Model\Cuestionario\CatNivelRiesgo;
use App\User;
use Faker\Generator as Faker;

$factory->define(CuestionarioResuelto::class, function (Faker $faker) {
    $cuestionario=CuestionarioResuelto::create(['calificacion' =>0]);
    $calificacionTotal=0;
    $dimenciones=Dimension::where('estado',true)->get();
    foreach($dimenciones as $dimencion){
        $random=rand(0,($dimencion->riesgometrica->metrica_alto));
        $dimencion->dimensioncalificada()->save(
            $cuestionario->dimensioncalificada()->create(['calificacion' => $random])
        );
        $calificacionTotal=$calificacionTotal+$random;
    }

    $dominios=Dominio::where('estado',true)->get();
    foreach($dominios as $domini){
        $dimencionesCal=DimensionCalificada::whereHas('dimension',function ($query) use($domini) {
            $query->where('dominio_id',$domini->id);
        })->where('cuestionario_resuelto_id',$cuestionario->id)->select('calificacion')->get();
        $calificacion=0;
        foreach($dimencionesCal as $cal)
            $calificacion=$calificacion+$cal->calificacion;
        $dominioCalificado=$domini->dominiocalificado()->save(
            $cuestionario->dominiocalificado()->create(['calificacion' => $calificacion])
        );
        if($calificacion<$dominioCalificado->dominio->riesgometrica->metrica_nulo)
            CatNivelRiesgo::where('nivel','Nulo')->first()->dominiocalificado()->save($dominioCalificado);
        elseif($calificacion<$dominioCalificado->dominio->riesgometrica->metrica_bajo)
            CatNivelRiesgo::where('nivel','Bajo')->first()->dominiocalificado()->save($dominioCalificado);
        elseif($calificacion<$dominioCalificado->dominio->riesgometrica->metrica_medio)
            CatNivelRiesgo::where('nivel','Medio')->first()->dominiocalificado()->save($dominioCalificado);
        elseif($calificacion<$dominioCalificado->dominio->riesgometrica->metrica_alto)
            CatNivelRiesgo::where('nivel','Alto')->first()->dominiocalificado()->save($dominioCalificado);
        else
            CatNivelRiesgo::where('nivel','Muy alto')->first()->dominiocalificado()->save($dominioCalificado);
        
    }

    $categorias=Categoria::where('estado',true)->get();
    foreach($categorias as $categoria){
        $dimencionesCal=DominioCalificado::whereHas('dominio',function ($query) use($categoria) {
            $query->where('categoria_id',$categoria->id);
        })->where('cuestionario_resuelto_id',$cuestionario->id)->select('calificacion')->get();
        $calificacion=0;
        foreach($dimencionesCal as $cal)
            $calificacion=$calificacion+$cal->calificacion;

        $categoriaCalificado=$categoria->categoriacalificada()->save($cuestionario->categoriacalificada()->create(['calificacion' => 0]));
        
        if($calificacion<$categoriaCalificado->categoria->riesgometrica->metrica_nulo)
            CatNivelRiesgo::where('nivel','Nulo')->first()->categoriacalificada()->save($categoriaCalificado);
        elseif($calificacion<$categoriaCalificado->categoria->riesgometrica->metrica_bajo)
            CatNivelRiesgo::where('nivel','Bajo')->first()->categoriacalificada()->save($categoriaCalificado);
        elseif($calificacion<$categoriaCalificado->categoria->riesgometrica->metrica_medio)
            CatNivelRiesgo::where('nivel','Medio')->first()->categoriacalificada()->save($categoriaCalificado);
        elseif($calificacion<$categoriaCalificado->categoria->riesgometrica->metrica_alto)
            CatNivelRiesgo::where('nivel','Alto')->first()->categoriacalificada()->save($categoriaCalificado);
        else
            CatNivelRiesgo::where('nivel','Muy alto')->first()->categoriacalificada()->save($categoriaCalificado);
        
    }
    
    $cuestionario->update(['calificacion' => $calificacionTotal]);
    User::find( $faker->unique(true)->numberBetween(1, User::count()) )->cuestionarioresuelto()->save($cuestionario);
    Seccion::where('titulo','Finalizado')->first()->cuestionarioresuelto()->save($cuestionario);
    $periodo= Periodo::where(['periodo' => '2020-06-01'])->first();
    $periodo->cuestionarioresuelto()->save($cuestionario); 
    Cuestionario::find(1)->periodo()->save($periodo);
    //dd($cuestionario->periodo->cuestionario);
    if($cuestionario->calificacion<$cuestionario->periodo->cuestionario->riesgometrica->metrica_nulo)
            CatNivelRiesgo::where('nivel','Nulo')->first()->categoriacalificada()->save($cuestionario);
        elseif($cuestionario->calificacion<$cuestionario->periodo->cuestionario->riesgometrica->metrica_bajo)
            CatNivelRiesgo::where('nivel','Bajo')->first()->categoriacalificada()->save($cuestionario);
        elseif($cuestionario->calificacion<$cuestionario->periodo->cuestionario->riesgometrica->metrica_medio)
            CatNivelRiesgo::where('nivel','Medio')->first()->categoriacalificada()->save($cuestionario);
        elseif($cuestionario->calificacion<$cuestionario->periodo->cuestionario->riesgometrica->metrica_alto)
            CatNivelRiesgo::where('nivel','Alto')->first()->categoriacalificada()->save($cuestionario);
        else
            CatNivelRiesgo::where('nivel','Muy alto')->first()->categoriacalificada()->save($cuestionario);
        

    return ['calificacion' => rand(5, 15)];
});

