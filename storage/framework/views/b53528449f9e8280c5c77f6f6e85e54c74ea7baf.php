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
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('areas.create')): ?>
								<button wire:click='create' class="form-control btn btn-sm btn-primary float-right">
									Crear Area
								</button>
							<?php endif; ?>
						</div>
					</div>
                </div>
                <div class="card-body">
					<?php echo $__env->make("areas.livewire.$viewCreate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<table class="table">
						<thead>
							<tr>
								<th >ID</th>
								<th >Nombre</th>
								<th colspan="3">&nbsp;</th>
							</tr>
						</thead>
						<body>
							<?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="<?php if(!$area->estado): ?> alert-secondary <?php endif; ?>">
									<td ><?php echo e($area->id); ?></td>
									<td class="col-md-6" ><?php echo e($area->name); ?></td>
									<td class="col-md-1">
										<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acción</button>
											<div class="dropdown-menu">
												<?php if(Gate::check('areas.show') || Gate::check($area->name.'.areas.show')): ?>
													<a class="dropdown-item" wire:click='show(<?php echo e($area->id); ?>)'>Ver</a>                   
												<?php endif; ?>
												<?php if(Gate::check('areas.edit') || Gate::check($area->name.'.areas.edit')): ?>
													<a class="dropdown-item" wire:click='edit(<?php echo e($area->id); ?>)'>Editar</a>
												<?php endif; ?>
												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('areas.destroy')): ?>
													<a class="dropdown-item" wire:click='BajaAlta(<?php echo e($area->id); ?>)'> <?php if($area->estado): ?> Baja <?php else: ?> Alta <?php endif; ?> </a>
												<?php endif; ?>
											</div>
									</td>
								</tr>
								<?php if( $idArea == $area->id): ?>
									<?php echo $__env->make("areas.livewire.$viewCrut", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<tr></tr>
						</body>
					</table>
                   <?php echo e($areas->render()); ?>

                </div>
            </div>
		</div>
	</div>
</div>

<?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/areas/livewire/area-component.blade.php ENDPATH**/ ?>