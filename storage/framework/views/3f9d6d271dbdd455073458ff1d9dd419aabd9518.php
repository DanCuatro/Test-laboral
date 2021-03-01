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
											<li>Genero: <?php $__currentLoopData = $cat_genero; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <b><?php echo e($genero->name); ?></b>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></li>
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
							<?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr  class="<?php if(!$usuario->estado): ?> alert-secondary <?php endif; ?>">
									<td ><?php echo e($usuario->id); ?></td>
									<td class="col-md-6" ><?php echo e($usuario->name); ?></td>
									<td class="col-md-1">
										<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acción</button>
											<div class="dropdown-menu">
												<?php if($this->permisosCrud('show',$usuario->id)): ?>
													<a class="dropdown-item" wire:click='show(<?php echo e($usuario->id); ?>)'>Ver</a>                   
												<?php endif; ?>
												<?php if($this->permisosCrud('show',$usuario->id)): ?>
													<a class="dropdown-item" wire:click='cuestionarios(<?php echo e($usuario->id); ?>)'>Cuestionrios</a>
												<?php endif; ?>
												<?php if($this->permisosCrud('edit',$usuario->id)): ?>
													<a class="dropdown-item" wire:click='edit(<?php echo e($usuario->id); ?>)'>Editar</a>
												<?php endif; ?>
												<?php if($this->permisosCrud('editCom',$usuario->id)): ?>
													<a class="dropdown-item" wire:click='editComplemento(<?php echo e($usuario->id); ?>)' title="Datos Complementarios">Datos Com</a>
												<?php endif; ?>
												<?php if($this->permisosCrud('editRol',$usuario->id)): ?>
													<a class="dropdown-item" wire:click='editRoles(<?php echo e($usuario->id); ?>)'>Roles</a>
												<?php endif; ?>
												<?php if($this->permisosCrud('destroy',$usuario->id)): ?>
													<a class="dropdown-item" wire:click='BajaAlta(<?php echo e($usuario->id); ?>)'><?php if($usuario->estado): ?> Baja <?php else: ?> Alta <?php endif; ?></a>
												<?php endif; ?>
											</div>
									</td>
								</tr>
								<?php if( $idUsuario == $usuario->id): ?>
									<?php echo $__env->make("users.livewire.navegador.$viewCrut", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<tr></tr>
						</body>
					</table>
                   <?php echo e($usuarios->links()); ?>

                </div>
            </div>
		</div>
	</div>
</div><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/users/livewire/navegador/navegar.blade.php ENDPATH**/ ?>