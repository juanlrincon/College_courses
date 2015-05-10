<div class="usuarios form">
<?php echo $form->create('Usuario');?>
	<fieldset>
 		<dl><?php $i = 0; $class = ' class="altrow"';?>
    		<dt<?php if ($i % 2 == 0) echo $class;?>>Usuario</dt>
    		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
    			<?php echo $form->value('Usuario.nombres').' '.$form->value('Usuario.apellido.paterno').' '.$form->value('Usuario.apellido_materno');
    				echo '<br>'.$form->value('Usuario.nombre_usuario'); ?>
    			&nbsp;
    		</dd>
    	</dl>
	<?php
	    echo $form->input('id');
		//echo $html->tag('span', 'Escriba el password solo si desea cambiarlo'); // Asignar clase para notas, array('class' => 'welcome')

		if ($admin == 1)	// Administrador = 1
		{
			echo $form->input('rol_id', array('label' =>'Rol'));
		}

		echo $form->input('nombres', array('label' =>'Nombre(s)'));
		echo $form->input('apellido_paterno', array('label' =>'Apellido Paterno'));
		echo $form->input('apellido_materno', array('label' =>'Apellido Materno'));
		echo $form->input('correo_electronico', array('label' =>'Correo electrónico'));
		echo $form->input('telefono', array('label' =>'Teléfono'));
		echo $form->input('extension', array('label' =>'Extensión teléfonica'));

		echo $form->input('password', array('label' =>'Password - Escriba el password solo si desea cambiarlo'));
		echo $form->input('confirmar_password', array('label' =>'Confirmar Password', 'type' => 'password'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>
