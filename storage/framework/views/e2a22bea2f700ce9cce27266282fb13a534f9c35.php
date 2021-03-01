<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-9">
			<div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-lg-10"><h4>Correos</h4></div>
						<div class="col-lg-2">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('correos.create')): ?>
								<button wire:click='create' class="form-control btn btn-sm btn-primary float-right">
									Crear
								</button>
							<?php endif; ?>
						</div>
					</div>
                </div>
                <div class="card-body">
					<?php echo $__env->make("correos.livewire.$viewCreate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<table class="table">
						<thead>
							<tr>
								<th >ID</th>
								<th >Extensión</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<body>
							<?php $__currentLoopData = $correos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $correo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td ><?php echo e($correo->id); ?></td>
									<td class="col-md-6" ><?php echo e($correo->name); ?></td>
									<td class="col-md-1">
										<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acción</button>
											<div class="dropdown-menu">
												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('correos.show')): ?>
													<a class="dropdown-item" wire:click='show(<?php echo e($correo->id); ?>)'>Ver</a>                   
												<?php endif; ?>
												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('correos.edit')): ?>
													<a class="dropdown-item" wire:click='edit(<?php echo e($correo->id); ?>)'>Editar</a>
												<?php endif; ?>
												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('correos.destroy')): ?>
													<button class="dropdown-item" wire:click='destroy(<?php echo e($correo->id); ?>)'>
													Eliminar
													</button>
												<?php endif; ?>
											</div>
									</td>
								</tr>
								<?php if( $idCorreo == $correo->id): ?>
									<?php echo $__env->make("correos.livewire.$viewCrut", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<tr></tr>
						</body>
					</table>
                   <?php echo e($correos->render()); ?>

                </div>
            </div>
		</div>
	</div>
</div>

<?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/correos/livewire/correo-component.blade.php ENDPATH**/ ?>