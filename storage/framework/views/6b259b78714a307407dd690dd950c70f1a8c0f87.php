<div class="col-md-12">
   <div class="card">
      <div class="card-header">
         <h1 class="text-center">Cuestionario <?php echo e($fecha->format('Y')); ?></h1>
         <h4 class="text-center"><?php echo e($periodoString); ?></h4>
      </div>
      <div class="card-body">
         
      <div class="form-group row">
         <label for="name" class="col-md-4 col-form-label text-md-right">Fecha de inicio</label>

         <div class="col-md-6">
               <input class="form-control" type="date" min="<?php echo e($fecha->format('Y-m-d')); ?>" max="<?php echo e($Limite->format('Y-m-d')); ?>" wire:model="fechaInicio" <?php echo e($habilidad); ?>>
               <?php $__errorArgs = ['fechaInicio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
         </div>
      </div>

      <div class="form-group row">
         <label for="name" class="col-md-4 col-form-label text-md-right">Fecha Limite</label>

         <div class="col-md-6">
               <input class="form-control" type="date" min="<?php echo e($fecha->format('Y-m-d')); ?>" max="<?php echo e($Limite->format('Y-m-d')); ?>" wire:model="fechaLimite">
               <?php $__errorArgs = ['fechaLimite'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
         </div>
      </div>
      <div class="form-group row">
         <div class="col-md-6 offset-md-4">
            <div class="<?php echo e($colorAlerta); ?>">
               <h5 class="text-center"><?php echo e($errorFecha); ?></h5>
            </div>
         </div>
      </div>
      <div class="form-group row mb-0">
         <div class="col-md-6 offset-md-4">
            <button class="btn btn-primary" wire:click="guardar">Asignar</button>
         </div>
      </div>

      </div>
   </div>
</div><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/cuestionario/livewire/cuestionario-asignado-component.blade.php ENDPATH**/ ?>