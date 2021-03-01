<?php

use Illuminate\Database\Seeder;
use App\Model\Cuestionario\RiesgoMetrica;
use App\Model\Cuestionario\Seccion;
use App\Model\Cuestionario\Cuestionario;
use App\Model\Cuestionario\CatNivelRiesgo;
use App\Model\Cuestionario\Periodo;

class CuestionarioFormato extends Seeder
{
    public function run()
    {
        //Cuestionario
        $riesgoCuestionario=RiesgoMetrica::create([
            'metrica_nulo'  =>50,
            'metrica_bajo'  =>75,
            'metrica_medio' =>99,
            'metrica_alto'  =>140
        ]);
        $Cuestionario=$riesgoCuestionario->cuestionario()->create([
            'nombre' => 'NOM-035', 'estado' => true
        ]);
        //Categoria
        $riesgoCategoria1=RiesgoMetrica::create([
            'metrica_nulo'  =>5,
            'metrica_bajo'  =>9,
            'metrica_medio' =>11,
            'metrica_alto'  =>14
        ]);
        $riesgoCategoria2=RiesgoMetrica::create([
            'metrica_nulo'  =>15,
            'metrica_bajo'  =>30,
            'metrica_medio' =>45,
            'metrica_alto'  =>60
        ]);
        $riesgoCategoria3=RiesgoMetrica::create([
            'metrica_nulo'  =>5,
            'metrica_bajo'  =>7,
            'metrica_medio' =>10,
            'metrica_alto'  =>13
        ]);
        $riesgoCategoria4=RiesgoMetrica::create([
            'metrica_nulo'  =>14,
            'metrica_bajo'  =>29,
            'metrica_medio' =>42,
            'metrica_alto'  =>58
        ]);
        $riesgoCategoria5=RiesgoMetrica::create([
            'metrica_nulo'  =>10,
            'metrica_bajo'  =>14,
            'metrica_medio' =>18,
            'metrica_alto'  =>23
        ]);
        $categoria1=$riesgoCategoria1->categoria()->create([
            'nombre' => 'Ambiente de trabajo', 
            'estado' => true
        ]);
        $categoria2=$riesgoCategoria2->categoria()->create([
            'nombre' => 'Factores propios de la actividad', 
            'estado' => true
        ]);
        $categoria3=$riesgoCategoria3->categoria()->create([
            'nombre' => 'Organización del tiempo de trabajo', 
            'estado' => true
        ]);
        $categoria4=$riesgoCategoria4->categoria()->create([
            'nombre' => 'Liderazgo y relaciones en el trabajo', 
            'estado' => true
        ]);
        $categoria5=$riesgoCategoria5->categoria()->create([
            'nombre' => 'Entorno organizacional', 
            'estado' => true
        ]);
        $Cuestionario->categoria()->save($categoria1);
        $Cuestionario->categoria()->save($categoria2);
        $Cuestionario->categoria()->save($categoria3);
        $Cuestionario->categoria()->save($categoria4);
        $Cuestionario->categoria()->save($categoria5);

        //Dominios
        $riesgoDominio11=RiesgoMetrica::create([
            'metrica_nulo'  =>5,
            'metrica_bajo'  =>9,
            'metrica_medio' =>11,
            'metrica_alto'  =>14
        ]);
        $riesgoDominio21=RiesgoMetrica::create([
            'metrica_nulo'  =>15,
            'metrica_bajo'  =>21,
            'metrica_medio' =>27,
            'metrica_alto'  =>37
        ]);
        $riesgoDominio22=RiesgoMetrica::create([
            'metrica_nulo'  =>11,
            'metrica_bajo'  =>16,
            'metrica_medio' =>21,
            'metrica_alto'  =>25
        ]);
        $riesgoDominio31=RiesgoMetrica::create([
            'metrica_nulo'  =>1,
            'metrica_bajo'  =>2,
            'metrica_medio' =>4,
            'metrica_alto'  =>6
        ]);
        $riesgoDominio32=RiesgoMetrica::create([
            'metrica_nulo'  =>4,
            'metrica_bajo'  =>6,
            'metrica_medio' =>8,
            'metrica_alto'  =>10
        ]);
        $riesgoDominio41=RiesgoMetrica::create([
            'metrica_nulo'  =>9,
            'metrica_bajo'  =>12,
            'metrica_medio' =>16,
            'metrica_alto'  =>20
        ]);
        $riesgoDominio42=RiesgoMetrica::create([
            'metrica_nulo'  =>10,
            'metrica_bajo'  =>13,
            'metrica_medio' =>17,
            'metrica_alto'  =>21
        ]);
        $riesgoDominio43=RiesgoMetrica::create([
            'metrica_nulo'  =>7,
            'metrica_bajo'  =>10,
            'metrica_medio' =>13,
            'metrica_alto'  =>16
        ]);
        $riesgoDominio51=RiesgoMetrica::create([
            'metrica_nulo'  =>6,
            'metrica_bajo'  =>10,
            'metrica_medio' =>14,
            'metrica_alto'  =>18
        ]);
        $riesgoDominio52=RiesgoMetrica::create([
            'metrica_nulo'  =>4,
            'metrica_bajo'  =>6,
            'metrica_medio' =>8,
            'metrica_alto'  =>10
        ]);
        $dominio11=$riesgoDominio11->dominio()->create([
            'nombre' => 'Condiciones en el ambiente de trabajo', 
            'estado' => true
        ]);
        $dominio21=$riesgoDominio21->dominio()->create([
            'nombre' => 'Carga de trabajo', 
            'estado' => true
        ]);
        $dominio22=$riesgoDominio22->dominio()->create([
            'nombre' => 'Falta de control sobre el trabajo', 
            'estado' => true
        ]);
        $dominio31=$riesgoDominio31->dominio()->create([
            'nombre' => 'Jornada de trabajo', 
            'estado' => true
        ]);
        $dominio32=$riesgoDominio32->dominio()->create([
            'nombre' => 'Interferencia en la relación trabajo-familia', 
            'estado' => true
        ]);
        $dominio41=$riesgoDominio41->dominio()->create([
            'nombre' => 'Liderazgo', 
            'estado' => true
        ]);
        $dominio42=$riesgoDominio42->dominio()->create([
            'nombre' => 'Relaciones en el trabajo', 
            'estado' => true
        ]);
        $dominio43=$riesgoDominio43->dominio()->create([
            'nombre' => 'Violencia', 
            'estado' => true
        ]);
        $dominio51=$riesgoDominio51->dominio()->create([
            'nombre' => 'Reconocimiento del desempeño', 
            'estado' => true
        ]);
        $dominio52=$riesgoDominio52->dominio()->create([
            'nombre' => 'Insuficiente sentido de pertenencia e, inestabilidad', 
            'estado' => true
        ]);

    
        $dimencion111=$dominio11->dimension()->create(['nombre' => 'Condiciones peligrosas e inseguras', 'estado' => true]);//1
        $dimencion112=$dominio11->dimension()->create(['nombre' => 'Condiciones deficientes e insalubres', 'estado' => true]);//2
        $dimencion113=$dominio11->dimension()->create(['nombre' => 'Trabajos peligrosos', 'estado' => true]);//3
        
        $dimencion211=$dominio21->dimension()->create(['nombre' => 'Cargas cuantitativas', 'estado' => true]);//4
        $dimencion212=$dominio21->dimension()->create(['nombre' => 'Ritmos de trabajo acelerado', 'estado' => true]);//5
        $dimencion213=$dominio21->dimension()->create(['nombre' => 'Carga mental', 'estado' => true]);//6
        $dimencion214=$dominio21->dimension()->create(['nombre' => 'Cargas psicológicas emocionales', 'estado' => true]);//7
        $dimencion215=$dominio21->dimension()->create(['nombre' => 'Cargas de alta responsabilidad ', 'estado' => true]);//8
        $dimencion216=$dominio21->dimension()->create(['nombre' => 'Cargas contradictorias o inconsistentes', 'estado' => true]);//9

        $dimencion221=$dominio22->dimension()->create(['nombre' => 'Falta de control y autonomía sobre el trabajo', 'estado' => true]);//10
        $dimencion222=$dominio22->dimension()->create(['nombre' => 'Limitada o nula posibilidad de desarrollo', 'estado' => true]);//11
        $dimencion223=$dominio22->dimension()->create(['nombre' => 'Insuficiente participación y manejo del cambio', 'estado' => true]);//12
        $dimencion224=$dominio22->dimension()->create(['nombre' => 'Limitada o inexistente capacitación', 'estado' => true]);//13

        $dimencion311=$dominio31->dimension()->create(['nombre' => 'Jornadas de trabajo extensas', 'estado' => true]);//14

        $dimencion321=$dominio32->dimension()->create(['nombre' => 'Influencia del trabajo fuera del centro laboral', 'estado' => true]);//15
        $dimencion322=$dominio32->dimension()->create(['nombre' => 'Influencia de las responsabilidades familiares', 'estado' => true]);//16

        $dimencion411=$dominio41->dimension()->create(['nombre' => 'Escaza claridad de funciones', 'estado' => true]);//17
        $dimencion412=$dominio41->dimension()->create(['nombre' => 'Características del liderazgo', 'estado' => true]);//18

        $dimencion421=$dominio42->dimension()->create(['nombre' => 'Relaciones sociales en el trabajo', 'estado' => true]);//19
        $dimencion422=$dominio42->dimension()->create(['nombre' => 'Deficiente relación con los colaboradores que supervisa', 'estado' => true]);//20
        
        $dimencion431=$dominio43->dimension()->create(['nombre' => 'Violencia laboral', 'estado' => true]);//21

        $dimencion511=$dominio51->dimension()->create(['nombre' => 'Escasa o nula retroalimentación del desempeño', 'estado' => true]);//22
        $dimencion512=$dominio51->dimension()->create(['nombre' => 'Escaso o nulo reconocimiento y compensación', 'estado' => true]);//23

        $dimencion521=$dominio52->dimension()->create(['nombre' => 'Limitado sentido de pertenencia', 'estado' => true]);//24
        $dimencion522=$dominio52->dimension()->create(['nombre' => 'Inestabilidad laboral ', 'estado' => true]);//25
        
        $categoria1->dominio()->save($dominio11);
        
        $categoria2->dominio()->save($dominio21);
        $categoria2->dominio()->save($dominio22);
        
        $categoria3->dominio()->save($dominio31);
        $categoria3->dominio()->save($dominio32);
        
        $categoria4->dominio()->save($dominio41);
        $categoria4->dominio()->save($dominio42);
        $categoria4->dominio()->save($dominio43);
        
        $categoria5->dominio()->save($dominio51);
        $categoria5->dominio()->save($dominio52);

        //secciones
        $seccion1=Seccion::create(['titulo' => 'Para responder las preguntas siguientes considere las condiciones ambientales de su centro de trabajo.','estado' => true]);
        $seccion2=Seccion::create(['titulo' => 'Para responder a las preguntas siguientes piense en la cantidad y ritmo de trabajo que tiene.','estado' => true]);
        $seccion3=Seccion::create(['titulo' => 'Las preguntas siguientes están relacionadas con el esfuerzo mental que le exige su trabajo.','estado' => true]);
        $seccion4=Seccion::create(['titulo' => 'Las preguntas siguientes están relacionadas con las actividades que realiza en su trabajo y las responsabilidades que tiene.','estado' => true]);
        $seccion5=Seccion::create(['titulo' => 'Las preguntas siguientes están relacionadas con su jornada de trabajo.','estado' => true]);
        $seccion6=Seccion::create(['titulo' => 'Las preguntas siguientes están relacionadas con las decisiones que puede tomar en su trabajo.','estado' => true]);
        $seccion7=Seccion::create(['titulo' => 'Las preguntas siguientes están relacionadas con cualquier tipo de cambio que ocurra en su trabajo (considere los últimos cambios realizados).','estado' => true]);
        $seccion8=Seccion::create(['titulo' => 'Las preguntas siguientes están relacionadas con la capacitación e información que se le proporciona sobre su trabajo.','estado' => true]);
        $seccion9=Seccion::create(['titulo' => 'Las preguntas siguientes están relacionadas con el o los jefes con quien tiene contacto.','estado' => true]);
        $seccion10=Seccion::create(['titulo' => 'Las preguntas siguientes se refieren a las relaciones con sus compañeros.','estado' => true]);
        $seccion11=Seccion::create(['titulo' => 'Las preguntas siguientes están relacionadas con la información que recibe sobre su rendimiento en el trabajo, el reconocimiento, el sentido de pertenencia y la estabilidad que le ofrece su trabajo.','estado' => true]);
        $seccion12=Seccion::create(['titulo' => 'Las preguntas siguientes están relacionadas con actos de violencia laboral (malos tratos, acoso, hostigamiento, acoso psicológico).','estado' => true]);
        $seccion13=Seccion::create(['titulo' => 'Las preguntas siguientes están relacionadas con la atención a clientes y usuarios.','restriccion' => 'En mi trabajo debo brindar servicio a clientes o usuarios','estado' => true]);
        $seccion14=Seccion::create(['titulo' => 'Las preguntas siguientes están relacionadas con las actitudes de las personas que supervisa.','restriccion' => 'Soy jefe de otros trabajadores','estado' => true]);
        Seccion::create(['titulo' => 'Finalizado','estado' => false]);
        
        //Preguntas
        $pregunta1=$seccion1->pregunta()->create(['pregunta' => 'El espacio donde trabajo me permite realizar mis actividades de manera segura e higiénica','escala'=> true,'estado'=> true ]);
        $pregunta2=$seccion1->pregunta()->create(['pregunta' => 'Mi trabajo me exige hacer mucho esfuerzo físico','escala'=> false,'estado'=> true ]);
        $pregunta3=$seccion1->pregunta()->create(['pregunta' => 'Me preocupa sufrir un accidente en mi trabajo','escala'=> false,'estado'=> true ]);
        $pregunta4=$seccion1->pregunta()->create(['pregunta' => 'Considero que en mi trabajo se aplican las normas de seguridad y salud en el trabajo','escala'=> true,'estado'=> true ]);
        $pregunta5=$seccion1->pregunta()->create(['pregunta' => 'Considero que las actividades que realizo son peligrosas','escala'=> false,'estado'=> true ]);

        $pregunta6=$seccion2->pregunta()->create(['pregunta'=>'Por la cantidad de trabajo que tengo debo quedarme tiempo adicional a mi turno','escala'=>false,'estado'=>true]);
        $pregunta7=$seccion2->pregunta()->create(['pregunta'=>'Por la cantidad de trabajo que tengo debo trabajar sin parar','escala'=>false,'estado'=>true]);
        $pregunta8=$seccion2->pregunta()->create(['pregunta'=>'Considero que es necesario mantener un ritmo de trabajo acelerado','escala'=>false,'estado'=>true]);
        
        $pregunta9=$seccion3->pregunta()->create(['pregunta'=>'Mi trabajo exige que esté muy concentrado','escala'=>false,'estado'=>true]);
        $pregunta10=$seccion3->pregunta()->create(['pregunta'=>'Mi trabajo requiere que memorice mucha información','escala'=>false,'estado'=>true]);
        $pregunta11=$seccion3->pregunta()->create(['pregunta'=>'En mi trabajo tengo que tomar decisiones difíciles muy rápido','escala'=>false,'estado'=>true]);
        $pregunta12=$seccion3->pregunta()->create(['pregunta'=>'Mi trabajo exige que atienda varios asuntos al mismo tiempo','escala'=>false,'estado'=>true]);

        $pregunta13=$seccion4->pregunta()->create(['pregunta'=>'En mi trabajo soy responsable de cosas de mucho valor','escala'=>false,'estado'=>true]);
        $pregunta14=$seccion4->pregunta()->create(['pregunta'=>'Respondo ante mi jefe por los resultados de toda mi área de trabajo','escala'=>false,'estado'=>true]);
        $pregunta15=$seccion4->pregunta()->create(['pregunta'=>'En el trabajo me dan órdenes contradictorias','escala'=>false,'estado'=>true]);
        $pregunta16=$seccion4->pregunta()->create(['pregunta'=>'Considero que en mi trabajo me piden hacer cosas innecesarias','escala'=>false,'estado'=>true]);
        
        $pregunta17=$seccion5->pregunta()->create(['pregunta'=>'Trabajo horas extras más de tres veces a la semana','escala'=>false,'estado'=>true]);
        $pregunta18=$seccion5->pregunta()->create(['pregunta'=>'Mi trabajo me exige laborar en días de descanso, festivos o fines de semana','escala'=>false,'estado'=>true]);
        $pregunta19=$seccion5->pregunta()->create(['pregunta'=>'Considero que el tiempo en el trabajo es mucho y perjudica mis actividades familiares o personales','escala'=>false,'estado'=>true]);
        $pregunta20=$seccion5->pregunta()->create(['pregunta'=>'Debo atender asuntos de trabajo cuando estoy en casa','escala'=>false,'estado'=>true]);
        $pregunta21=$seccion5->pregunta()->create(['pregunta'=>'Pienso en las actividades familiares o personales cuando estoy en mi trabajo','escala'=>false,'estado'=>true]);
        $pregunta22=$seccion5->pregunta()->create(['pregunta'=>'Pienso que mis responsabilidades familiares afectan mi trabajo','escala'=>false,'estado'=>true]);
        
        $pregunta23=$seccion6->pregunta()->create(['pregunta'=>'Mi trabajo permite que desarrolle nuevas habilidades','escala'=>true,'estado'=>true]);
        $pregunta24=$seccion6->pregunta()->create(['pregunta'=>'En mi trabajo puedo aspirar a un mejor puesto','escala'=>true,'estado'=>true]);
        $pregunta25=$seccion6->pregunta()->create(['pregunta'=>'Durante mi jornada de trabajo puedo tomar pausas cuando las necesito','escala'=>true,'estado'=>true]);
        $pregunta26=$seccion6->pregunta()->create(['pregunta'=>'Puedo decidir cuánto trabajo realizo durante la jornada laboral','escala'=>true,'estado'=>true]);
        $pregunta27=$seccion6->pregunta()->create(['pregunta'=>'Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo','escala'=>true,'estado'=>true]);
        $pregunta28=$seccion6->pregunta()->create(['pregunta'=>'Puedo cambiar el orden de las actividades que realizo en mi trabajo','escala'=>true,'estado'=>true]);

        $pregunta29=$seccion7->pregunta()->create(['pregunta'=>'Los cambios que se presentan en mi trabajo dificultan mi labor','escala'=>false,'estado'=>true]);
        $pregunta30=$seccion7->pregunta()->create(['pregunta'=>'Cuando se presentan cambios en mi trabajo se tienen en cuenta mis ideas o aportaciones','escala'=>true,'estado'=>true]);

        $pregunta31=$seccion8->pregunta()->create(['pregunta'=>'Me informan con claridad cuáles son mis funciones','escala'=>true,'estado'=>true]);
        $pregunta32=$seccion8->pregunta()->create(['pregunta'=>'Me explican claramente los resultados que debo obtener en mi trabajo','escala'=>true,'estado'=>true]);
        $pregunta33=$seccion8->pregunta()->create(['pregunta'=>'Me explican claramente los objetivos de mi trabajo','escala'=>true,'estado'=>true]);
        $pregunta34=$seccion8->pregunta()->create(['pregunta'=>'Me informan con quién puedo resolver problemas o asuntos de trabajo','escala'=>true,'estado'=>true]);
        $pregunta35=$seccion8->pregunta()->create(['pregunta'=>'Me permiten asistir a capacitaciones relacionadas con mi trabajo','escala'=>true,'estado'=>true]);
        $pregunta36=$seccion8->pregunta()->create(['pregunta'=>'Recibo capacitación útil para hacer mi trabajo','escala'=>true,'estado'=>true]);
        
        $pregunta37=$seccion9->pregunta()->create(['pregunta'=>'Mi jefe ayuda a organizar mejor el trabajo','escala'=>true,'estado'=>true]);
        $pregunta38=$seccion9->pregunta()->create(['pregunta'=>'Mi jefe tiene en cuenta mis puntos de vista y opiniones','escala'=>true,'estado'=>true]);
        $pregunta39=$seccion9->pregunta()->create(['pregunta'=>'Mi jefe me comunica a tiempo la información relacionada con el trabajo','escala'=>true,'estado'=>true]);
        $pregunta40=$seccion9->pregunta()->create(['pregunta'=>'La orientación que me da mi jefe me ayuda a realizar mejor mi trabajo','escala'=>true,'estado'=>true]);
        $pregunta41=$seccion9->pregunta()->create(['pregunta'=>'Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo','escala'=>true,'estado'=>true]);

        $pregunta42=$seccion10->pregunta()->create(['pregunta'=>'Puedo confiar en mis compañeros de trabajo','escala'=>true,'estado'=>true]);
        $pregunta43=$seccion10->pregunta()->create(['pregunta'=>'Entre compañeros solucionamos los problemas de trabajo de forma respetuosa','escala'=>true,'estado'=>true]);
        $pregunta44=$seccion10->pregunta()->create(['pregunta'=>'En mi trabajo me hacen sentir parte del grupo','escala'=>true,'estado'=>true]);
        $pregunta45=$seccion10->pregunta()->create(['pregunta'=>'Cuando tenemos que realizar trabajo de equipo los compañeros colaboran','escala'=>true,'estado'=>true]);
        $pregunta46=$seccion10->pregunta()->create(['pregunta'=>'Mis compañeros de trabajo me ayudan cuando tengo dificultades','escala'=>true,'estado'=>true]);

        $pregunta47=$seccion11->pregunta()->create(['pregunta'=>'Me informan sobre lo que hago bien en mi trabajo','escala'=>true,'estado'=>true]);
        $pregunta48=$seccion11->pregunta()->create(['pregunta'=>'La forma como evalúan mi trabajo en mi centro de trabajo me ayuda a mejorar mi desempeño','escala'=>true,'estado'=>true]);
        $pregunta49=$seccion11->pregunta()->create(['pregunta'=>'En mi centro de trabajo me pagan a tiempo mi salario','escala'=>true,'estado'=>true]);
        $pregunta50=$seccion11->pregunta()->create(['pregunta'=>'El pago que recibo es el que merezco por el trabajo que realizo','escala'=>true,'estado'=>true]);
        $pregunta51=$seccion11->pregunta()->create(['pregunta'=>'Si obtengo los resultados esperados en mi trabajo merecompensan o reconocen','escala'=>true,'estado'=>true]);
        $pregunta52=$seccion11->pregunta()->create(['pregunta'=>'Las personas que hacen bien el trabajo pueden crecer laboralmente','escala'=>true,'estado'=>true]);
        $pregunta53=$seccion11->pregunta()->create(['pregunta'=>'Considero que mi trabajo es estable','escala'=>true,'estado'=>true]);
        $pregunta54=$seccion11->pregunta()->create(['pregunta'=>'En mi trabajo existe continua rotación de personal','escala'=>false,'estado'=>true]);
        $pregunta55=$seccion11->pregunta()->create(['pregunta'=>'Siento orgullo de laborar en este centro de trabajo','escala'=>true,'estado'=>true]);
        $pregunta56=$seccion11->pregunta()->create(['pregunta'=>'Me siento comprometido con mi trabajo','escala'=>true,'estado'=>true]);

        $pregunta57=$seccion12->pregunta()->create(['pregunta'=>'En mi trabajo puedo expresarme libremente sin interrupciones','escala'=>true,'estado'=>true]);
        $pregunta58=$seccion12->pregunta()->create(['pregunta'=>'Recibo críticas constantes a mi persona y/o trabajo','escala'=>false,'estado'=>true]);
        $pregunta59=$seccion12->pregunta()->create(['pregunta'=>'Recibo burlas, calumnias, difamaciones, humillaciones o ridiculizaciones','escala'=>false,'estado'=>true]);
        $pregunta60=$seccion12->pregunta()->create(['pregunta'=>'Se ignora mi presencia o se me excluye de las reuniones de trabajo y en la toma de decisiones','escala'=>false,'estado'=>true]);
        $pregunta61=$seccion12->pregunta()->create(['pregunta'=>'Se manipulan las situaciones de trabajo para hacerme parecer un mal trabajador','escala'=>false,'estado'=>true]);
        $pregunta62=$seccion12->pregunta()->create(['pregunta'=>'Se ignoran mis éxitos laborales y se atribuyen a otros trabajadores','escala'=>false,'estado'=>true]);
        $pregunta63=$seccion12->pregunta()->create(['pregunta'=>'Me bloquean o impiden las oportunidades que tengo para obtener ascenso o mejora en mi trabajo','escala'=>false,'estado'=>true]);
        $pregunta64=$seccion12->pregunta()->create(['pregunta'=>'He presenciado actos de violencia en mi centro de trabajo','escala'=>false,'estado'=>true]);
        
        $pregunta65=$seccion13->pregunta()->create(['pregunta'=>'Atiendo clientes o usuarios muy enojados','escala'=>false,'estado'=>true]);
        $pregunta66=$seccion13->pregunta()->create(['pregunta'=>'Mi trabajo me exige atender personas muy necesitadas de ayuda o enfermas','escala'=>false,'estado'=>true]);
        $pregunta67=$seccion13->pregunta()->create(['pregunta'=>'Para hacer mi trabajo debo demostrar sentimientos distintos a los míos','escala'=>false,'estado'=>true]);
        $pregunta68=$seccion13->pregunta()->create(['pregunta'=>'Mi trabajo me exige atender situaciones de violencia','escala'=>false,'estado'=>true]);

        $pregunta69=$seccion14->pregunta()->create(['pregunta'=>'Comunican tarde los asuntos de trabajo','escala'=>false,'estado'=>true]);
        $pregunta70=$seccion14->pregunta()->create(['pregunta'=>'Dificultan el logro de los resultados del trabajo','escala'=>false,'estado'=>true]);
        $pregunta71=$seccion14->pregunta()->create(['pregunta'=>'Cooperan poco cuando se necesita','escala'=>false,'estado'=>true]);
        $pregunta72=$seccion14->pregunta()->create(['pregunta'=>'Ignoran las sugerencias para mejorar su trabajo','escala'=>false,'estado'=>true]);
        
        //Relacion preguntas dimencion
        $dimencion111->pregunta()->save($pregunta1); //1, 3
        $dimencion111->pregunta()->save($pregunta3); //1, 3
        
        $dimencion112->pregunta()->save($pregunta2); //2, 4
        $dimencion112->pregunta()->save($pregunta4); //2, 4
        
        $dimencion113->pregunta()->save($pregunta5); //5

        $dimencion211->pregunta()->save($pregunta6); //6, 12
        $dimencion211->pregunta()->save($pregunta12); //6, 12
        
        $dimencion212->pregunta()->save($pregunta7); //7, 8
        $dimencion212->pregunta()->save($pregunta8); //7, 8
        
        $dimencion213->pregunta()->save($pregunta9); //9, 10. 11
        $dimencion213->pregunta()->save($pregunta10); //9, 10. 11
        $dimencion213->pregunta()->save($pregunta11); //9, 10. 11
        
        $dimencion214->pregunta()->save($pregunta65); //65, 66, 67, 68
        $dimencion214->pregunta()->save($pregunta66); //65, 66, 67, 68
        $dimencion214->pregunta()->save($pregunta67); //65, 66, 67, 68
        $dimencion214->pregunta()->save($pregunta68); //65, 66, 67, 68
        
        $dimencion215->pregunta()->save($pregunta13); //13, 14
        $dimencion215->pregunta()->save($pregunta14); //13, 14

        $dimencion216->pregunta()->save($pregunta15); //15, 16
        $dimencion216->pregunta()->save($pregunta16); //15, 16

        $dimencion221->pregunta()->save($pregunta25); //25, 26, 27, 28
        $dimencion221->pregunta()->save($pregunta26); //25, 26, 27, 28
        $dimencion221->pregunta()->save($pregunta27); //25, 26, 27, 28
        $dimencion221->pregunta()->save($pregunta28); //25, 26, 27, 28
        
        $dimencion222->pregunta()->save($pregunta23); //23, 24
        $dimencion222->pregunta()->save($pregunta24); //23, 24

        $dimencion223->pregunta()->save($pregunta29); //29, 30
        $dimencion223->pregunta()->save($pregunta30); //29, 30

        $dimencion224->pregunta()->save($pregunta35); //35, 36 
        $dimencion224->pregunta()->save($pregunta36); //35, 36 

        $dimencion311->pregunta()->save($pregunta17); //17, 18
        $dimencion311->pregunta()->save($pregunta18); //17, 18

        $dimencion321->pregunta()->save($pregunta19); //19, 20
        $dimencion321->pregunta()->save($pregunta20); //19, 20

        $dimencion322->pregunta()->save($pregunta21); //21, 22
        $dimencion322->pregunta()->save($pregunta22); //21, 22
        
        $dimencion411->pregunta()->save($pregunta31); //31, 32, 33, 34
        $dimencion411->pregunta()->save($pregunta32); //31, 32, 33, 34
        $dimencion411->pregunta()->save($pregunta33); //31, 32, 33, 34
        $dimencion411->pregunta()->save($pregunta34); //31, 32, 33, 34

        $dimencion412->pregunta()->save($pregunta37); //37, 38, 39,40, 41
        $dimencion412->pregunta()->save($pregunta38); //37, 38, 39,40, 41
        $dimencion412->pregunta()->save($pregunta39); //37, 38, 39,40, 41
        $dimencion412->pregunta()->save($pregunta40,); //37, 38, 39,40, 41
        $dimencion412->pregunta()->save($pregunta41); //37, 38, 39,40, 41
        
        $dimencion421->pregunta()->save($pregunta42); //42, 43, 44,45, 46
        $dimencion421->pregunta()->save($pregunta43); //42, 43, 44,45, 46
        $dimencion421->pregunta()->save($pregunta44); //42, 43, 44,45, 46
        $dimencion421->pregunta()->save($pregunta45); //42, 43, 44,45, 46
        $dimencion421->pregunta()->save($pregunta46); //42, 43, 44,45, 46
        
        $dimencion422->pregunta()->save($pregunta69); //69, 70, 71, 72
        $dimencion422->pregunta()->save($pregunta70); //69, 70, 71, 72
        $dimencion422->pregunta()->save($pregunta71); //69, 70, 71, 72
        $dimencion422->pregunta()->save($pregunta72); //69, 70, 71, 72
        
        $dimencion431->pregunta()->save($pregunta57); //57, 58, 59,60,61,62,63, 64
        $dimencion431->pregunta()->save($pregunta58); //57, 58, 59,60,61,62,63, 64
        $dimencion431->pregunta()->save($pregunta59); //57, 58, 59,60,61,62,63, 64
        $dimencion431->pregunta()->save($pregunta60); //57, 58, 59,60,61,62,63, 64
        $dimencion431->pregunta()->save($pregunta61); //57, 58, 59,60,61,62,63, 64
        $dimencion431->pregunta()->save($pregunta62); //57, 58, 59,60,61,62,63, 64
        $dimencion431->pregunta()->save($pregunta63); //57, 58, 59,60,61,62,63, 64
        $dimencion431->pregunta()->save($pregunta64); //57, 58, 59,60,61,62,63, 64
        
        $dimencion511->pregunta()->save($pregunta47); //47, 48
        $dimencion511->pregunta()->save($pregunta48); //47, 48

        $dimencion512->pregunta()->save($pregunta49); //49, 50, 51, 52
        $dimencion512->pregunta()->save($pregunta50); //49, 50, 51, 52
        $dimencion512->pregunta()->save($pregunta51); //49, 50, 51, 52
        $dimencion512->pregunta()->save($pregunta52); //49, 50, 51, 52

        $dimencion521->pregunta()->save($pregunta55); //55, 56
        $dimencion521->pregunta()->save($pregunta56); //55, 56

        $dimencion522->pregunta()->save($pregunta53); //53, 54
        $dimencion522->pregunta()->save($pregunta54); //53, 54

        CatNivelRiesgo::create([
            'nivel' => 'Nulo',
            'descripcion' => 'El riesgo resulta despreciable por lo que no se requiere medidas
            adicionales.',
            'r' => '54',
            'g' => '162',
            'b' => '235',
        ]);
        CatNivelRiesgo::create([
            'nivel' => 'Bajo',
            'descripcion' => 'Es necesario una mayor difusión de la política de prevención de riesgos
            psicosociales y programas para: la prevención de los factores de riesgo
            psicosocial, la promoción de un entorno organizacional favorable y la
            prevención de la violencia laboral',
            'r' => '80',
            'g' => '200',
            'b' => '90',
        ]);
        CatNivelRiesgo::create([
            'nivel' => 'Medio',
            'descripcion' => 'Se requiere revisar la política de prevención de riesgos psicosociales y
            programas para la prevención de los factores de riesgo psicosocial, la
            promoción de un entorno organizacional favorable y la prevención de la
            violencia laboral, así como reforzar su aplicación y difusión, mediante un
            Programa de intervención.
            ',
            'r' => '255',
            'g' => '227',
            'b' => '0',
        ]);
        CatNivelRiesgo::create([
            'nivel' => 'Alto',
            'descripcion' => 'Se requiere realizar un análisis de cada categoría y dominio, de manera que
            se puedan determinar las acciones de intervención apropiadas a través de
            un Programa de intervención, que podrá incluir una evaluación específica1
            y deberá incluir una campaña de sensibilización, revisar la política de
            prevención de riesgos psicosociales y programas para la prevención de los
            factores de riesgo psicosocial, la promoción de un entorno organizacional
            favorable y la prevención de la violencia laboral, así como reforzar su
            aplicación y difusión',
            'r' => '255',
            'g' => '159',
            'b' => '64',
        ]);
        CatNivelRiesgo::create([
            'nivel' => 'Muy alto',
            'descripcion' => 'Se requiere realizar el análisis de cada categoría y dominio para establecer
            las acciones de intervención apropiadas, mediante un Programa de
            intervención que deberá incluir evaluaciones específicas1, y contemplar
            campañas de sensibilización, revisar la política de prevención de riesgos
            psicosociales y programas para la prevención de los factores de riesgo
            psicosocial, la promoción de un entorno organizacional favorable y la
            prevención de la violencia laboral, así como reforzar su aplicación y
            difusión',
            'r' => '255',
            'g' => '99',
            'b' => '132',
        ]);
        //pruebas
        /*$riesgoDimension1=RiesgoMetrica::create([
            'metrica_nulo'  =>(1*4),
            'metrica_bajo'  =>(1*4),
            'metrica_medio' =>(1*4),
            'metrica_alto'  =>(1*4)
        ]);
        //dd($riesgoDimension1);
        $riesgoDimension1->dimension()->save($dimencion113);//3
        $riesgoDimension2=RiesgoMetrica::create([
            'metrica_nulo'  =>(2*4),
            'metrica_bajo'  =>(2*4),
            'metrica_medio' =>(2*4),
            'metrica_alto'  =>(2*4)
        ]);
        $riesgoDimension2->dimension()->save($dimencion111);//1
        $riesgoDimension2->dimension()->save($dimencion112);//2
        $riesgoDimension2->dimension()->save($dimencion211);//4
        $riesgoDimension2->dimension()->save($dimencion212);//5
        $riesgoDimension2->dimension()->save($dimencion215);//8
        $riesgoDimension2->dimension()->save($dimencion216);//9
        $riesgoDimension2->dimension()->save($dimencion222);//11
        $riesgoDimension2->dimension()->save($dimencion223);//12
        $riesgoDimension2->dimension()->save($dimencion224);//13
        $riesgoDimension2->dimension()->save($dimencion311);//14
        $riesgoDimension2->dimension()->save($dimencion321);//15
        $riesgoDimension2->dimension()->save($dimencion322);//16
        $riesgoDimension2->dimension()->save($dimencion511);//22
        $riesgoDimension2->dimension()->save($dimencion521);//24
        $riesgoDimension2->dimension()->save($dimencion522);//25
        $riesgoDimension3=RiesgoMetrica::create([
            'metrica_nulo'  =>(3*4),
            'metrica_bajo'  =>(3*4),
            'metrica_medio' =>(3*4),
            'metrica_alto'  =>(3*4)
        ]);
        $riesgoDimension3->dimension()->save($dimencion213);//6
        $riesgoDimension4=RiesgoMetrica::create([
            'metrica_nulo'  =>(4*4),
            'metrica_bajo'  =>(4*4),
            'metrica_medio' =>(4*4),
            'metrica_alto'  =>(4*4)
        ]);
        $riesgoDimension4->dimension()->save($dimencion214);//7
        $riesgoDimension4->dimension()->save($dimencion221);//10
        $riesgoDimension4->dimension()->save($dimencion411);//17
        $riesgoDimension4->dimension()->save($dimencion422);//20
        $riesgoDimension4->dimension()->save($dimencion512);//23
        $riesgoDimension5=RiesgoMetrica::create([
            'metrica_nulo'  =>(2*4),
            'metrica_bajo'  =>(2*4),
            'metrica_medio' =>(2*4),
            'metrica_alto'  =>(2*4)
        ]);
        $riesgoDimension5->dimension()->save($dimencion412);//18
        $riesgoDimension5->dimension()->save($dimencion421);//19
        $riesgoDimension8=RiesgoMetrica::create([
            'metrica_nulo'  =>(4*4),
            'metrica_bajo'  =>(4*4),
            'metrica_medio' =>(4*4),
            'metrica_alto'  =>(4*4)
        ]);
        $riesgoDimension8->dimension()->save($dimencion431);//21
        Periodo::create(['periodo' => '2020-07-01']);
        factory(App\Model\Cuestionario\CuestionarioResuelto::class,25)->make();*/
    }

}
