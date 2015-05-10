<div class="paises form">
<?php echo $form->create('Pais');?>
	<fieldset>
	<?php
		echo $form->input('id');
		echo $form->input('nombre');
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>