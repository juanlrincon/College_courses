<div class="usuarios form">
<?php echo $form->create('Usuario');?>
	<fieldset>
	<?php
		echo $form->input('rol_id', array('label' =>'Rol'));
		echo $form->input('correo_electronico', array('label' =>'Correo electrónico'));
		echo $form->input('nombres', array('label' =>'Nombre(s)'));
		echo $form->input('apellido_paterno', array('label' =>'Apellido Paterno'));
		echo $form->input('apellido_materno', array('label' =>'Apellido Materno'));
		echo $form->input('telefono', array('label' =>'Teléfono'));
		echo $form->input('extension', array('label' =>'Extensión teléfonica'));
		echo $form->input('password', array('label' =>'Password'));
		echo $form->input('confirmar_password', array('label' =>'Confirmar Password', 'type' => 'password'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>