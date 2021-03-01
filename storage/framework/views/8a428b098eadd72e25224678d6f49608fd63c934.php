
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>
  <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('grafico-component')->html();
} elseif ($_instance->childHasBeenRendered('cNmtq2X')) {
    $componentId = $_instance->getRenderedChildComponentId('cNmtq2X');
    $componentTag = $_instance->getRenderedChildComponentTagName('cNmtq2X');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('cNmtq2X');
} else {
    $response = \Livewire\Livewire::mount('grafico-component');
    $html = $response->html();
    $_instance->logRenderedChild('cNmtq2X', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/graficos/graficos.blade.php ENDPATH**/ ?>