<div class="container">
    <div class="alert alert-info ">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a wire:click="CambiarMenu(0)" class="nav-link @if($posicionMenu[0]) active @endif" id="home-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">General</a>
            </li>
            <li class="nav-item">
              <a wire:click="CambiarMenu(1)" class="nav-link @if($posicionMenu[1]) active @endif" id="profile-tab" data-toggle="tab" role="tab" aria-controls="profile" aria-selected="false">Segmentación</a>
            </li>
            <li class="nav-item">
              <a wire:click="CambiarMenu(2)" class="nav-link @if($posicionMenu[2]) active @endif" id="contact-tab" data-toggle="tab" role="tab" aria-controls="contact" aria-selected="false">Delimitación</a>
            </li>
            <li class="col-md-8">
              <div class="container row ">
                <div class="col-md-8 form-group">
                  <input wire:model="titulo" class="form-control">
                </div>
                <div class="form-group">
                  <button wire:click="recargar" class="btn btn-primary">Cargar</button>
                </div>
              </div>
            </li>
        </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade @if($posicionMenu[0]) show active @endif" id="general" role="tabpanel" aria-labelledby="home-tab">
                @include("graficos.livewire.nav-link.general")
            </div>
            <div class="tab-pane fade @if($posicionMenu[1]) show active @endif" id="segmentaciones" role="tabpanel" aria-labelledby="profile-tab">
                @include("graficos.livewire.nav-link.segmentaciones")
            </div>
            <div class="tab-pane fade @if($posicionMenu[2]) show active @endif" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                @include("graficos.livewire.nav-link.delimitaciones")
            </div>
          </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-9" style="height: 450px;">
        @if($this->ver)
        <canvas id="myChart2" width="100" height="55"></canvas>
        @else
        <canvas id="myChart1" width="100" height="55"></canvas>
        @endif
      </div>
      <div class="col-md-3 alert alert-info">
        <div class="container">
          <div class="row">
            <button wire:click="GuardarGrafica" class="col-md-6 btn btn-primary">Guardar</button>
            <button wire:click="NuevoElemento" class="col-md-6 btn btn-primary">Agregar</button>
          </div>
        </div>
        <hr>
        @for ($i=0;$i<count($graficasGuardadas);$i++)  
          <div class="form-control alert-primary @if($i===$punteroGraficasGuardadas) border-primary @endif">
            <div class="row">
              <div class="col-8" data-toggle="tooltip"  title="{{$graficasGuardadas[$i]["titulo"]}}"
              style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">{{$graficasGuardadas[$i]["titulo"]}}</div> 
              <div class="col-1"><a style="border:none;" class="" wire:click="CargarGrafica({{$i}})"><img width="20px" height="20px" src= '/images/edit.svg'></a></div> 
              <div class="col-1"><a style="border:none;" class="" wire:click="EliminarGuardarGrafica({{$i}})"><img width="20px" height="20px" src= '/images/delete.svg'></a></div>
            </div>
          </div>
        @endfor
        
      <form method="post" action="{{route('graficos.pdf')}}" target="_blank">
        </div>
        @csrf
        {!! Form::hidden('datos', json_encode($graficasGuardadas)) !!}
        {!! Form::hidden('info', json_encode($modelosDeControl)) !!}
        <button type="submit" class="col-md-12 btn btn-primary">PDF</button>
        </div>
      </form>
</div>
@push('scripts')
    @include("graficos.livewire.script")
@endpush