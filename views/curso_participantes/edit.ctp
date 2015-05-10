<?php echo $javascript->link(array('prototype','scriptaculous'), false); ?>
<div class="cursoParticipantes form">
<?php echo $form->create('CursoParticipante');?>
	<fieldset>
	<?php
		echo $form->input('id');
		echo $form->input('curso_id');
		echo $form->input('participante_id');

		echo $ajax->observeField('CursoParticipanteCursoId', array(
            'url' => array('action' => 'update_fechas'), 
            'update' => 'CursoParticipanteFechacursoId'));
            
        echo $form->input('fechacurso_id', array('label' => 'Fecha de inicio de curso'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>