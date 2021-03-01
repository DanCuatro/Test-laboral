<tr> 
    <td colspan="5" class="alert alert-primary"> 
        <div>
            <h4 class="text-center">Roles del Empleado</h4>
            <div class="form-group row">
                <label class="col-md-2 col-form-label text-md-right">
                    Roles
                </label>

                <div class="col-md-6">
                    <select wire:model="rolNuevo" class="form-control">
                        <option></option>
                        <?php $__currentLoopData = $cat_Roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['rolNuevo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: #d90000"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="col-md-3">
                    <button wire:click="AgregarRol" class="form-control col-lg-6 btn btn-sm btn-primary">Agregar</button>
                </div>
            </div>

            <div class="alert alert-primary row">
                <?php $__currentLoopData = $roles_Empleado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h5><span class="badge" style="color:#fff; background-color:#1883BA;"><?php echo e($role['name']); ?><a wire:click="QuitarRol(<?php echo e($role['id']); ?>,'<?php echo e($role['name']); ?>')"><?php echo $__env->make("layouts.equis", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a></span><h5 style="width:5px;"></h5></h5> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="form-group row offset-lg-4 col-lg-4">
                <button wire:click="updateRoles" class="form-control col-lg-6 btn btn-sm btn-primary">Guardar</button>
                <button wire:click='defaultView' class="form-control col-lg-6 btn btn-sm btn-danger">Cancelar</button>
            </div>
        </div>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/users/livewire/navegador/editRoles.blade.php ENDPATH**/ ?>