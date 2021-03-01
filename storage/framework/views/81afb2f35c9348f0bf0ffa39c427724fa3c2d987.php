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
                                <?php if($viewDatosPersonales=="show"): ?>Editar <?php else: ?> Visulizar <?php endif; ?>
                            </button>
						</div>
					</div>
                </div>
                <div class="card-body">
                    <?php echo $__env->make("users.livewire.datosPersonales.$viewDatosPersonales", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
		</div>
	</div>
</div>

<?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/users/livewire/datosPersonales/registro-component.blade.php ENDPATH**/ ?>