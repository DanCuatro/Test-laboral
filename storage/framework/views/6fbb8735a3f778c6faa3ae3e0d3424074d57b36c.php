<br>
<div class="form-group row" id="home">
    <div class="col-md-2">
        <select wire:model="idPeriodo" class="form-control">
            <option>--Seleccionar--</option>
            <?php $__currentLoopData = $listaPeriodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($periodo->id); ?>"><?php echo e($periodo->periodoString); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-2">
        <select wire:model="agrupacion" class="form-control">
            <option value="Cuestionario">Total</option>
            <option value="Categori">Categoria</option>
            <option value="Dominio">Dominio</option>
        </select>
    </div>
    <?php if($listaCategoria!=null): ?>
    <div class="col-md-2">
        <select wire:model="subAgrupacion" class="form-control">
            <option>--Seleccionar--</option>
            <?php $__currentLoopData = $listaCategoria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <option value="<?php echo e($categoria->id); ?>"><?php echo e($categoria->nombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <?php endif; ?>
    <?php if($listaDomonio!=null): ?>
    <div class="col-md-2">
        <select wire:model="subAgrupacion" class="form-control">
            <option>--Seleccionar--</option>
            <?php $__currentLoopData = $listaDomonio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dominio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($dominio->id); ?>"><?php echo e($dominio->nombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/graficos/livewire/nav-link/general.blade.php ENDPATH**/ ?>