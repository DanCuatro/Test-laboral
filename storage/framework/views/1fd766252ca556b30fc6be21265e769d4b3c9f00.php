<div class="container">
    <?php if($mensaje!=null): ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 alert alert-primary">
                <p style="text-align: center;"><?php echo e($mensaje); ?></p>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($numeroPeticiones<1): ?>
    <h3 style="text-align: center;">Cambiar Correo</h3>
    <br>
        <div class="row form-group">
            <label class="col-lg-3 col-form-label text-lg-right">Correo</label>
            <div class="input-group col-lg-6">
                <input wire:model="base" class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" >
                <div class="input-group-prepend "> <div class="input-group-text" id="btnGroupAddon">@</div> </div>
                <select  wire:model="extencion" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>  <?php $__errorArgs = ['extencion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="extencion">
                    <option></option>
                    <?php $__currentLoopData = $correo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($message); ?></strong> </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php $__errorArgs = ['extencion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($message); ?></strong> </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
        <button wire:click="CambiarCorreo" class="offset-lg-3 col-lg-3 btn btn-primary">Cambiar</button>
    <?php else: ?>
    <div class="card text-center">
        <div class="card-header">
            Petición
        </div>
        <div class="card-body">
          <h5 class="card-title">Cambio de Correo</h5>
          <p class="card-text" style="text-align: justify;">Usted ha hecho la petición de cambiar su correo actual (<?php echo e($peticion->user->email); ?>) por el siguiente <?php echo e($peticion->email); ?>, el correo que actualmente usa seguirá siendo con el cual podrá entrar a esta página hasta que usted acepte la petición envía a su nuevo correo, si no ha recibido el mensaje de verificación favor de usar el siguiente enlace para reenviar el mensaje </p>
          <a wire:click="cancelarPeticion(<?php echo e($peticion->id); ?>)" class="btn btn-primary">Cancelar Petición</a>
        </div>
        <div class="card-footer text-muted">
            <?php echo e($peticion->created_at); ?>

        </div>
      </div>
    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/users/livewire/datosPersonales/nav-link/correo.blade.php ENDPATH**/ ?>