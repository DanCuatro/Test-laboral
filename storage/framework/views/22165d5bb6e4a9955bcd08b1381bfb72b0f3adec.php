<tr> 
    <td colspan="5" class="alert alert-primary"> 
        <div>
            <h2 class="text-center">Datos Complementarios</h2>
            <div class="form-group">
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">
                        Tipo de Contratación
                    </label>
            
                    <div class="col-md-6">
                        <select wire:model="TiposContratacion" class="form-control">
                            <option></option>
                            <?php $__currentLoopData = $catTiposContratacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['TiposContratacion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: #d90000"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">
                        Tipo de Personal
                    </label>
            
                    <div class="col-md-6">
                        <select wire:model="TiposPersonal" class="form-control">
                            <option></option>
                            <?php $__currentLoopData = $catTiposPersonal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['TiposPersonal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: #d90000"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">
                        Jornada de Trabajo
                    </label>
            
                    <div class="col-md-6">
                        <select wire:model="JornadaTrabajo" class="form-control">
                            <option></option>
                            <?php $__currentLoopData = $catJornadaTrabajo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['JornadaTrabajo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: #d90000"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="form-group row offset-lg-4 col-lg-4">
                    <button wire:click='updateComplemento' class="form-control col-lg-6 btn btn-sm btn-primary">Guardar</button>
                    <button wire:click='defaultView' class="form-control col-lg-6 btn btn-sm btn-danger">Cancelar</button>
                </div>
            
                </div>
            </div>
        </div>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/users/livewire/navegador/datosComplementario.blade.php ENDPATH**/ ?>