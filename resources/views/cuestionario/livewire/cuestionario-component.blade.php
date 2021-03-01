<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Cuestionario {{$fecha->format('Y')}}</h1>
            <h4 class="text-center">{{$periodoString}}</h4>
        </div>
        @include("cuestionario.livewire.cuestionario.$vista")
    </div>
</div>

