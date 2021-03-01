<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
                <div class="card-header">
                	<div class="row">
						<div class="col-lg-5"><h4>Empleados</h4></div>
						<div class="col-lg-5">
						<input placeholder="Buscar por (Nombre, Correo, Genero, Incompleto)" wire:model="buscador" class="form-control">
						</div>
						<div class="col-lg-2">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ayuda</button>
							  <!-- Modal -->
							  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
								  <div class="modal-content">
									<div class="modal-header">
									  <h5 class="modal-title" id="exampleModalLabel">Atajos de Búsqueda</h5>
									  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									  </button>
									</div>
									<div class="modal-body">
										<p> Puede buscar a los empleados mediante</p>
										<ul>
											<li>Nombre</li>
											<li>Genero: @foreach($cat_genero as $genero) <b>{{$genero->name}}</b>, @endforeach</li>
											<li>Comando <b>'incompleto'</b>: este mostrara lo usuarios que faltan por completar datos </li>
										</ul>
									  
									</div>
									<div class="modal-footer">
									  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								  </div>
								</div>
							  </div>
						</div>
					</div>
                </div>
                <div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th >ID</th>
								<th >Nombre</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<body>
							@foreach($usuarios as $usuario)
								<tr  class="@if(!$usuario->estado) alert-secondary @endif">
									<td >{{ $usuario->id }}</td>
									<td class="col-md-6" >{{ $usuario->name }}</td>
									<td class="col-md-1">
										<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acción</button>
											<div class="dropdown-menu">
												@if($this->permisosCrud('show',$usuario->id))
													<a class="dropdown-item" wire:click='show({{$usuario->id}})'>Ver</a>                   
												@endif
												@if($this->permisosCrud('show',$usuario->id))
													<a class="dropdown-item" wire:click='cuestionarios({{$usuario->id}})'>Cuestionrios</a>
												@endif
												@if($this->permisosCrud('edit',$usuario->id))
													<a class="dropdown-item" wire:click='edit({{$usuario->id}})'>Editar</a>
												@endif
												@if($this->permisosCrud('editCom',$usuario->id))
													<a class="dropdown-item" wire:click='editComplemento({{$usuario->id}})' title="Datos Complementarios">Datos Com</a>
												@endif
												@if($this->permisosCrud('editRol',$usuario->id))
													<a class="dropdown-item" wire:click='editRoles({{$usuario->id}})'>Roles</a>
												@endif
												@if($this->permisosCrud('destroy',$usuario->id))
													<a class="dropdown-item" wire:click='BajaAlta({{$usuario->id}})'>@if($usuario->estado) Baja @else Alta @endif</a>
												@endif
											</div>
									</td>
								</tr>
								@if( $idUsuario == $usuario->id)
									@include("users.livewire.navegador.$viewCrut")
								@endif
							@endforeach
							<tr></tr>
						</body>
					</table>
                   {{ $usuarios->links() }}
                </div>
            </div>
		</div>
	</div>
</div>