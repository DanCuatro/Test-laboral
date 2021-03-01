<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(config('app.name', 'Laravel')); ?></title>
        <style>
            /*asdasd*/
            @page  {
                margin: 2cm 2cm;
            }
            body {
                margin-top: 0cm;
                margin-left: 0cm;
                margin-right: 0cm;
                margin-bottom: 0cm;
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
        <h1 style="text-align: center;">NOM-035</h1>
        <h2 style="text-align: center">Resultados de test laboral Gráficos</h2>
        <h2 style="text-align: center">Instituto tecnológico superior de Xalapa </h2>

        <hr>
            <?php for($i=0;$i<count($graficasGuardadas);$i++): ?>
                <h1><?php echo e($graficasGuardadas[$i]["titulo"]); ?></h1>
                <p>Periodo: <b><?php echo e($graficasGuardadas[$i]["periodo"]); ?></b></p>
                <p>
                    Los cuestionario de esta grafica estan agrupados por: 
                    <b>Calificacion
                        <?php if($graficasGuardadas[$i]["agrupacion"]=="Cuestionario"): ?>Total
                        <?php elseif($graficasGuardadas[$i]["agrupacion"]=="Categori"): ?>por Categori (<?php echo e($graficasGuardadas[$i]["categoria"][$graficasGuardadas[$i]["subAgrupacion"]]['nombre']); ?>)
                        <?php elseif($graficasGuardadas[$i]["agrupacion"]=="Dominio"): ?>por Dominio (<?php echo e($graficasGuardadas[$i]["dominio"][$graficasGuardadas[$i]["subAgrupacion"]]['nombre']); ?>)
                        <?php endif; ?>
                    </b>
                </p>
                <?php if($graficasGuardadas[$i]['etiquetasLimitadores']!=null): ?>
                <p>
                    La población esta limitada por los siguientes datos personales: 
                    <b>
                        <?php for($x=0;$x<count($graficasGuardadas[$i]['etiquetasLimitadores']);$x++): ?>
                            <?php for($y=0;$y<count($graficasGuardadas[$i]['etiquetasLimitadores'][$x]['ids']);$y++): ?>
                                <?php echo e($graficasGuardadas[$i]['etiquetasLimitadores'][$x]['ids'][$y]['name']); ?> 
                            <?php endfor; ?>
                        <?php endfor; ?>
                    </b>
                </p>
                <?php endif; ?>
                <div style="width: 40%">
                    <canvas id="myChart<?php echo e($i); ?>" width="50" height="25"></canvas>
                </div>
                <hr>
            <?php endfor; ?>
    </body>
</html>
<script type="text/javascript" >
    window.addEventListener('load', PintarGraficas, false);

    function PintarGraficas(){
        var graficasGuardadas = <?php echo json_encode($graficasGuardadas); ?>;
        for (var i = 0; i < graficasGuardadas.length; i++) {
            console.log(graficasGuardadas[i]['datos']);
            console.log(i);
            CargarGrafica(graficasGuardadas[i]['datos'],"myChart"+i)
        }
    }

    function CargarGrafica(arrayDatos,myChart) {
        console.log(arrayDatos);
        var datos = {
            labels: ['Nulo','Bajo','Medio','Alto','Muy alto'],
            datasets:DesglosarDatos(arrayDatos)
        }

        var ctx = document.getElementById(myChart).getContext('2d');
        window.myChart = new Chart(ctx, {
        type: 'bar',
        data: datos,
        options: {scales: {yAxes: [{ticks: {beginAtZero: true}}]}}});
    }  
    function DesglosarDatos(arrayDatos){
        var datos = []
        for(i=0;i<arrayDatos.length;i++){
            datos[i] = {
            label: arrayDatos[i][0],
            data: arrayDatos[i][1],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(80, 200, 90, 0.2)',
                'rgba(255,227, 0, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(80, 200, 90, 1)',
                'rgba(255, 227, 0, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 1
            };
        }
        return datos
    } 

</script>
<?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/graficos/livewire/pdf.blade.php ENDPATH**/ ?>