

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	Rol
                </div>

                <div class="card-body">
                   <p><strong>Nombre: </strong><?php echo e($role->name); ?></p>
                   <p><strong>Slug: </strong><?php echo e($role->slug); ?></p>
                   <p><strong>Descripcion: </strong><?php echo e($role->description); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/roles/show.blade.php ENDPATH**/ ?>