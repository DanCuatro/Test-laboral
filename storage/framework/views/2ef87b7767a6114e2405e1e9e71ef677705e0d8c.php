
<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('usuarios-component')->html();
} elseif ($_instance->childHasBeenRendered('2c4Ogso')) {
    $componentId = $_instance->getRenderedChildComponentId('2c4Ogso');
    $componentTag = $_instance->getRenderedChildComponentTagName('2c4Ogso');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2c4Ogso');
} else {
    $response = \Livewire\Livewire::mount('usuarios-component');
    $html = $response->html();
    $_instance->logRenderedChild('2c4Ogso', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/users/usuario.blade.php ENDPATH**/ ?>