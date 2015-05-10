<div class="roles form">
<?php echo $form->create('Rol');?>
	<fieldset>
	<?php
		echo $form->input('nombre', array('label' =>'Rol', 'maxLength' => 30));

		echo $form->input('mensaje', array('label' =>'Mensaje de Bienvenida'));
		?>
	</fieldset>
<?php echo $form->end('Añadir');?>
</div>