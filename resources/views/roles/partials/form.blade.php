<div class="form-group">
	{{ Form::label('name','Nombre del Rol') }}
	{{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('slug','URL Amigable') }}
	{{ Form::text('slug', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('description','Descripcion') }}
	{{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>

<hr>

<h3>Permiso Especial</h3>

<div class="form-group">
	<label>{{ Form::radio('special', 'all-access') }} Acceso total</label>
	<label>{{ Form::radio('special', 'no-access') }} Ningun Acceso</label>	
</div>

<h3>Lista de Permisos</h3>
<div class="Form">
	<ul class="list-unstyled">
		<div class="{{$viejoTitulo=''}}" ></div>
		@for($i=0;$i<count($permissions);$i++)
			<div class="{{$nuevoTitulo=''}}" ></div>
				@for($x=0;$x<strlen($permissions[$i]->slug)-1;$x++)
					@if($permissions[$i]->slug[$x]!='.')
						<div class="{{$nuevoTitulo=$nuevoTitulo.$permissions[$i]->slug[$x]}}" ></div>
					@else 
						<div class="{{$x=strlen($permissions[$i]->slug)-1}}"></div>
					@endif
				@endfor
				@if($nuevoTitulo!=$viejoTitulo)
					<h4>{{$nuevoTitulo}}</h4>
					<div class="{{$viejoTitulo=$nuevoTitulo}}" ></div>
					<div class="{{$nuevoTitulo=''}}" ></div>
				@endif
			<li>
				<label>
					{{ Form::checkbox('permissions[]',$permissions[$i]->id, null) }}
					{{ $permissions[$i]->name }}
					<em>( {{ $permissions[$i]->description ?: 'N/A' }} )</em>
				</label>
			</li>
		@endfor
	</ul>
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn  btn-sm btn-primary']) }}
</div> 