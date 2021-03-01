<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-9">
			<div class="card">
                <div class="card-header">
					<div class="row">
						<div class="col-lg-10"><h4>Campus</h4></div>
						<div class="col-lg-2">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('campus.create')): ?>
								<button wire:click='create' class="form-control btn btn-sm btn-primary float-right">
									Crear
								</button>
							<?php endif; ?>
						</div>
					</div>
                </div>
                <div class="card-body">
					<?php echo $__env->make("campus.livewire.$viewCreate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<table class="table">
						<thead>
							<tr>
								<th >ID</th>
								<th >Campus</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<body>
							<?php $__currentLoopData = $campus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="<?php if(!$campu->estado): ?> alert-secondary <?php endif; ?>">
									<td ><?php echo e($campu->id); ?></td>
									<td class="col-md-6" ><?php echo e($campu->name); ?></td>
									<td class="col-md-1">
										<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acción</button>
											<div class="dropdown-menu">
												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('campus.show')): ?>
													<a class="dropdown-item" wire:click='show(<?php echo e($campu->id); ?>)'>Ver</a>                   
												<?php endif; ?>
												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('campus.edit')): ?>
													<a class="dropdown-item" wire:click='edit(<?php echo e($campu->id); ?>)'>Editar</a>
												<?php endif; ?>
												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('campus.destroy')): ?>
													<button class="dropdown-item" wire:click='destroy(<?php echo e($campu->id); ?>)'>
														<?php if($campu->estado): ?> Baja <?php else: ?> Alta <?php endif; ?>
													</button>
												<?php endif; ?>
											</div>
									</td>
								</tr>
								<?php if( $idCampu == $campu->id): ?>
									<?php echo $__env->make("campus.livewire.$viewCrut", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<tr></tr>
						</body>
					</table>
                   <?php echo e($campus->render()); ?>

                </div>
            </div>
		</div>
	</div>
</div>

<?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/campus/livewire/campu-component.blade.php ENDPATH**/ ?>