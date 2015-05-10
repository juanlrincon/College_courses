<?php echo $javascript->link(array('prototype','scriptaculous'), false); ?>
<div class="cursoParticipantes form">
<?php echo $form->create('CursoParticipante');?>
	<fieldset>
	<?php
		echo $form->input('curso_id');
		echo $form->input('participante_id');
		
		echo $ajax->observeField('CursoParticipanteCursoId', array(
            'url' => array('action' => 'update_fechas'), 
            'update' => 'CursoParticipanteFechacursoId'));
            
        echo $form->input('fechacurso_id', array('label' => 'Fecha de inicio de curso - Seleccione primero un curso'));
		echo 'No se puede realizar la inscripción hasta que no se halla definido y seleccionado la fecha de inicio de curso';
        ?>
	</fieldset>
<?php echo $form->end('Inscribir');?>
</div>