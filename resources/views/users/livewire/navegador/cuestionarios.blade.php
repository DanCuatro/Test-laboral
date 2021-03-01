<tr> 
    <td colspan="5" class="col-sm-10 alert alert-primary"> 
        <div>
            <div class="form-group ">
                <h3>Cuestionarios Resueltos</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Periodo</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($arrayCuestionarios!=null)
                        @foreach($arrayCuestionarios as $item)
                            @if ($item[0])
                                <tr class="table-success">
                                    <td class="col-md-6">{{$item[1]}}</td>
                                    <td >
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acción</button>
										<div class="dropdown-menu">
                                            <a class="dropdown-item" wire:click='verCuestionario({{$item[2]}})'>Ver</a>                   
                                            <a class="dropdown-item" href="{{route('users.cuestionario',$item[2])}}">PDF</a>
										</div>
                                    </td>
                                </tr>
                            @else
                                <tr class="table-danger">
                                    <td class="col-md-6">{{$item[1]}}</td>
                                    <td ><strong>N/P</strong></td>
                                </tr>
                            @endif
                        @endforeach
                        @endif
                    </tbody>
                </table>
                
            </div>
        </div>
    </td>
</tr>