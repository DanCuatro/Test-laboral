<tr> 
    <td colspan="5" class="alert alert-primary"> 
        <div>
            <div class="offset-1 form-group">
                <?php if($user!=null): ?>
                    <p><strong>Nombre: </strong><?php echo e($user->apellido_P); ?> <?php echo e($user->apellido_M); ?> <?php echo e($user->name); ?></p>
                    <p><strong>Email: </strong><?php echo e($user->email); ?></p>
                    <p><strong>Fecha de Nacimiento: </strong><?php echo e($user->fecha_nacimiento); ?></p>
                    <p><strong>Genero: </strong><?php if($user->cat_genero!=null): ?><?php echo e($user->cat_genero->name); ?><?php endif; ?></p>
                    <p><strong>Estado Civil: </strong><?php if($user->cat_estados_civil!=null): ?><?php echo e($user->cat_estados_civil->name); ?><?php endif; ?></p>
                    <p><strong>Nivel de Estudio: </strong><?php if($user->cat_nivel_estudio!=null): ?><?php echo e($user->cat_nivel_estudio->name); ?><?php endif; ?></p>
                    <p><strong>Tipo de Contratación: </strong><?php if($user->cat_tipos_contratacion!=null): ?><?php echo e($user->cat_tipos_contratacion->name); ?><?php endif; ?></p>
                    <p><strong>Tipo de Personal: </strong><?php if($user->cat_tipos_personal!=null): ?><?php echo e($user->cat_tipos_personal->name); ?><?php endif; ?></p>
                    <p><strong>Jornada: </strong><?php if($user->cat_jornada_trabajo!=null): ?><?php echo e($user->cat_jornada_trabajo->name); ?><?php endif; ?></p>
                    <p><strong>Experiencia Laboral: </strong><?php echo e($exp_Lavoral->format('y')); ?> Año(s) con <?php echo e($exp_Lavoral->format('m')); ?> Mese(s) y <?php echo e($exp_Lavoral->format('d')); ?> Dia(s)</p>
                <?php endif; ?>
            </div>
            <div class="offset-1 form-group">
                <ul>
                    <?php $__currentLoopData = $puestos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puesto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><p>Periodo laboran en <strong><?php echo e($puesto['puesto']); ?></strong> en el area de <strong><?php echo e($puesto['area']); ?></strong>: <?php echo e($puesto['expLaboral']->format('y')); ?> Año(s) con <?php echo e($puesto['expLaboral']->format('m')); ?> Mese(s) y <?php echo e($puesto['expLaboral']->format('d')); ?> Dia(s)</p></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </td>
</tr><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/users/livewire/navegador/show.blade.php ENDPATH**/ ?>