<tr> 
    <td colspan="5" class="alert alert-primary"> 
        <div>
            <div class="offset-1 form-group">
                @if($user!=null)
                    <p><strong>Nombre: </strong>{{$user->apellido_P}} {{$user->apellido_M}} {{$user->name}}</p>
                    <p><strong>Email: </strong>{{ $user->email}}</p>
                    <p><strong>Fecha de Nacimiento: </strong>{{ $user->fecha_nacimiento}}</p>
                    <p><strong>Genero: </strong>@if($user->cat_genero!=null){{$user->cat_genero->name}}@endif</p>
                    <p><strong>Estado Civil: </strong>@if($user->cat_estados_civil!=null){{$user->cat_estados_civil->name}}@endif</p>
                    <p><strong>Nivel de Estudio: </strong>@if($user->cat_nivel_estudio!=null){{$user->cat_nivel_estudio->name}}@endif</p>
                    <p><strong>Tipo de Contratación: </strong>@if($user->cat_tipos_contratacion!=null){{$user->cat_tipos_contratacion->name}}@endif</p>
                    <p><strong>Tipo de Personal: </strong>@if($user->cat_tipos_personal!=null){{$user->cat_tipos_personal->name}}@endif</p>
                    <p><strong>Jornada: </strong>@if($user->cat_jornada_trabajo!=null){{$user->cat_jornada_trabajo->name}}@endif</p>
                    <p><strong>Experiencia Laboral: </strong>{{$exp_Lavoral->format('y')}} Año(s) con {{$exp_Lavoral->format('m')}} Mese(s) y {{$exp_Lavoral->format('d')}} Dia(s)</p>
                @endif
            </div>
            <div class="offset-1 form-group">
                <ul>
                    @foreach ($puestos as $puesto)
                        <li><p>Periodo laboran en <strong>{{$puesto['puesto']}}</strong> en el area de <strong>{{$puesto['area']}}</strong>: {{$puesto['expLaboral']->format('y')}} Año(s) con {{$puesto['expLaboral']->format('m')}} Mese(s) y {{$puesto['expLaboral']->format('d')}} Dia(s)</p></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </td>
</tr>