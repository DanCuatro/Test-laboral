<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(config('app.name', 'Laravel')); ?></title>
        <style>
            /*asdasd*/
            @page  {
                margin: 1cm 0cm;
            }
            body {
                margin-top: 2cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
                line-height: 1.5;
            }

            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;

                /** Estilos extra personales **/
                background-color: #ffffff;
                color: rgb(0, 0, 0);
                text-align: center;
                line-height: 1.5cm;
            }

            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;

                /** Estilos extra personales **/
                background-color: #ffffff;
                color: white;
                text-align: center;
                line-height: 1.5cm;
            }
            /* LOAD GOOGLE FONT */

            @font-face {
                font-family: 'Oxygen';
                font-style: normal;
                font-weight: 400;
                src: local('Oxygen'), local('Oxygen-Regular'), url(https://fonts.gstatic.com/s/oxygen/v5/IIPDrwV5KNJo5-LaFlLy2fesZW2xOQ-xsNqO47m55DA.woff2) format('woff2');
                unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
            }

            /* latin */
            @font-face {
                font-family: 'Oxygen';
                font-style: normal;
                font-weight: 400;
                src: local('Oxygen'), local('Oxygen-Regular'), url(https://fonts.gstatic.com/s/oxygen/v5/78wGxsHfFBzG7bRkpfRnCQ.woff2) format('woff2');
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
            }

            * {
                font-family :"Oxygen" !important;
            }

            .order-detail {
                font-weight: bolder;
            }

            .name {
                text-transform: capitalize;
            }

            .product, .product-price {
                color: #35aa45;
            }
            /*Tabla*/

            #customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            
            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
                FONT-SIZE: 10; COLOR: #000000; 
                FONT-FAMILY: Arial; 
                TEXT-DECORATION: none ; 
                TEXT-ALIGN:center;
            }
            
            #customers tr:nth-child(even){background-color: #f2f2f2;}
            
            #customers tr:hover {background-color: #ddd;}
            
            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #3d3d3d;
                color: white;
                
            }
            .TextoInicio {
                FONT-SIZE: 12; COLOR: #000000; 
                FONT-FAMILY: Arial; 
                TEXT-DECORATION: none ; 
                TEXT-ALIGN:justify;
            }
            p,li,ul {
                FONT-SIZE: 12; COLOR: #000000; 
                FONT-FAMILY: Arial; 
                TEXT-DECORATION: none ; 
                TEXT-ALIGN:justify;
            }
            .TextoTabla {
                FONT-SIZE: 10; COLOR: #000000; 
                FONT-FAMILY: Arial; 
                TEXT-DECORATION: none ; 
                TEXT-ALIGN:center;
            }
            th,td {
                
                border: 1px solid #ddd;
                FONT-SIZE: 10; COLOR: #000000; 
                FONT-FAMILY: Arial;
                TEXT-ALIGN:center;
            }
            hr{
                page-break-after: always;
                border: none;
                margin: 0;
                padding: 0;
            }
        </style>
    </head>  
    <body>
        <br><br><br><br><br><br><br><br><br>
        <h1 style="text-align: center;">NOM-035 Periodo</h1>
        <h2 style="text-align: center">Resultados de test laboral individual</h2>
        <h2 style="text-align: center">Instituto tecnológico superior de Xalapa </h2>

        <hr>
        
        <h1 style="text-align: center;">Datos Personales</h1>
        <h2><?php echo e($cuestionario_resuelto->datosPersonales->userPuesto->user->apellido_P); ?> <?php echo e($cuestionario_resuelto->datosPersonales->userPuesto->user->apellido_M); ?> <?php echo e($cuestionario_resuelto->datosPersonales->userPuesto->user->name); ?></h2>
        <h3><?php echo e($cuestionario_resuelto->datosPersonales->userPuesto->puesto->name); ?> en <?php echo e($cuestionario_resuelto->datosPersonales->userPuesto->puesto->area->name); ?></h3>
        <ol>
            <li>Generos: <b><?php echo e($cuestionario_resuelto->datosPersonales->cat_genero->name); ?></b></li>
            <li>Fecha de Nacimiento: <b><?php echo e($cuestionario_resuelto->datosPersonales->userPuesto->user->fecha_nacimiento); ?></b></li>
            <li>Tipos de Contratacion: <b><?php echo e($cuestionario_resuelto->datosPersonales->cat_tipos_contratacion->name); ?></b></li>
            <li>Campus: <b><?php echo e($cuestionario_resuelto->datosPersonales->campu->name); ?></b></li>
            <li>Estados Civil: <b><?php echo e($cuestionario_resuelto->datosPersonales->cat_estados_civil->name); ?></b></li>
            <li>Nivel de Estudio: <b><?php echo e($cuestionario_resuelto->datosPersonales->cat_nivel_estudio->name); ?></b></li>
            <li>Tipos de Personal: <b><?php echo e($cuestionario_resuelto->datosPersonales->cat_tipos_personal->name); ?></b></li>
            <li>Jornada de Trabajo: <b><?php echo e($cuestionario_resuelto->datosPersonales->cat_jornada_trabajo->name); ?></b></li>
        </ol>
        <p>La siguiente tabla muestra los niveles de riesgo representado por colores con los que se clasificaran los resultados de esta encuentra, junto a las acciones que se deben de tomar en caso de que se identifique el nivel de riesgo.  </p>
        <table id="customers">
                <tr>
                    <th>Nivel</th>
                    <th>Acción</th>
                </tr>
            <?php $__currentLoopData = $catNivelRiesgo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="background-color:rgb(<?php echo e($item->r); ?>,<?php echo e($item->g); ?>,<?php echo e($item->b); ?>)">
                        <p style="text-align: center FONT-SIZE: 10; COLOR: #000000; FONT-FAMILY: Arial; "><?php echo e($item->nivel); ?></p>
                    </td>
                    <td>
                        <p style="text-align: center FONT-SIZE: 10; COLOR: #000000; FONT-FAMILY: Arial;"><?php echo e($item->descripcion); ?></p>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <p>La siguiente tabla muestra los resultados obtenidos del cuestionario realizado por el empleado durante el periodo de <?php echo e($cuestionario_resuelto->periodo->periodo); ?> ,
            las franjas de color representan el nivel de riesgo que tiene cada categoría, 
            el nivel de riesgo que corresponde a cada color y la acción correspondiente a 
            ese nivel se describen en la tabla de niveles de riesgo </p>
        <hr>
        <table class="customers" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="background-color: #3d3d3d;" scope="col" colspan="3"><p class="TextoInicio" style="FONT-SIZE: 12; COLOR: #ffffff; TEXT-ALIGN:center; ">Categoría</p></th>
                    <th style="background-color: #3d3d3d;" scope="col" colspan="2"><p class="TextoInicio" style="FONT-SIZE: 12; COLOR: #ffffff; TEXT-ALIGN:center; ">Dominio</p></th>
                    <th style="background-color: #3d3d3d;" scope="col"><p class="TextoInicio" style="FONT-SIZE: 12; COLOR: #ffffff; TEXT-ALIGN:center; ">Dimensión</p></th>
                    <th style="background-color: #3d3d3d;" scope="col"><p class="TextoInicio" style="FONT-SIZE: 12; COLOR: #ffffff; TEXT-ALIGN:center; ">Ítem</p></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th width="1.8%" scope="row" rowspan="<?php echo e($arrayCaDoDiCuestionario[3]-12); ?>" style="background-color:rgb(<?php echo e($arrayCaDoDiCuestionario[1][0]); ?>,<?php echo e($arrayCaDoDiCuestionario[1][1]); ?>,<?php echo e($arrayCaDoDiCuestionario[1][2]); ?>)"></th>
                    <?php for($i=0;$i<count($arrayCaDoDiCuestionario[2])-3;$i++): ?>
                        <?php if($i!=0): ?><tr><?php endif; ?> 
                            <th title="Calificacion Total:<?php echo e($arrayCaDoDiCuestionario[2][$i][1]); ?>" width="1.5%" scope="row" rowspan="<?php echo e($arrayCaDoDiCuestionario[2][$i][4]); ?>" style="background-color:rgb(<?php echo e($arrayCaDoDiCuestionario[2][$i][2][0]); ?>,<?php echo e($arrayCaDoDiCuestionario[2][$i][2][1]); ?>,<?php echo e($arrayCaDoDiCuestionario[2][$i][2][2]); ?>,0.5)"></th>
                            <th title="Calificacion Total:<?php echo e($arrayCaDoDiCuestionario[2][$i][1]); ?>" scope="row" rowspan="<?php echo e($arrayCaDoDiCuestionario[2][$i][4]); ?>" ><p class="TextoTabla"><?php echo e($arrayCaDoDiCuestionario[2][$i][0]); ?></p></th>
                        <?php for($x=0;$x<count($arrayCaDoDiCuestionario[2][$i][3]);$x++): ?>
                            <?php if($x!=0): ?><tr><?php endif; ?>
                                <th width="1.5%" scope="row" rowspan="<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][4]); ?>" style="background-color:rgb(<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][2][0]); ?>,<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][2][1]); ?>,<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][2][2]); ?>,0.5)"></th>
                                <th scope="row" rowspan="<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][4]); ?>"><p class="TextoTabla"><?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][0]); ?></p></th>
                            <?php for($y=0;$y<count($arrayCaDoDiCuestionario[2][$i][3][$x][3]);$y++): ?>
                                <?php if($y!=0): ?><tr><?php endif; ?>
                                <th scope="row"><p class="TextoTabla"><?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][3][$y][0]); ?></p></th>
                                <td><p class="TextoTabla"><?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][3][$y][1]); ?></p></td>
                                </tr>
                            <?php endfor; ?>
                        <?php endfor; ?>
                    <?php endfor; ?>
                
            </tbody>
        </table>
        <hr>
        <table class="customers" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="background-color: #3d3d3d;" scope="col" colspan="3"><p class="TextoInicio" style="FONT-SIZE: 12; COLOR: #ffffff; TEXT-ALIGN:center; ">Categoría</p></th>
                    <th style="background-color: #3d3d3d;" scope="col" colspan="2"><p class="TextoInicio" style="FONT-SIZE: 12; COLOR: #ffffff; TEXT-ALIGN:center; ">Dominio</p></th>
                    <th style="background-color: #3d3d3d;" scope="col"><p class="TextoInicio" style="FONT-SIZE: 12; COLOR: #ffffff; TEXT-ALIGN:center; ">Dimensión</p></th>
                    <th style="background-color: #3d3d3d;" scope="col"><p class="TextoInicio" style="FONT-SIZE: 12; COLOR: #ffffff; TEXT-ALIGN:center; ">Ítem</p></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th width="1.8%" scope="row" rowspan="<?php echo e($arrayCaDoDiCuestionario[3]-13); ?>" style="background-color:rgb(<?php echo e($arrayCaDoDiCuestionario[1][0]); ?>,<?php echo e($arrayCaDoDiCuestionario[1][1]); ?>,<?php echo e($arrayCaDoDiCuestionario[1][2]); ?>)"></th>
                    
                    <?php for($i=2;$i<count($arrayCaDoDiCuestionario[2]);$i++): ?>
                        <?php if($i!=2): ?><tr><?php endif; ?> 
                            <th title="Calificacion Total:<?php echo e($arrayCaDoDiCuestionario[2][$i][1]); ?>" width="1.5%" scope="row" rowspan="<?php echo e($arrayCaDoDiCuestionario[2][$i][4]); ?>" style="background-color:rgb(<?php echo e($arrayCaDoDiCuestionario[2][$i][2][0]); ?>,<?php echo e($arrayCaDoDiCuestionario[2][$i][2][1]); ?>,<?php echo e($arrayCaDoDiCuestionario[2][$i][2][2]); ?>,0.5)"></th>
                            <th title="Calificacion Total:<?php echo e($arrayCaDoDiCuestionario[2][$i][1]); ?>" scope="row" rowspan="<?php echo e($arrayCaDoDiCuestionario[2][$i][4]); ?>" ><p class="TextoTabla"><?php echo e($arrayCaDoDiCuestionario[2][$i][0]); ?></p></th>
                        <?php for($x=0;$x<count($arrayCaDoDiCuestionario[2][$i][3]);$x++): ?>
                            <?php if($x!=0): ?><tr><?php endif; ?>
                                <th title="Calificacion Total:<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][1]); ?>" width="1.5%" scope="row" rowspan="<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][4]); ?>" style="background-color:rgb(<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][2][0]); ?>,<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][2][1]); ?>,<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][2][2]); ?>,0.5)"></th>
                                <th title="Calificacion Total:<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][1]); ?>" scope="row" rowspan="<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][4]); ?>"><p class="TextoTabla"><?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][0]); ?></p></th>
                            <?php for($y=0;$y<count($arrayCaDoDiCuestionario[2][$i][3][$x][3]);$y++): ?>
                                <?php if($y!=0): ?><tr><?php endif; ?>
                                <th scope="row"><p class="TextoTabla"><?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][3][$y][0]); ?></p></th>
                                <td><p class="TextoTabla"><?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][3][$y][1]); ?></p></td>
                                </tr>
                            <?php endfor; ?>
                        <?php endfor; ?>
                    <?php endfor; ?>
                <tr>
                    <th colspan="6" scope="row" title="Calificacion Total:<?php echo e($arrayCaDoDiCuestionario[0]); ?>" style="background-color:rgb(<?php echo e($arrayCaDoDiCuestionario[1][0]); ?>,<?php echo e($arrayCaDoDiCuestionario[1][1]); ?>,<?php echo e($arrayCaDoDiCuestionario[1][2]); ?>,0.5)"><p class="TextoTabla">Calificacion Total:</p></th>
                    <th><p class="TextoTabla"><?php echo e($arrayCaDoDiCuestionario[0]); ?></p></th>
                </tr>
            </tbody>
        </table>
        <hr>
        <h1>Cuestionario resuelto</h1>
        <?php for($i=0;$i<count($arrayRespuestaCuestionario);$i++): ?>
            <p class="TextoInicio"><b>Sección <?php echo e($arrayRespuestaCuestionario[$i][0]); ?>:</b> <?php echo e($arrayRespuestaCuestionario[$i][1]); ?></p>
            
            <table id="customers">
                    <tr>
                        <th><b>NO.</b></th>
                        <th><b>Pregunta</b></th>
                        <th><b>Siempre Casi</b></th>
                        <th><b>siempre</b></td>
                        <th><b>Algunas veces</b></th>
                        <th><b>Casi nunca</b></th>
                        <th><b>Nunca</b></th>
                    </tr>
                <?php for($x=0;$x<count($arrayRespuestaCuestionario[$i][2]);$x++): ?> 
                    <tr>
                        <td><p class=""><?php echo e($arrayRespuestaCuestionario[$i][2][$x][0]); ?></p></td>
                        <td><p class=""><?php echo e($arrayRespuestaCuestionario[$i][2][$x][1]); ?></p></td>
                        <?php for($y=0;$y<5;$y++): ?>
                            <?php if($y==$arrayRespuestaCuestionario[$i][2][$x][2]): ?>
                                <td>O</td>
                            <?php else: ?>
                                <td></td>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
            </table>
        <?php endfor; ?>
        
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/users/livewire/navegador/descarga.blade.php ENDPATH**/ ?>