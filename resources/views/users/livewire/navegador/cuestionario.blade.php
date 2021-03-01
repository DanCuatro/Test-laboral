<div class="row">
    <div class="col-12">
        <h1>{{$apPaterno." ".$apMaterno." ".$name}}</h1>
    </div>
    <div class="col-md-12 row ">
        
        <div class="col-md-10">
            <table class="table table-bordered table-sm table-responsive-lg ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" colspan="3">Categoría</th>
                        <th scope="col" colspan="2">Dominio</th>
                        <th scope="col">Dimensión</th>
                        <th scope="col">ítem</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th width="1.8%" scope="row" title="Calificacion Total:{{$arrayCaDoDiCuestionario[0]}}" rowspan="{{$arrayCaDoDiCuestionario[3]}}" style="background-color:rgb({{$arrayCaDoDiCuestionario[1][0]}},{{$arrayCaDoDiCuestionario[1][1]}},{{$arrayCaDoDiCuestionario[1][2]}})"></th>
                        
                        @for($i=0;$i<count($arrayCaDoDiCuestionario[2]);$i++)
                            @if($i!=0)<tr>@endif 
                                <th title="Calificacion Total:{{$arrayCaDoDiCuestionario[2][$i][1]}}" width="1.5%" scope="row" rowspan="{{$arrayCaDoDiCuestionario[2][$i][4]}}" style="background-color:rgb({{$arrayCaDoDiCuestionario[2][$i][2][0]}},{{$arrayCaDoDiCuestionario[2][$i][2][1]}},{{$arrayCaDoDiCuestionario[2][$i][2][2]}},0.5)"></th>
                                <th title="Calificacion Total:{{$arrayCaDoDiCuestionario[2][$i][1]}}" scope="row" rowspan="{{$arrayCaDoDiCuestionario[2][$i][4]}}" >{{$arrayCaDoDiCuestionario[2][$i][0]}}</th>
                            @for ($x=0;$x<count($arrayCaDoDiCuestionario[2][$i][3]);$x++)
                                @if($x!=0)<tr>@endif
                                    <th title="Calificacion Total:{{$arrayCaDoDiCuestionario[2][$i][3][$x][1]}}" width="1.5%" scope="row" rowspan="{{$arrayCaDoDiCuestionario[2][$i][3][$x][4]}}" style="background-color:rgb({{$arrayCaDoDiCuestionario[2][$i][3][$x][2][0]}},{{$arrayCaDoDiCuestionario[2][$i][3][$x][2][1]}},{{$arrayCaDoDiCuestionario[2][$i][3][$x][2][2]}},0.5)"></th>
                                    <th title="Calificacion Total:{{$arrayCaDoDiCuestionario[2][$i][3][$x][1]}}" scope="row" rowspan="{{$arrayCaDoDiCuestionario[2][$i][3][$x][4]}}">{{$arrayCaDoDiCuestionario[2][$i][3][$x][0]}}</th>
                                @for($y=0;$y<count($arrayCaDoDiCuestionario[2][$i][3][$x][3]);$y++)
                                    @if($y!=0)<tr>@endif
                                    <th scope="row">{{$arrayCaDoDiCuestionario[2][$i][3][$x][3][$y][0]}}</th>
                                    <td>{{$arrayCaDoDiCuestionario[2][$i][3][$x][3][$y][1]}}</td>
                                    </tr>
                                @endfor
                            @endfor
                        @endfor
                    <tr>
                        <th colspan="6" scope="row" title="Calificacion Total:{{$arrayCaDoDiCuestionario[0]}}" style="background-color:rgb({{$arrayCaDoDiCuestionario[1][0]}},{{$arrayCaDoDiCuestionario[1][1]}},{{$arrayCaDoDiCuestionario[1][2]}},0.5)">Calificacion Total:</th>
                        <th >{{$arrayCaDoDiCuestionario[0]}}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @for($i=0;$i<count($arrayRespuestaCuestionario);$i++)
    <div class="col-md-6">
        <div clas="card">
            <div class="card-header alert-dark">Sección {{$arrayRespuestaCuestionario[$i][0]}}: {{$arrayRespuestaCuestionario[$i][1]}}</div>
            <div class="card-body con container">
                @for($x=0;$x<count($arrayRespuestaCuestionario[$i][2]);$x++)
                <div class="row">
                    <div class="col-12 col-md-8">{{$arrayRespuestaCuestionario[$i][2][$x][0]}} {{$arrayRespuestaCuestionario[$i][2][$x][1]}}</div>
                    <div class="col-md-auto">
                        <h2><p><!--    
                            @for($y=0;$y<=$arrayRespuestaCuestionario[$i][2][$x][2];$y++)
                                --><span style="color: orange">★</span><!--
                            @endfor
                            @for($y=0;$y<4-$arrayRespuestaCuestionario[$i][2][$x][2];$y++)
                                --><span style="color: grey">★</span><!--
                            @endfor 
                        --></p></h2>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
    @endfor
</div>

