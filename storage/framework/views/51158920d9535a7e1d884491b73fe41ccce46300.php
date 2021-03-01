<div class="">
    <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">
            <b>Nombre</b>
        </label>
        <div class="col-md-5">
            <input wire:model="name" type="text" class="form-control  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 col-form-label text-md-right">
            <b>Puesto</b>
        </label>
        <div class="col-md-5">
            <input wire:model='nuevoPuesto' type="text" class="form-control  <?php $__errorArgs = ['nuevoPuesto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
            <?php $__errorArgs = ['nuevoPuesto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <?php echo $__env->make("areas.livewire.form.$viewPuesto", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    
    <?php if($puestosArreglo != null): ?>
    <hr>
    <div class="row offset-md-1">
        <ol>
        <?php $__currentLoopData = $puestosArreglo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="col-md-7">
                <li ><?php echo e($puesto[0]); ?></li> 
                </div>
                <div class="col-md-1">
                    <button wire:click="editarPuesto('<?php echo e($puesto[0]); ?>','<?php echo e($puesto[1]); ?>')" class="btn"><img width="20px" height="20px" src= '/images/edit.svg'></button>
                </div>
                <div class=" offset-md-1 col-md-1">
                    <button wire:click="eliminarPuesto('<?php echo e($puesto[0]); ?>','<?php echo e($puesto[1]); ?>')" class="btn"><img width="20px" height="20px" src= '/images/delete.svg'></button>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    </div>
    <?php endif; ?>
    <?php if($puestosArregloEliminados != null): ?>
    <hr>
    <div class="row offset-md-1">
        <ol>
        <?php $__currentLoopData = $puestosArregloEliminados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="col-md-8">
                <li ><?php echo e($puesto[0]); ?></li> 
                </div>
                <div class="col-md-1">
                    <button wire:click="altaPuesto('<?php echo e($puesto[0]); ?>','<?php echo e($puesto[1]); ?>')" class="btn"><img width="20px" height="20px" src= '/images/create.svg'></button>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
    </div>
    <?php endif; ?>
    <div class="form-group row offset-lg-4 col-lg-4 offset-md-1 col-md-12">
        <button class="form-control col-md-6 btn btn-sm btn-primary" wire:click='<?php echo e($botonStor); ?>'>Guardar</button>
        <button class="form-control col-md-6 btn btn-sm btn-danger" wire:click='defaultView'>Cancelar</button>
    </div>
</div><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/areas/livewire/form/form.blade.php ENDPATH**/ ?>