<!DOCTYPE html>
<html>
<head>
    <title>Asignacion de Cuestioanrio</title>
    <style>
        
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h1>NOM:035 {{$periodo}}</h1>
        </div>
        <div class="card-body">
            <p>Se han asignado las fechas para la realización semestral de la <b>NOM:035</b></p>
            <p>la cual dará inicio este <b>{{$fechas['fechaInicio']}}</b> y finalizará el <b>{{$fechas['fechaLimite']}}</b> </p>
            <p>La plataforma destinada a este uso, permitirá resolver la Norma durante las fechas previamente mencionadas</p>
            <p><a href="{{route('home')}}">Acceso a la Plataforma de realización</a></p>
            <p><b style="color:#FF0000";>Importante:</b> Favor de <b>mantener al día sus datos personales</b> dentro de la plataforma puestos nos serán de utilidad para poder mantener un ambiente laboral favorable para todos dentro del instituto </p>
        </div>
    </div>
</body>
</html>