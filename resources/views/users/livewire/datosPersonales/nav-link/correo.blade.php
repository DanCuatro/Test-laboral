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
    @if($numeroPeticiones<1)
    <h3 style="text-align: center;">Cambiar Correo</h3>
    <br>
        <div class="row form-group">
            <label class="col-lg-3 col-form-label text-lg-right">Correo</label>
            <div class="input-group col-lg-6">
                <input wire:model="base" class="form-control  @error('email') is-invalid @enderror" >
                <div class="input-group-prepend "> <div class="input-group-text" id="btnGroupAddon">@</div> </div>
                <select  wire:model="extencion" class="form-control @error('email') is-invalid @enderror  @error('extencion') is-invalid @enderror" name="extencion">
                    <option></option>
                    @foreach ($correo as $item) <option value="{{$item->id}}">{{$item->name}}</option> @endforeach
                </select>
                @error('email') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                @error('extencion') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
        </div>
        <button wire:click="CambiarCorreo" class="offset-lg-3 col-lg-3 btn btn-primary">Cambiar</button>
    @else
    <div class="card text-center">
        <div class="card-header">
            Petición
        </div>
        <div class="card-body">
          <h5 class="card-title">Cambio de Correo</h5>
          <p class="card-text" style="text-align: justify;">Usted ha hecho la petición de cambiar su correo actual ({{$peticion->user->email}}) por el siguiente {{$peticion->email}}, el correo que actualmente usa seguirá siendo con el cual podrá entrar a esta página hasta que usted acepte la petición envía a su nuevo correo, si no ha recibido el mensaje de verificación favor de usar el siguiente enlace para reenviar el mensaje </p>
          <a wire:click="cancelarPeticion({{$peticion->id}})" class="btn btn-primary">Cancelar Petición</a>
        </div>
        <div class="card-footer text-muted">
            {{$peticion->created_at}}
        </div>
      </div>
    @endif
</div>