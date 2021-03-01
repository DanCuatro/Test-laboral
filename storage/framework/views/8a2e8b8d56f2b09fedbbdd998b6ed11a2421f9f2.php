<div class="form-group row">
    <label class="col-lg-3 col-form-label text-md-right">
        <b>Extensión</b>
    </label>
    <div class="col-lg-6">
        <input wire:model='name' type="text" class="form-control  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> ">
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

<div class="form-group row offset-lg-4 col-lg-4">
    <button class="form-control col-lg-6 btn btn-sm btn-primary" wire:click='<?php echo e($botonStor); ?>'>Guardar</button>
    <button class="form-control col-lg-6 btn btn-sm btn-danger" wire:click='defaultView'>Cancelar</button>
    <br><br>
</div><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/correos/livewire/form.blade.php ENDPATH**/ ?>