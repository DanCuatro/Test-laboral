<div class="container">
    @if($mensaje!=null)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 alert alert-primary">
                <p style="text-align: center;">{{$mensaje}}</p>
            </div>
        </div>
    </div>
    @endif
    <h3 class="offset-lg-4">Cambiar contraseña</h3>
    <br>
    <div class="row form-group">
        <label class="col-lg-4 col-form-label text-lg-right">Antigua Contraseña</label>
        <div class="col-lg-5">
            <input class="form-control @error('contraseña_antigua') is-invalid @enderror" type="password" wire:model="contraseña_antigua">
            @error('contraseña_antigua') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
        </div>
    </div>
    <div class="row form-group">
        <label class="col-lg-4 col-form-label text-lg-right">Nueva Contraseña:</label>
        <div class="col-lg-5">
            <input class="form-control @error('contraseña_nueva') is-invalid @enderror" type="password" wire:model="contraseña_nueva">
            @error('contraseña_nueva') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
        </div>
    </div>
    <div class="row form-group">
        <label class="col-lg-4 col-form-label text-lg-right">Confirmar Contraseña:</label>
        <div class="col-lg-5">
            <input class="form-control @error('contraseña_nueva_confirmation') is-invalid @enderror" type="password" wire:model="contraseña_nueva_confirmation">
            @error('contraseña_nueva_confirmation') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
        </div>
    </div>
    <button type="button" class="offset-lg-4 col-lg-3 btn btn-primary" wire:click="CambiarContraseña">Cambiar</button>
</div>