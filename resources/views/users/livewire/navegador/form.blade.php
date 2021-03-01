<div class="form-group">
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">
            Tipo de Contratación
        </label>

        <div class="col-md-6">
            <select wire:model="TiposContratacion" class="form-control">
                <option></option>
                @foreach ($catTiposContratacion as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('TiposContratacion') <span style="color: #d90000">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">
            Tipo de Personal
        </label>

        <div class="col-md-6">
            <select wire:model="TiposPersonal" class="form-control">
                <option></option>
                @foreach ($catTiposPersonal as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('TiposPersonal') <span style="color: #d90000">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">
            Jornada de Trabajo
        </label>

        <div class="col-md-6">
            <select wire:model="JornadaTrabajo" class="form-control">
                <option></option>
                @foreach ($catJornadaTrabajo as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('JornadaTrabajo') <span style="color: #d90000">{{ $message }}</span> @enderror
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">
            Nombre
        </label>

        <div class="col-md-6">
            <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">
            Apellido Paterno
        </label>

        <div class="col-md-6">
            <input wire:model="apPaterno" type="text" class="form-control  @error('apPaterno') is-invalid @enderror">
            @error('apPaterno')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right ">Apellido Materno</label>

        <div class="col-md-6">
            <input wire:model="apMaterno" type="text" name="apellidoMaterno" class="form-control @error('apMaterno') is-invalid @enderror">
            @error('apMaterno')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right ">
            Genero
        </label>
            
        <div class="col-md-6">
            <select wire:model="genereo" class="form-control @error('genereo') is-invalid @enderror">
                <option> </option>
                @foreach ($cat_genero as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('genereo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">
            Fecha de Nacimiento
        </label>

        <div class="col-md-6">
            <input wire:model="fechaNacimiento" type="date" class="form-control @error('fechaNacimiento') is-invalid @enderror">
            @error('fechaNacimiento')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">
            Estado Civil
        </label>

        <div class="col-md-6">
            <select wire:model="estadoCivil" class="form-control @error('estadoCivil') is-invalid @enderror">
                <option> </option>
                @foreach ($cat_estados_civil as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('estadoCivil')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">
            Nivel de Estudios
        </label>

        <div class="col-md-6">
            <select wire:model="nivelEstudio" class="form-control @error('nivelEstudio') is-invalid @enderror">
                <option> </option>
                @foreach ($cat_nivel_estudio as $item)
                <option  value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            
            @error('nivelEstudio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">
            Experiencia Laboral
        </label>

        <div class="col-md-6">
            <input wire:model="exp_laboral" type="date" class="form-control @error('exp_laboral') is-invalid @enderror">
            @error('exp_laboral')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button wire:click='update' type="submit" class="btn btn-sm btn-primary">
                Guardarar
            </button>
            <button wire:click='defaultView' type="submit" class="btn  btn-sm btn-danger">
                Cancelar
            </button>
        </div>
    </div>

    </div>
</div>