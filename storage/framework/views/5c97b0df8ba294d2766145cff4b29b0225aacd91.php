<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a wire:click="CambiarMenu(0)" class="nav-link <?php if($menuEdicion[0]): ?>active <?php endif; ?>" id="datos-tab" data-toggle="tab" href="#datos" role="tab" aria-controls="datos" aria-selected="<?php echo e($menuEdicion[0]); ?>">Datos Personales</a>
        </li>
        <li class="nav-item">
          <a wire:click="CambiarMenu(1)" class="nav-link <?php if($menuEdicion[1]): ?>active <?php endif; ?>" id="area-tab" data-toggle="tab" href="#area" role="tab" aria-controls="area" aria-selected="<?php echo e($menuEdicion[1]); ?>">Area y Puestos</a>
        </li>
        <li class="nav-item">
          <a wire:click="CambiarMenu(2)" class="nav-link <?php if($menuEdicion[2]): ?>active <?php endif; ?>" id="email-tab" data-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="<?php echo e($menuEdicion[2]); ?>">Correo</a>
        </li>
        <li class="nav-item">
          <a wire:click="CambiarMenu(3)" class="nav-link <?php if($menuEdicion[3]): ?>active <?php endif; ?>" id="contraseña-tab" data-toggle="tab" href="#contraseña" role="tab" aria-controls="contraseña" aria-selected="<?php echo e($menuEdicion[3]); ?>">Contraseña</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade <?php if($menuEdicion[0]): ?> show active <?php endif; ?> " id="datos" role="tabpanel" aria-labelledby="datos-tab">
            <br><?php echo $__env->make("users.livewire.datosPersonales.nav-link.datosPersonales", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="tab-pane fade <?php if($menuEdicion[1]): ?> show active <?php endif; ?> " id="area" role="tabpanel" aria-labelledby="area-tab">
            <br><?php echo $__env->make("users.livewire.datosPersonales.nav-link.area", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
          <div class="tab-pane fade <?php if($menuEdicion[2]): ?> show active <?php endif; ?> " id="email" role="tabpanel" aria-labelledby="email-tab"><br>
            <br><?php echo $__env->make("users.livewire.datosPersonales.nav-link.correo", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
          <div class="tab-pane fade <?php if($menuEdicion[3]): ?> show active <?php endif; ?> " id="contraseña" role="tabpanel" aria-labelledby="contraseña-tab">
            <br><?php echo $__env->make("users.livewire.datosPersonales.nav-link.contraseña", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </div>
    </div>
    
</div>

<?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/users/livewire/datosPersonales/edit.blade.php ENDPATH**/ ?>