

<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('datos-personales-component')->html();
} elseif ($_instance->childHasBeenRendered('TmFj94y')) {
    $componentId = $_instance->getRenderedChildComponentId('TmFj94y');
    $componentTag = $_instance->getRenderedChildComponentTagName('TmFj94y');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('TmFj94y');
} else {
    $response = \Livewire\Livewire::mount('datos-personales-component');
    $html = $response->html();
    $_instance->logRenderedChild('TmFj94y', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/users/datosPersonales.blade.php ENDPATH**/ ?>