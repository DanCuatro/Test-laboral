<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-9">
			<div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-lg-10"><h4>Áreas</h4>
							<!--<p>Modificar los permisos creados y borrados</p>
							<p>Verificar que los cuestionrios de los empledos seanverificados por la seccion finlizado</p>-->
						</div>
						<div class="col-lg-2">
							@can('areas.create')
								<button wire:click='create' class="form-control btn btn-sm btn-primary float-right">
									Crear Área
								</button>
							@endcan
						</div>
					</div>
                </div>
                <div class="card-body">
					@include("areas.livewire.$viewCreate")
					<table class="table">
						<thead>
							<tr>
								<th >ID</th>
								<th >Nombre</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<body>
							@foreach($areas as $area)
								<tr class="@if(!$area->estado) alert-secondary @endif">
									<td >{{ $area->id }}</td>
									<td class="col-md-6" >{{ $area->name }}</td>
									<td class="col-md-1">
										<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acción</button>
											<div class="dropdown-menu">
												@if(Gate::check('areas.show') || Gate::check($area->name.'.areas.show'))
													<a class="dropdown-item" wire:click='show({{$area->id}})'>Ver</a>                   
												@endif
												@if(Gate::check('areas.edit') || Gate::check($area->name.'.areas.edit'))
													<a class="dropdown-item" wire:click='edit({{$area->id}})'>Editar</a>
												@endif
												@can('areas.destroy')
													<a class="dropdown-item" wire:click='BajaAlta({{$area->id}})'> @if($area->estado) Baja @else Alta @endif </a>
												@endcan
											</div>
									</td>
								</tr>
								@if( $idArea == $area->id)
									@include("areas.livewire.$viewCrut")
								@endif
							@endforeach
							<tr></tr>
						</body>
					</table>
                   {{ $areas->render() }}
                </div>
            </div>
		</div>
	</div>
</div>

