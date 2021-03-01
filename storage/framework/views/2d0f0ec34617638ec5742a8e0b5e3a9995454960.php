
<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('area-component')->html();
} elseif ($_instance->childHasBeenRendered('ABE4JUN')) {
    $componentId = $_instance->getRenderedChildComponentId('ABE4JUN');
    $componentTag = $_instance->getRenderedChildComponentTagName('ABE4JUN');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ABE4JUN');
} else {
    $response = \Livewire\Livewire::mount('area-component');
    $html = $response->html();
    $_instance->logRenderedChild('ABE4JUN', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/areas/area.blade.php ENDPATH**/ ?>