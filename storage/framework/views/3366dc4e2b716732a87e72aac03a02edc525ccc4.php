<tr> 
    <td colspan="5" class="col-sm-10 alert alert-primary"> 
        <div>
            <div class="form-group ">
                <h3>Cuestionarios Resueltos</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Periodo</th>
                            <th colspan="3">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($arrayCuestionarios!=null): ?>
                        <?php $__currentLoopData = $arrayCuestionarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item[0]): ?>
                                <tr class="table-success">
                                    <td class="col-md-6"><?php echo e($item[1]); ?></td>
                                    <td >
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acción</button>
										<div class="dropdown-menu">
                                            <a class="dropdown-item" wire:click='verCuestionario(<?php echo e($item[2]); ?>)'>Ver</a>                   
                                            <a class="dropdown-item" href="<?php echo e(route('users.cuestionario',$item[2])); ?>">PDF</a>
										</div>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <tr class="table-danger">
                                    <td class="col-md-6"><?php echo e($item[1]); ?></td>
                                    <td ><strong>N/P</strong></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </td>
</tr><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/users/livewire/navegador/cuestionarios.blade.php ENDPATH**/ ?>