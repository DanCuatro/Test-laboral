<br>
<div class="form-group row" id="home">
    <div class="col-md-2">
        <select wire:model="idPeriodo" class="form-control">
            <option>--Selecionar--</option>
            @foreach ($listaPeriodos as $periodo)
                <option value="{{$periodo->id}}">{{$periodo->periodo}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <select wire:model="agrupacion" class="form-control">
            <option value="Cuestionario">Total</option>
            <option value="Categori">Categoria</option>
            <option value="Dominio">Dominio</option>
        </select>
    </div>
    @if($listaCategoria!=null)
    <div class="col-md-2">
        <select wire:model="subAgrupacion" class="form-control">
            <option>--Selecionar--</option>
            @foreach ($listaCategoria as $categoria)
                
                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
            @endforeach
        </select>
    </div>
    @endif
    @if($listaDomonio!=null)
    <div class="col-md-2">
        <select wire:model="subAgrupacion" class="form-control">
            <option>--Selecionar--</option>
            @foreach ($listaDomonio as $dominio)
                <option value="{{$dominio->id}}">{{$dominio->nombre}}</option>
            @endforeach
        </select>
    </div>
    @endif
</div>