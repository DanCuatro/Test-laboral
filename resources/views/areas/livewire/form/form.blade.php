<div class="">
    <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">
            <b>Nombre</b>
        </label>
        <div class="col-md-5">
            <input wire:model="name" type="text" class="form-control  @error('name') is-invalid @enderror">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">
            <b>Puesto</b>
        </label>
        <div class="col-md-5">
            <input wire:model='nuevoPuesto' type="text" class="form-control  @error('nuevoPuesto') is-invalid @enderror">
            @error('nuevoPuesto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        @include("areas.livewire.form.$viewPuesto")
    </div>
    
    @if($puestosArreglo != null)
    <hr>
    <div class="row offset-md-1">
        <ol>
        @foreach($puestosArreglo as $puesto)
            <div class="row">
                <div class="col-md-7">
                <li >{{$puesto[0]}}</li> 
                </div>
                <div class="col-md-1">
                    <button wire:click="editarPuesto('{{$puesto[0]}}','{{$puesto[1]}}')" class="btn"><img width="20px" height="20px" src= '/images/edit.svg'></button>
                </div>
                <div class=" offset-md-1 col-md-1">
                    <button wire:click="eliminarPuesto('{{$puesto[0]}}','{{$puesto[1]}}')" class="btn"><img width="20px" height="20px" src= '/images/delete.svg'></button>
                </div>
            </div>
        @endforeach
        </ol>
    </div>
    @endif
    @if($puestosArregloEliminados != null)
    <hr>
    <div class="row offset-md-1">
        <ol>
        @foreach($puestosArregloEliminados as $puesto)
            <div class="row">
                <div class="col-md-8">
                <li >{{$puesto[0]}}</li> 
                </div>
                <div class="col-md-1">
                    <button wire:click="altaPuesto('{{$puesto[0]}}','{{$puesto[1]}}')" class="btn"><img width="20px" height="20px" src= '/images/create.svg'></button>
                </div>
            </div>
        @endforeach
        </ol>
    </div>
    @endif
    <div class="form-group row offset-lg-4 col-lg-4 offset-md-1 col-md-12">
        <button class="form-control col-md-6 btn btn-sm btn-primary" wire:click='{{$botonStor}}'>Guardar</button>
        <button class="form-control col-md-6 btn btn-sm btn-danger" wire:click='defaultView'>Cancelar</button>
    </div>
</div>