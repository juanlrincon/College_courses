<div class="estados form">
<?php echo $form->create('Estado');?>
	<fieldset>
	<?php
	    echo $form->input('id');
		echo $form->input('pais_id', array('label' =>'País'));
		echo $form->input('nombre', array('label' =>'Estado'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>