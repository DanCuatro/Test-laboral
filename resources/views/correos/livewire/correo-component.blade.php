<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-9">
			<div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-lg-10"><h4>Correos</h4></div>
						<div class="col-lg-2">
							@can('correos.create')
								<button wire:click='create' class="form-control btn btn-sm btn-primary float-right">
									Crear
								</button>
							@endcan
						</div>
					</div>
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
													<button class="dropdown-item" wire:click='destroy({{$correo->id}})'>
													Eliminar
													</button>
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
	</div>
</div>

