
<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('correo-component')->html();
} elseif ($_instance->childHasBeenRendered('kQZg6sz')) {
    $componentId = $_instance->getRenderedChildComponentId('kQZg6sz');
    $componentTag = $_instance->getRenderedChildComponentTagName('kQZg6sz');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('kQZg6sz');
} else {
    $response = \Livewire\Livewire::mount('correo-component');
    $html = $response->html();
    $_instance->logRenderedChild('kQZg6sz', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/correos/correo.blade.php ENDPATH**/ ?>