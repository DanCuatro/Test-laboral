
<?php $__env->startSection('styles'); ?>
<style>
#form {
    width: 250px;
    margin: 0 auto;
    height: 50px;
  }
  
  #form p {
    text-align: center;
  }
  
  #form label {
    font-size: 20px;
  }
  
  input[type="radio"] {
    display: none;
  }
  
  label {
    color: grey;
  }
  
  .clasificacion {
    direction: rtl;
    unicode-bidi: bidi-override;
  }
  
  label:hover,
  label:hover ~ label {
    color: orange;
  }
  
  input[type="radio"]:checked ~ label {
    color: orange;
  }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cuestionario-component')->html();
} elseif ($_instance->childHasBeenRendered('ll1R1yV')) {
    $componentId = $_instance->getRenderedChildComponentId('ll1R1yV');
    $componentTag = $_instance->getRenderedChildComponentTagName('ll1R1yV');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ll1R1yV');
} else {
    $response = \Livewire\Livewire::mount('cuestionario-component');
    $html = $response->html();
    $_instance->logRenderedChild('ll1R1yV', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/cuestionario/contestar.blade.php ENDPATH**/ ?>