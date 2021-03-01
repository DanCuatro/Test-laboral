<tr> 
    <td colspan="5"> 
        <div class="alert alert-primary">
            <h2><b>{{$area->name}}</b></h2>
            <div class="justify-content-center">
                <div class="col-md-10">
                    @if($puestosArreglo != null)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Puestos Activos</th>
                            </tr>
                            <tr>
                                <th>Puesto</th>
                                <th>No. Empleados</th>
                            </tr>
                        </thead>
                        <body>
                            @foreach($puestosArreglo as $puesto)
                            <tr>
                                <td>{{$puesto[0]}}</td>
                                <td>{{$puesto[2]}}</td>
                            </tr>
                            @endforeach
                        </body>
                    </table>
                    @endif

                    @if($puestosArregloEliminados != null)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Puestos Inactivos</th>
                            </tr>
                            <tr>
                                <th >Puesto</th>
                                <th >No. Empleados</th>
                            </tr>
                        </thead>
                        <body>
                            @foreach($puestosArregloEliminados as $puesto)
                            <tr>
                                <td>{{$puesto[0]}}</td>
                                <td>{{$puesto[2]}}</td>
                            </tr>
                            @endforeach
                        </body>
                    </table>
                    @endif

                </div>
            </div>

        </div>
    </td>
</tr>