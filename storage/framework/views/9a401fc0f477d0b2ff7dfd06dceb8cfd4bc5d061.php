<div class="container">
    <div class="row form-group">
        <?php if($contadorPuestos<2): ?>
        <div class="row col-lg-4">
            <label class="col-lg-5 col-form-label text-lg-right">Areas:</label>
            <div class="col-lg-7">
                <select wire:model="cat_ara" class="form-control <?php $__errorArgs = ['cat_ara'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option> </option>
                    <?php $__currentLoopData = $catalogo_area; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['cat_ara'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <div class="row col-lg-4">
            <label class="col-lg-5 col-form-label text-lg-right">Puestos:</label>
            <div class="col-lg-7">
                <select wire:model="cat_puesto" class="form-control <?php $__errorArgs = ['cat_puesto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <option> </option>
                    <?php if($catalogo_puesto!=null): ?>
                        <?php $__currentLoopData = $catalogo_puesto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    <?php endif; ?>
                </select>
                <?php $__errorArgs = ['cat_puesto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback" role="alert"><strong><?php echo e($message); ?></strong></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <?php if($user->userPuesto->count()<2 && $periodo->count()<2): ?> 
        <div class="row col-lg-4">
            <label class="col-lg-5 col-form-label text-lg-right">Fechas Ingreso:</label>
            <div class="col-lg-7">
                <input wire:model="fechaInicioPuesto" type="date" class="form-control" type="date">
            </div>
        </div>
        <?php endif; ?>
        <div class="col-lg-2">
            <!-- Button trigger modal -->
            <button type="button" class="form-control btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                Activar
            </button>
  
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Activar Puesto: <?php $__currentLoopData = $catalogo_puesto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($item->id==$cat_puesto): ?><?php echo e($item->name); ?><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-<?php $__currentLoopData = $catalogo_area; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($item->id==$cat_ara): ?><?php echo e($item->name); ?><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Está seguro que desea activar este Puesto (<?php $__currentLoopData = $catalogo_puesto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($item->id==$cat_puesto): ?><?php echo e($item->name); ?><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>) 
                        dentro de esta Área (<?php $__currentLoopData = $catalogo_area; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($item->id==$cat_ara): ?><?php echo e($item->name); ?><?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>)?</p>
                        <?php if($user->userPuesto->count()<2 && $periodo->count()<2): ?>  
                            <p><b>Advertencias: solo en los primeros dos puestos usted será capaz de ingresar la fecha desde la cual se desempeña en el mismo </b></p>
                        <?php endif; ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" wire:click='ActivarPuesto' data-dismiss="modal">Activar</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="alert alert-primary col-12">
            <h2>Usted llego al número límite de <b>Puestos</b> activos</h2> 
            <p>si desea activar otro puerto deberá Finalizar uno de los dos puestos activos </p>
        </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <?php $__currentLoopData = $puestosTrabajando; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title"><b><?php echo e($item['puesto']); ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo e($item['area']); ?></b></h6>
                <p class="card-text"><?php echo e($item['tiempo']); ?></p>
                <a wire:click="DesactivarPuesto(<?php echo e($item['id']); ?>)" class="btn btn-secondary">Finalizar</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</div><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/users/livewire/datosPersonales/nav-link/area.blade.php ENDPATH**/ ?>