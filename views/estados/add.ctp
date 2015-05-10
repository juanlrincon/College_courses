<div class="estados form">
<?php echo $form->create('Estado');?>
	<fieldset>
	<?php
		echo $form->input('pais_id', array('label' =>'País', 'empty' => '-- Seleccione --'));
		echo $form->input('nombre', array('label' =>'Estado', 'maxLength' => 50));
	?>
	</fieldset>
<?php echo $form->end('Añadir');?>
</div>