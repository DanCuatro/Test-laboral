<div class="col-md-12">
   <div class="card">
      <div class="card-header">
         <h1 class="text-center">Cuestionario {{$fecha->format('Y')}}</h1>
         <h4 class="text-center">{{$periodoString}}</h4>
      </div>
      <div class="card-body">
         
      <div class="form-group row">
         <label for="name" class="col-md-4 col-form-label text-md-right">Fecha de inicio</label>

         <div class="col-md-6">
               <input class="form-control" type="date" min="{{ $fecha->format('Y-m-d')}}" max="{{ $Limite->format('Y-m-d')}}" wire:model="fechaInicio" {{$habilidad}}>
               @error('fechaInicio') <span>{{ $message }}</span> @enderror
         </div>
      </div>

      <div class="form-group row">
         <label for="name" class="col-md-4 col-form-label text-md-right">Fecha Limite</label>

         <div class="col-md-6">
               <input class="form-control" type="date" min="{{ $fecha->format('Y-m-d')}}" max="{{ $Limite->format('Y-m-d')}}" wire:model="fechaLimite">
               @error('fechaLimite') <span>{{ $message }}</span> @enderror
         </div>
      </div>
      <div class="form-group row">
         <div class="col-md-6 offset-md-4">
            <div class="{{$colorAlerta}}">
               <h5 class="text-center">{{$errorFecha}}</h5>
            </div>
         </div>
      </div>
      <div class="form-group row mb-0">
         <div class="col-md-6 offset-md-4">
            <button class="btn btn-primary" wire:click="guardar">Asignar</button>
         </div>
      </div>

      </div>
   </div>
</div>