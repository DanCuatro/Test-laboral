<br>
<div class=" row form-group col-md-2">
    <select wire:model="punteroSegmento" class="form-control">
        @for($i=0;$i<count($modelosDeControl);$i++)
            <option value="{{$i}}">{{$modelosDeControl[$i]["name"]}}</option>
        @endfor
    </select>
</div>

<div class=" form-group form-check row" id="home">
    @if($modelosDeControl[$punteroSegmento]["modelos"]!=null)
        @for($i=0;$i<count($modelosDeControl[$punteroSegmento]["modelos"]);$i++)
        <div class="form-check form-check-inline">
            <input wire:model="idSegmento.{{$i}}" class="form-check-input " type="checkbox" id="{{$modelosDeControl[$punteroSegmento]["modelos"][$i]["name"]}}{{$modelosDeControl[$punteroSegmento]["modelos"][$i]["id"]}}" value="{{$modelosDeControl[$punteroSegmento]["modelos"][$i]["id"]}}">
            <label class="form-check-label " for="{{$modelosDeControl[$punteroSegmento]["modelos"][$i]["name"]}}{{$modelosDeControl[$punteroSegmento]["modelos"][$i]["id"]}}">{{$modelosDeControl[$punteroSegmento]["modelos"][$i]["name"]}}</label>
        </div>
        @endfor
    @endif
</div>