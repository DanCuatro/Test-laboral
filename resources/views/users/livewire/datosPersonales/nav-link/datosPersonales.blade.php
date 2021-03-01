<div class="row form-group">
    <div class="col-lg-6">
        <div class="row form-group">
            <label class="col-lg-4 col-form-label text-lg-right">Nombre:</label>
            <div class="col-lg-8">
                <input wire:model="name" class="form-control  @error('name') is-invalid @enderror">
                @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
        <div class="row form-group">
            <label class="col-lg-4 col-form-label text-lg-right">1° Apellido:</label>
            <div class="col-lg-8">
                <input wire:model="apellido_P" class="form-control  @error('apellido_P') is-invalid @enderror">
                @error('apellido_P')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
        <div class="row form-group">
            <label class="col-lg-4 col-form-label text-lg-right">2° Apellido:</label>
            <div class="col-lg-8">
                <input wire:model="apellido_M" class="form-control  @error('apellido_M') is-invalid @enderror">
                @error('apellido_M')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
        <div class="row form-group">
            <label class="col-lg-4 col-form-label text-lg-right">Generos:</label>
            <div class="col-lg-8">
                <select wire:model="cat_genero" class="form-control @error('cat_genero') is-invalid @enderror">
                    <option> </option>
                    @foreach ($catalogo_genero as $item) <option value="{{$item->id}}">{{$item->name}}</option> @endforeach
                </select>
                @error('cat_genero')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="row form-group">
            <label class="col-lg-4 col-form-label text-lg-right">Campus:</label>
            <div class="col-lg-8">
                <select wire:model="campu" class="form-control @error('campu') is-invalid @enderror">
                    <option> </option>
                    @foreach ($catalogo_campu as $item) <option value="{{$item->id}}">{{$item->name}}</option> @endforeach
                </select>
                @error('campu')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
        <div class="row form-group">
            <label class="col-lg-4 col-form-label text-lg-right">Estados Civil:</label>
            <div class="col-lg-8">
                <select wire:model="cat_estados_civil" class="form-control @error('cat_estados_civil') is-invalid @enderror">
                    <option> </option>
                    @foreach ($catalogo_estados_civil as $item) <option value="{{$item->id}}">{{$item->name}}</option> @endforeach
                </select>
                @error('cat_estados_civil')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
        <div class="row form-group">
            <label class="col-lg-4 col-form-label text-lg-right">Nivel de Estudio:</label>
            <div class="col-lg-8">
                <select wire:model="cat_nivel_estudio" class="form-control @error('cat_nivel_estudio') is-invalid @enderror">
                    <option> </option>
                    @foreach ($catalogo_nivel_estudio as $item) <option value="{{$item->id}}">{{$item->name}}</option> @endforeach
                </select>
                @error('cat_nivel_estudio')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
        <div class="row form-group">
            <label class="col-lg-4 col-form-label text-lg-right">Fecha de Nacimiento:</label>
            <div class="col-lg-8">
                <input wire:model="fecha_nacimiento" type="date" max="{{$maximaFechaNacimiento->format('Y-m-d')}}" class="form-control  @error('fecha_nacimiento') is-invalid @enderror">
                @error('fecha_nacimiento')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="justify-content-center offset-lg-6 col-lg-6 col-sm-12">
        <div class="offset-lg-4 col-lg-9">
            <button wire:click='updateDatos' class="form-control btn btn-sm btn-primary">Guardar</button>
        </div>
    </div>
    <hr>
    <h3>Nota:</h3> Los datos <b>Tipos de Contratacion, Tipos de Personal, Jornada de Trabajo</b> son llenados por el Supervisor de su Area
</div>