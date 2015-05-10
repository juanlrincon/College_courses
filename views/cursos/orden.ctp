<div class="cursos form">
<?php echo $form->create('Curso', array('action' => 'orden'));?>
	<fieldset>
	<?php

		echo $form->input('id', array('type' => 'hidden', 'value' => $id));
		if (count($modulos) == 0)
			echo $html->link2('No existen modulos en este Curso, Por favor agregelos aquí', array('controller' => 'cursos', 'action' => 'edit', $id), array('class' => 'link1')).'<b><br><br>';

		$i = 0;
		foreach($modulos as $key => $value) {
			echo $form->input(htmlentities(utf8_decode($value['nombre'])), array('name' => 'data[Modulo]['.$key.'][orden]', 'maxlength' => '2', 'value' => $value['orden']));
			echo $form->input('', array('name' => 'data[Modulo]['.$key.'][curso_id]', 'type' => 'hidden', 'value' => $id));
			echo $form->input('', array('name' => 'data[Modulo]['.$key.'][modulo_id]', 'type' => 'hidden', 'value' => $value['modulo_id']));
			echo $form->input('', array('name' => 'data[Modulo]['.$key.'][id]', 'type' => 'hidden', 'value' => $key));
			echo '<br><br>';
			$i++;
		}

		if (count($modulos) != 0)
	        echo $form->submit('guardar.png'); ?>
</div>