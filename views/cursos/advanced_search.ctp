<div class="cursos form">
<?php echo $form->create('Curso', array('action' => 'search'));?>
	<fieldset>
	<?php
	//echo '<div style="float:left">nombre d d d</div>'.$form->input('nombre', array('label' => ''));	
	echo $form->input('search_text', array('label' => 'Buscar'));

		//echo $form->input('tipo_curso_id', array('label' => 'Tipo de Curso'));
		//echo $form->input('fecha_inicio', array('label' => 'Fecha de Inicio', 'dateFormat' => 'DMY', 'minYear' => date('Y'), 'maxYear' => date('Y') + 5));
		//echo $form->input('ciudad_id', array('label' => 'Ciudad'));
	?>
	</fieldset>
	
	
 <?php //echo $form->end('Añadir');
    //echo $form->submit('guardar.png'); ?>
    <div class="submit"><input type="submit" value="Submit" /></div>
</div>
