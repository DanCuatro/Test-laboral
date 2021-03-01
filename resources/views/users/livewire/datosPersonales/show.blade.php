<div class="container">
    @if($mensajeDatosFaltantes!=null)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 alert alert-danger">
                <p style="text-align: center;">{{$mensajeDatosFaltantes}}</p>
            </div>
        </div>
    </div>
    @endif
    <h4>Datos</h4>
    <div class="row form-group">
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-right">Nombre:</label>
                <label class="col-form-label"><b>{{$this->verificarDato($user->apellido_P)}} {{$this->verificarDato($user->apellido_M)}} {{$this->verificarDato($user->name)}}</b></label>
            </div>
            <div class="row">
                <label class="col-md-4 col-form-label text-md-right">Correo:</label>
                <label class="col-form-label"><b>{{$this->verificarDato($user->email)}}</b></label>
            </div>
            <div class="row">
                <label class="col-md-4 col-form-label text-md-right">Generos:</label>
                <label class="col-form-label"><b>{{$this->verificarDato($user->cat_genero)}}</b></label>
            </div>
            <div class="row">
                <label class="col-md-4 col-form-label text-md-right">Fecha de Nacimiento:</label>
                <label class="col-form-label"><b>{{$this->verificarDato($user->fecha_nacimiento)}}</b></label>
            </div>
            <div class="row">
                <label class="col-md-4 col-form-label text-md-right">Tipos de Contratacion:</label>
                <label class="col-form-label"><b>{{$this->verificarDato($user->cat_tipos_contratacion)}}</b></label>
            </div>
            
        </div>
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-4 col-form-label text-md-right">Campus:</label>
                <label class="col-form-label"><b>{{$this->verificarDato($user->campu)}}</b></label>
            </div>
            <div class="row">
                <label class="col-md-4 col-form-label text-md-right">Estados Civil:</label>
                <label class="col-form-label"><b>{{$this->verificarDato($user->cat_estados_civil)}}</b></label>
            </div>
            <div class="row">
                <label class="col-md-4 col-form-label text-md-right">Nivel de Estudio:</label>
                <label class="col-form-label"><b>{{$this->verificarDato($user->cat_nivel_estudio)}}</b></label>
            </div>
            <div class="row">
                <label class="col-md-4 col-form-label text-md-right">Tipos de Personal:</label>
                <label class="col-form-label"><b>{{$this->verificarDato($user->cat_tipos_personal)}}</b></label>
            </div>
            <div class="row">
                <label class="col-md-4 col-form-label text-md-right">Jornada de Trabajo:</label>
                <label class="col-form-label"><b>{{$this->verificarDato($user->cat_jornada_trabajo)}}</b></label>
            </div>
        </div>
    </div>
    <hr>
    <h4>Puestos</h4>
    <div class="row">
        @foreach($puestosTrabajando as $item)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title"><b>{{$item['puesto']}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$item['area']}}</b></h6>
                <p class="card-text">{{$item['tiempo']}}</p>
                </div>
            </div>
            <div class="col-1">

            </div>
        @endforeach
    </div>
</div>
