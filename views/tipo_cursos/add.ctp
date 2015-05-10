<div class="tipoCursos form">
<?php echo $form->create('TipoCurso', array('enctype' => 'multipart/form-data'));?>
	<fieldset>
	<?php

		echo $form->input('nombre', array('label' =>'Tipo de Curso', 'maxLength' => 30));
		echo $form->input('TipoCurso.file', array('type' =>'file', 'label' =>'Imagen'));
		echo $html->tag('span', 'Solo archivos de imágenes (.gif, .jpg, .png)'); // Asignar clase para notas, array('class' => 'welcome')
	?>
	</fieldset>
<?php echo $form->end('Añadir');?>
</div>




