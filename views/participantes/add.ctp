<div class="participantes form">
<?php echo $form->create('Participante');?>
	<fieldset>
	<?php

		echo $form->input('usuario_id');		
		echo $form->input('puesto');
		echo $form->input('departamento');
		echo $form->input('fecha_nacimiento', array('dateFormat' => 'DMY'));
		echo $form->input('lugar_nacimiento');
		echo $form->input('grado_estudio');
		echo $form->input('exatec_matricula');

	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>

