<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-9">
			<div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-lg-10"><h4>Campus</h4></div>
						<div class="col-lg-2">
							@can('campus.create')
								<button wire:click='create' class="form-control btn btn-sm btn-primary float-right">
									Crear
								</button>
							@endcan
						</div>
					</div>
                </div>
                <div class="card-body">
					@include("campus.livewire.$viewCreate")
					<table class="table">
						<thead>
							<tr>
								<th >ID</th>
								<th >Campus</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<body>
							@foreach($campus as $campu)
								<tr class="@if(!$campu->estado) alert-secondary @endif">
									<td >{{ $campu->id }}</td>
									<td class="col-md-6" >{{ $campu->name }}</td>
									<td class="col-md-1">
										<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acción</button>
											<div class="dropdown-menu">
												@can('campus.show')
													<a class="dropdown-item" wire:click='show({{$campu->id}})'>Ver</a>                   
												@endcan
												@can('campus.edit')
													<a class="dropdown-item" wire:click='edit({{$campu->id}})'>Editar</a>
												@endcan
												@can('campus.destroy')
													<button class="dropdown-item" wire:click='destroy({{$campu->id}})'>
														@if($campu->estado) Baja @else Alta @endif
													</button>
												@endcan
											</div>
									</td>
								</tr>
								@if( $idCampu == $campu->id)
									@include("campus.livewire.$viewCrut")
								@endif
							@endforeach
							<tr></tr>
						</body>
					</table>
                   {{ $campus->render() }}
                </div>
            </div>
		</div>
	</div>
</div>

