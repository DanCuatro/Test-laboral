<div class="row">
    <div class="col-12">
        <h1><?php echo e($apPaterno." ".$apMaterno." ".$name); ?></h1>
    </div>
    <div class="col-md-12 row ">
        
        <div class="col-md-10">
            <table class="table table-bordered table-sm table-responsive-lg ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" colspan="3">Categoría</th>
                        <th scope="col" colspan="2">Dominio</th>
                        <th scope="col">Dimensión</th>
                        <th scope="col">ítem</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th width="1.8%" scope="row" title="Calificacion Total:<?php echo e($arrayCaDoDiCuestionario[0]); ?>" rowspan="<?php echo e($arrayCaDoDiCuestionario[3]); ?>" style="background-color:rgb(<?php echo e($arrayCaDoDiCuestionario[1][0]); ?>,<?php echo e($arrayCaDoDiCuestionario[1][1]); ?>,<?php echo e($arrayCaDoDiCuestionario[1][2]); ?>)"></th>
                        
                        <?php for($i=0;$i<count($arrayCaDoDiCuestionario[2]);$i++): ?>
                            <?php if($i!=0): ?><tr><?php endif; ?> 
                                <th title="Calificacion Total:<?php echo e($arrayCaDoDiCuestionario[2][$i][1]); ?>" width="1.5%" scope="row" rowspan="<?php echo e($arrayCaDoDiCuestionario[2][$i][4]); ?>" style="background-color:rgb(<?php echo e($arrayCaDoDiCuestionario[2][$i][2][0]); ?>,<?php echo e($arrayCaDoDiCuestionario[2][$i][2][1]); ?>,<?php echo e($arrayCaDoDiCuestionario[2][$i][2][2]); ?>,0.5)"></th>
                                <th title="Calificacion Total:<?php echo e($arrayCaDoDiCuestionario[2][$i][1]); ?>" scope="row" rowspan="<?php echo e($arrayCaDoDiCuestionario[2][$i][4]); ?>" ><?php echo e($arrayCaDoDiCuestionario[2][$i][0]); ?></th>
                            <?php for($x=0;$x<count($arrayCaDoDiCuestionario[2][$i][3]);$x++): ?>
                                <?php if($x!=0): ?><tr><?php endif; ?>
                                    <th title="Calificacion Total:<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][1]); ?>" width="1.5%" scope="row" rowspan="<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][4]); ?>" style="background-color:rgb(<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][2][0]); ?>,<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][2][1]); ?>,<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][2][2]); ?>,0.5)"></th>
                                    <th title="Calificacion Total:<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][1]); ?>" scope="row" rowspan="<?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][4]); ?>"><?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][0]); ?></th>
                                <?php for($y=0;$y<count($arrayCaDoDiCuestionario[2][$i][3][$x][3]);$y++): ?>
                                    <?php if($y!=0): ?><tr><?php endif; ?>
                                    <th scope="row"><?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][3][$y][0]); ?></th>
                                    <td><?php echo e($arrayCaDoDiCuestionario[2][$i][3][$x][3][$y][1]); ?></td>
                                    </tr>
                                <?php endfor; ?>
                            <?php endfor; ?>
                        <?php endfor; ?>
                    <tr>
                        <th colspan="6" scope="row" title="Calificacion Total:<?php echo e($arrayCaDoDiCuestionario[0]); ?>" style="background-color:rgb(<?php echo e($arrayCaDoDiCuestionario[1][0]); ?>,<?php echo e($arrayCaDoDiCuestionario[1][1]); ?>,<?php echo e($arrayCaDoDiCuestionario[1][2]); ?>,0.5)">Calificacion Total:</th>
                        <th ><?php echo e($arrayCaDoDiCuestionario[0]); ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php for($i=0;$i<count($arrayRespuestaCuestionario);$i++): ?>
    <div class="col-md-6">
        <div clas="card">
            <div class="card-header alert-dark">Sección <?php echo e($arrayRespuestaCuestionario[$i][0]); ?>: <?php echo e($arrayRespuestaCuestionario[$i][1]); ?></div>
            <div class="card-body con container">
                <?php for($x=0;$x<count($arrayRespuestaCuestionario[$i][2]);$x++): ?>
                <div class="row">
                    <div class="col-12 col-md-8"><?php echo e($arrayRespuestaCuestionario[$i][2][$x][0]); ?> <?php echo e($arrayRespuestaCuestionario[$i][2][$x][1]); ?></div>
                    <div class="col-md-auto">
                        <h2><p><!--    
                            <?php for($y=0;$y<=$arrayRespuestaCuestionario[$i][2][$x][2];$y++): ?>
                                --><span style="color: orange">★</span><!--
                            <?php endfor; ?>
                            <?php for($y=0;$y<4-$arrayRespuestaCuestionario[$i][2][$x][2];$y++): ?>
                                --><span style="color: grey">★</span><!--
                            <?php endfor; ?> 
                        --></p></h2>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
    <?php endfor; ?>
</div>

<?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/users/livewire/navegador/cuestionario.blade.php ENDPATH**/ ?>