<tr> 
    <td colspan="5"> 
        <div class="alert alert-primary">
            <h2><b><?php echo e($area->name); ?></b></h2>
            <div class="justify-content-center">
                <div class="col-md-10">
                    <?php if($puestosArreglo != null): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Puestos Activos</th>
                            </tr>
                            <tr>
                                <th>Puesto</th>
                                <th>No. Empleados</th>
                            </tr>
                        </thead>
                        <body>
                            <?php $__currentLoopData = $puestosArreglo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($puesto[0]); ?></td>
                                <td><?php echo e($puesto[2]); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </body>
                    </table>
                    <?php endif; ?>

                    <?php if($puestosArregloEliminados != null): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Puestos Inactivos</th>
                            </tr>
                            <tr>
                                <th >Puesto</th>
                                <th >No. Empleados</th>
                            </tr>
                        </thead>
                        <body>
                            <?php $__currentLoopData = $puestosArregloEliminados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($puesto[0]); ?></td>
                                <td><?php echo e($puesto[2]); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </body>
                    </table>
                    <?php endif; ?>

                </div>
            </div>

        </div>
    </td>
</tr><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/areas/livewire/show.blade.php ENDPATH**/ ?>