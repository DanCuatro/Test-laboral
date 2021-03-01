
    <div class="row">
            <div class="card">
                <div class="card-header">
                	Correos {{$idCorreo}}
                	@can('correos.create')
						<button wire:click='create' class="btn  btn-sm btn-primary float-right">
							Crear Correo
						</button>
                	@endcan
                </div>

                <div class="card-body">
				@include("correos.livewire.$viewCreate")
                <table class="table">
                   	<thead>
                   		<tr>
                   			<th >ID</th>
                   			<th >Extensión</th>
                   			<th colspan="3">&nbsp;</th>
                   		</tr>
                   	</thead>
                   	<body>
						  {{$name}}
                   		@foreach($correos as $correo)
                   		<tr>
                   			<td >{{ $correo->id }}</td>
                   			<td class="col-md-6" >{{ $correo->name }}</td>
                   			<td class="col-md-1">
                   				<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acción</button>
									<div class="dropdown-menu">
										@can('correos.show')
											<a class="dropdown-item" wire:click='show({{$correo->id}})'>Ver</a>                   
										@endcan
										@can('correos.edit')
											<a class="dropdown-item" wire:click='edit({{$correo->id}})'>Editar</a>
										@endcan
										@can('correos.destroy')
											{!! Form::open(['route' => ['correos.destroy',$correo->id ],'method' => 'DELETE']) !!}
												<button class="dropdown-item">
												Eliminar
												</button>
											{!! Form::close() !!}
										@endcan
									</div>
							</td>
							
						</tr>

						@if( $idCorreo == $correo->id)
							@include("correos.livewire.$viewCrut")
						@endif

                   		@endforeach
						   
						<tr></tr>
                   	</body>
                </table>
                   {{ $correos->render()}}
                </div>
            </div>
    </div>
