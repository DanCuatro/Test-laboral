<div class="container">
    <div class="row form-group">
        @if($contadorPuestos<2)
        <div class="row col-lg-4">
            <label class="col-lg-5 col-form-label text-lg-right">Areas:</label>
            <div class="col-lg-7">
                <select wire:model="cat_ara" class="form-control @error('cat_ara') is-invalid @enderror">
                    <option> </option>
                    @foreach ($catalogo_area as $item) <option value="{{$item->id}}">{{$item->name}}</option> @endforeach
                </select>
                @error('cat_ara')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
        <div class="row col-lg-4">
            <label class="col-lg-5 col-form-label text-lg-right">Puestos:</label>
            <div class="col-lg-7">
                <select wire:model="cat_puesto" class="form-control @error('cat_puesto') is-invalid @enderror">
                    <option> </option>
                    @if($catalogo_puesto!=null)
                        @foreach ($catalogo_puesto as $item) <option value="{{$item->id}}">{{$item->name}}</option> @endforeach 
                    @endif
                </select>
                @error('cat_puesto')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
        </div>
        @if($user->userPuesto->count()<2 && $periodo->count()<2) 
        <div class="row col-lg-4">
            <label class="col-lg-5 col-form-label text-lg-right">Fechas Ingreso:</label>
            <div class="col-lg-7">
                <input wire:model="fechaInicioPuesto" type="date" class="form-control" type="date">
            </div>
        </div>
        @endif
        <div class="col-lg-2">
            <!-- Button trigger modal -->
            <button type="button" class="form-control btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                Activar
            </button>
  
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Activar Puesto: @foreach ($catalogo_puesto as $item) @if ($item->id==$cat_puesto){{$item->name}}@endif @endforeach-@foreach ($catalogo_area as $item) @if ($item->id==$cat_ara){{$item->name}}@endif @endforeach</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Está seguro que desea activar este Puesto (@foreach ($catalogo_puesto as $item) @if ($item->id==$cat_puesto){{$item->name}}@endif @endforeach) 
                        dentro de esta Área (@foreach ($catalogo_area as $item) @if ($item->id==$cat_ara){{$item->name}}@endif @endforeach)?</p>
                        @if($user->userPuesto->count()<2 && $periodo->count()<2)  
                            <p><b>Advertencias: solo en los primeros dos puestos usted será capaz de ingresar la fecha desde la cual se desempeña en el mismo </b></p>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" wire:click='ActivarPuesto' data-dismiss="modal">Activar</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-primary col-12">
            <h2>Usted llego al número límite de <b>Puestos</b> activos</h2> 
            <p>si desea activar otro puerto deberá Finalizar uno de los dos puestos activos </p>
        </div>
        @endif
    </div>
    <div class="row">
        @foreach($puestosTrabajando as $item)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title"><b>{{$item['puesto']}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$item['area']}}</b></h6>
                <p class="card-text">{{$item['tiempo']}}</p>
                <a wire:click="DesactivarPuesto({{$item['id']}})" class="btn btn-secondary">Finalizar</a>
                </div>
            </div>
        @endforeach
    </div>

</div>