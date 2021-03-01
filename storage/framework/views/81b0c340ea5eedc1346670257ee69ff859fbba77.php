<div class="form-group">
	<?php echo e(Form::label('name','Nombre del Rol')); ?>

	<?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

</div>
<div class="form-group">
	<?php echo e(Form::label('slug','URL Amigable')); ?>

	<?php echo e(Form::text('slug', null, ['class' => 'form-control'])); ?>

</div>
<div class="form-group">
	<?php echo e(Form::label('description','Descripcion')); ?>

	<?php echo e(Form::textarea('description', null, ['class' => 'form-control'])); ?>

</div>

<hr>

<h3>Permiso Especial</h3>

<div class="form-group">
	<label><?php echo e(Form::radio('special', 'all-access')); ?> Acceso total</label>
	<label><?php echo e(Form::radio('special', 'no-access')); ?> Ningun Acceso</label>	
</div>

<h3>Lista de Permisos</h3>
<div class="Form">
	<ul class="list-unstyled">
		<div class="<?php echo e($viejoTitulo=''); ?>" ></div>
		<?php for($i=0;$i<count($permissions);$i++): ?>
			<div class="<?php echo e($nuevoTitulo=''); ?>" ></div>
				<?php for($x=0;$x<strlen($permissions[$i]->slug)-1;$x++): ?>
					<?php if($permissions[$i]->slug[$x]!='.'): ?>
						<div class="<?php echo e($nuevoTitulo=$nuevoTitulo.$permissions[$i]->slug[$x]); ?>" ></div>
					<?php else: ?> 
						<div class="<?php echo e($x=strlen($permissions[$i]->slug)-1); ?>"></div>
					<?php endif; ?>
				<?php endfor; ?>
				<?php if($nuevoTitulo!=$viejoTitulo): ?>
					<h4><?php echo e($nuevoTitulo); ?></h4>
					<div class="<?php echo e($viejoTitulo=$nuevoTitulo); ?>" ></div>
					<div class="<?php echo e($nuevoTitulo=''); ?>" ></div>
				<?php endif; ?>
			<li>
				<label>
					<?php echo e(Form::checkbox('permissions[]',$permissions[$i]->id, null)); ?>

					<?php echo e($permissions[$i]->name); ?>

					<em>( <?php echo e($permissions[$i]->description ?: 'N/A'); ?> )</em>
				</label>
			</li>
		<?php endfor; ?>
	</ul>
</div>

<div class="form-group">
	<?php echo e(Form::submit('Guardar', ['class' => 'btn  btn-sm btn-primary'])); ?>

</div> <?php /**PATH C:\xampp\htdocs\Laravel\New testlaboral\resources\views/roles/partials/form.blade.php ENDPATH**/ ?>