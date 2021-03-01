<div class="form-group row">
    <label class="col-lg-3 col-form-label text-md-right">
        <b>Extensión</b>
    </label>
    <div class="col-lg-6">
        <input wire:model='name' type="text" class="form-control  @error('name') is-invalid @enderror ">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>    
</div>

<div class="form-group row offset-lg-4 col-lg-4">
    <button class="form-control col-lg-6 btn btn-sm btn-primary" wire:click='{{$botonStor}}'>Guardar</button>
    <button class="form-control col-lg-6 btn btn-sm btn-danger" wire:click='defaultView'>Cancelar</button>
    <br><br>
</div>