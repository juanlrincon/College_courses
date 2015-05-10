<div class="areas form">
<?php echo $form->create('Area');?>
	<fieldset>
	<?php
		echo $form->input('nombre', array('label' =>'Área', 'maxLength' => 80));
	?>
	</fieldset>
<?php echo $form->end('Añadir');?>
</div>
