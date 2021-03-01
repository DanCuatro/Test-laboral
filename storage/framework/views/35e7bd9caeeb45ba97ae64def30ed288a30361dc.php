<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Cuestionario <?php echo e($fecha->format('Y')); ?></h1>
            <h4 class="text-center"><?php echo e($periodoString); ?></h4>
        </div>
        <?php echo $__env->make("cuestionario.livewire.cuestionario.$vista", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/cuestionario/livewire/cuestionario-component.blade.php ENDPATH**/ ?>