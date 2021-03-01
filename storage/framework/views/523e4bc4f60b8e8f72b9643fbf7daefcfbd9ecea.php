<br>
<div class=" row form-group col-md-2">
    <select wire:model="punteroSegmento" class="form-control">
        <?php for($i=0;$i<count($modelosDeControl);$i++): ?>
            <option value="<?php echo e($i); ?>"><?php echo e($modelosDeControl[$i]["name"]); ?></option>
        <?php endfor; ?>
    </select>
</div>

<div class=" form-group form-check row" id="home">
    <?php if($modelosDeControl[$punteroSegmento]["modelos"]!=null): ?>
        <?php for($i=0;$i<count($modelosDeControl[$punteroSegmento]["modelos"]);$i++): ?>
        <div class="form-check form-check-inline">
            <input wire:model="idSegmento.<?php echo e($i); ?>" class="form-check-input " type="checkbox" id="<?php echo e($modelosDeControl[$punteroSegmento]["modelos"][$i]["name"]); ?><?php echo e($modelosDeControl[$punteroSegmento]["modelos"][$i]["id"]); ?>" value="<?php echo e($modelosDeControl[$punteroSegmento]["modelos"][$i]["id"]); ?>">
            <label class="form-check-label " for="<?php echo e($modelosDeControl[$punteroSegmento]["modelos"][$i]["name"]); ?><?php echo e($modelosDeControl[$punteroSegmento]["modelos"][$i]["id"]); ?>"><?php echo e($modelosDeControl[$punteroSegmento]["modelos"][$i]["name"]); ?></label>
        </div>
        <?php endfor; ?>
    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/graficos/livewire/nav-link/segmentaciones.blade.php ENDPATH**/ ?>