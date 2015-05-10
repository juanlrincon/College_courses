<div class="areas form">
<?php echo $form->create('Area');?>
	<fieldset>
	<?php
	    echo $form->input('id');
		echo $form->input('nombre');
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>