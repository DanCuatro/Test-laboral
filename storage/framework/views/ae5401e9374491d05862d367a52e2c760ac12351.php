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
    <h3 class="offset-lg-4">Cambiar contraseña</h3>
    <br>
    <div class="row form-group">
        <label class="col-lg-4 col-form-label text-lg-right">Antigua Contraseña</label>
        <div class="col-lg-5">
            <input class="form-control <?php $__errorArgs = ['contraseña_antigua'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" wire:model="contraseña_antigua">
            <?php $__errorArgs = ['contraseña_antigua'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($message); ?></strong> </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-lg-4 col-form-label text-lg-right">Nueva Contraseña:</label>
        <div class="col-lg-5">
            <input class="form-control <?php $__errorArgs = ['contraseña_nueva'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" wire:model="contraseña_nueva">
            <?php $__errorArgs = ['contraseña_nueva'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($message); ?></strong> </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-lg-4 col-form-label text-lg-right">Confirmar Contraseña:</label>
        <div class="col-lg-5">
            <input class="form-control <?php $__errorArgs = ['contraseña_nueva_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="password" wire:model="contraseña_nueva_confirmation">
            <?php $__errorArgs = ['contraseña_nueva_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="invalid-feedback" role="alert"> <strong><?php echo e($message); ?></strong> </span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
    <button type="button" class="offset-lg-4 col-lg-3 btn btn-primary" wire:click="CambiarContraseña">Cambiar</button>
</div><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/users/livewire/datosPersonales/nav-link/contraseña.blade.php ENDPATH**/ ?>