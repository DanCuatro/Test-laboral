<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
                <div class="card-header">
					<div class="row">
                        <div class="col-lg-10"><h4>Datos Personales</h4>
                        </div>
                        <div class="col-lg-2">
                            <button wire:click='CambiarView' class="form-control btn btn-sm btn-primary float-right">
                                @if($viewDatosPersonales=="show") Editar @else Visualizar @endif
                            </button>
						</div>
					</div>
                </div>
                <div class="card-body">
                    @include("users.livewire.datosPersonales.$viewDatosPersonales")
                </div>
            </div>
		</div>
	</div>
</div>

