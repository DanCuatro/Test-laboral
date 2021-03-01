<div class="card-body">
    
    <?php for($i=0;$i<count($seccionArray);$i++): ?>
        <div class="card">
           
            
            <?php if($seccionArray[$i][2]==0): ?>
                <div class="card-header alert-success">
                    Sección <?php echo e($i+1); ?>

                    <?php echo e($seccionArray[$i][0]); ?>

                </div>
            <?php elseif($seccionArray[$i][2]==1): ?> 
                <div class="card-header">
                    Sección <?php echo e($i+1); ?>:
                    <?php echo e($seccionArray[$i][0]); ?>

                </div>
                <div class="card-body con container">
                    <?php if($seccionArray[$i][1]==null): ?>
                        <?php for($x=0;$x<count(($seccionArray[$i][3]));$x++): ?>

                        <div class="row">
                            <div class="col-md-9"><?php echo e($x+$numeroPregunta); ?> <?php echo e($seccionArray[$i][3][$x][1]); ?></div>
                            <div class="col-md-3">
                                <h2><p class="clasificacion">
                                    <?php for($reactivo=4;$reactivo>=0;$reactivo--): ?><input id="<?php echo e($x+1); ?><?php echo e($reactivo); ?>" type="radio" name="<?php echo e($x+($i*10)+1); ?>" value="<?php echo e($reactivo); ?>" wire:model="item.<?php echo e($x); ?>"><label for="<?php echo e($x+1); ?><?php echo e($reactivo); ?>">★</label><?php endfor; ?>
                                </p></h2>
                                <?php $__errorArgs = ['item.'.$x];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span style="color: red;"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <?php endfor; ?>
                        <div class="row">
                            <div class="offset-9 col-md-3">
                                <h2><button wire:click="StorSection(<?php echo e($i); ?>)" class="btn btn-primary">Siguiente</button></h2>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-md-9">¿<?php echo e($seccionArray[$i][1]); ?>?</div>
                            <div class="col-md-3">
                                <div class="col-sm-10">
                                    <div class="form-check">
                                      <input value="si" class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" checked wire:model="respuesta">
                                      <label class="form-check-label" for="gridRadios1">
                                        <h1>Si</h1>
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input value="no" class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" wire:model="respuesta">
                                      <label class="form-check-label" for="gridRadios2">
                                        <h1>No</h1>
                                      </label>
                                    </div>
                                    <?php $__errorArgs = ['respuesta'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="offset-9 col-md-3">
                                <h2><button wire:click="Restriccion(<?php echo e($i); ?>)" class="btn btn-primary">Siguiente</button></h2>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php elseif($seccionArray[$i][2]==2): ?> 
                <div class="card-header">
                    Sección <?php echo e($i+1); ?>

                </div>
            <?php endif; ?>

        </div>
    <?php endfor; ?>

</div><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/cuestionario/livewire/cuestionario/cuestionario-resolver.blade.php ENDPATH**/ ?>