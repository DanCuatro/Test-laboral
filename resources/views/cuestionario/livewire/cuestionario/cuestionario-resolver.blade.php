<div class="card-body">
    
    @for ($i=0;$i<count($seccionArray);$i++)
        <div class="card">
           
            
            @if($seccionArray[$i][2]==0)
                <div class="card-header alert-success">
                    Sección {{$i+1}}
                    {{$seccionArray[$i][0]}}
                </div>
            @elseif ($seccionArray[$i][2]==1) 
                <div class="card-header">
                    Sección {{$i+1}}:
                    {{$seccionArray[$i][0]}}
                </div>
                <div class="card-body con container">
                    @if($seccionArray[$i][1]==null)
                        @for($x=0;$x<count(($seccionArray[$i][3]));$x++)

                        <div class="row">
                            <div class="col-md-9">{{$x+$numeroPregunta}} {{$seccionArray[$i][3][$x][1]}}</div>
                            <div class="col-md-3">
                                <h2><p class="clasificacion">
                                    @for($reactivo=4;$reactivo>=0;$reactivo--)<input id="{{$x+1}}{{$reactivo}}" type="radio" name="{{$x+($i*10)+1}}" value="{{$reactivo}}" wire:model="item.{{$x}}"><label for="{{$x+1}}{{$reactivo}}">★</label>@endfor
                                </p></h2>
                                @error('item.'.$x) <span style="color: red;">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        @endfor
                        <div class="row">
                            <div class="offset-9 col-md-3">
                                <h2><button wire:click="StorSection({{$i}})" class="btn btn-primary">Siguiente</button></h2>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-9">¿{{$seccionArray[$i][1]}}?</div>
                            <div class="col-md-3">
                                <div class="col-sm-10">
                                    <div class="form-check">
                                      <input value="si" class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" checked wire:model="respuesta">
                                      <label class="form-check-label" for="gridRadios1">
                                        <h1>Si</h1>
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input value="no" class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" wire:model="respuesta">
                                      <label class="form-check-label" for="gridRadios2">
                                        <h1>No</h1>
                                      </label>
                                    </div>
                                    @error('respuesta') <span>{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-9 col-md-3">
                                <h2><button wire:click="Restriccion({{$i}})" class="btn btn-primary">Siguiente</button></h2>
                            </div>
                        </div>
                    @endif
                </div>
            @elseif ($seccionArray[$i][2]==2) 
                <div class="card-header">
                    Sección {{$i+1}}
                </div>
            @endif

        </div>
    @endfor

</div>