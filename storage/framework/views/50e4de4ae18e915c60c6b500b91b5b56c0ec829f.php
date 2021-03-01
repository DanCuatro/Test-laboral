<br>
<div class="container">

    <div class="row">
        <div class="form-group col-md-2">
            <select wire:model="punteroDelimitado" class="form-control">
                <?php for($i=0;$i<count($modelosDeControl);$i++): ?>
                <option value="<?php echo e($i); ?>"><?php echo e($modelosDeControl[$i]["name"]); ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <?php if($modelosDeControl[$punteroDelimitado]["modelos"]!=null): ?>
        <div class="form-group col-md-2">
            <select wire:model="punteroDelimitadoInterno" class="form-control">
                <?php for($i=0;$i<count($modelosDeControl[$punteroDelimitado]["modelos"]);$i++): ?>
                <option value="<?php echo e($i); ?>"><?php echo e($modelosDeControl[$punteroDelimitado]["modelos"][$i]["name"]); ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <button wire:click="AgregarEtiquetaLimitante" class="btn btn-primary">Agregrar</button>
        </div>
        <?php endif; ?>
    </div>
    <div class="form-group form-check row">
        <div class="alert alert-secondary col-md-11 row">
            <?php for($i=0;$i<count($etiquetasLimitadores);$i++): ?>
                <?php for($x=0;$x<count($etiquetasLimitadores[$i]['ids']);$x++): ?>
                    <h5><span class="badge" style="color:#fff; background-color:#1883BA;"><?php echo e($etiquetasLimitadores[$i]['ids'][$x]['name']); ?> <a wire:click="SacarEtiqueta(<?php echo e($i); ?>,<?php echo e($x); ?>)"><?php echo $__env->make("layouts.equis", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></a></span><h5 style="width:5px;"></h5></h5> 
                <?php endfor; ?>
            <?php endfor; ?>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/graficos/livewire/nav-link/delimitaciones.blade.php ENDPATH**/ ?>