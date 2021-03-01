<br>
<div class="container">

    <div class="row">
        <div class="form-group col-md-2">
            <select wire:model="punteroDelimitado" class="form-control">
                @for($i=0;$i<count($modelosDeControl);$i++)
                <option value="{{$i}}">{{$modelosDeControl[$i]["name"]}}</option>
                @endfor
            </select>
        </div>
        @if($modelosDeControl[$punteroDelimitado]["modelos"]!=null)
        <div class="form-group col-md-2">
            <select wire:model="punteroDelimitadoInterno" class="form-control">
                @for($i=0;$i<count($modelosDeControl[$punteroDelimitado]["modelos"]);$i++)
                <option value="{{$i}}">{{$modelosDeControl[$punteroDelimitado]["modelos"][$i]["name"]}}</option>
                @endfor
            </select>
        </div>
        <div class="form-group col-md-2">
            <button wire:click="AgregarEtiquetaLimitante" class="btn btn-primary">Agregrar</button>
        </div>
        @endif
    </div>
    <div class="form-group form-check row">
        <div class="alert alert-secondary col-md-11 row">
            @for($i=0;$i<count($etiquetasLimitadores);$i++)
                @for($x=0;$x<count($etiquetasLimitadores[$i]['ids']);$x++)
                    <h5><span class="badge" style="color:#fff; background-color:#1883BA;">{{$etiquetasLimitadores[$i]['ids'][$x]['name']}} <a wire:click="SacarEtiqueta({{$i}},{{$x}})">@include("layouts.equis")</a></span><h5 style="width:5px;"></h5></h5> 
                @endfor
            @endfor
        </div>
    </div>
</div>