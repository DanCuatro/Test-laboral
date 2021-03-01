
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cuestionario-asignado-component')->html();
} elseif ($_instance->childHasBeenRendered('ZCCweSw')) {
    $componentId = $_instance->getRenderedChildComponentId('ZCCweSw');
    $componentTag = $_instance->getRenderedChildComponentTagName('ZCCweSw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ZCCweSw');
} else {
    $response = \Livewire\Livewire::mount('cuestionario-asignado-component');
    $html = $response->html();
    $_instance->logRenderedChild('ZCCweSw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/cuestionario/asignar.blade.php ENDPATH**/ ?>