
<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('campu-component')->html();
} elseif ($_instance->childHasBeenRendered('KyNz6zj')) {
    $componentId = $_instance->getRenderedChildComponentId('KyNz6zj');
    $componentTag = $_instance->getRenderedChildComponentTagName('KyNz6zj');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('KyNz6zj');
} else {
    $response = \Livewire\Livewire::mount('campu-component');
    $html = $response->html();
    $_instance->logRenderedChild('KyNz6zj', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/campus/campu.blade.php ENDPATH**/ ?>