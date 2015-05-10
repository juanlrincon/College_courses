<div class="tipoCursos form">
<?php echo $form->create('TipoCurso', array('enctype' => 'multipart/form-data'));?>
	<fieldset>
	<?php
	    echo $form->input('id');
		echo $form->input('nombre', array('label' =>'Tipo de Curso', 'maxLength' => 30));
		echo $form->input('TipoCurso.file', array('type' =>'file', 'label' =>'Imagen'));
		if ($form->value('TipoCurso.name') != null) { 
            echo $form->value('TipoCurso.name');
            echo "<br />";
            echo $fileUpload->image($form->value('TipoCurso.name'), array('uploadDir' => 'files'.DS.'tipocursos', 'width' => 300));
        } else { 
            echo "&lt;Sin imagen asignada&gt;";
        }
        echo "<br />";
        echo $html->tag('span', 'Solo archivos de imágenes (.gif, .jpg, .png)'); // Asignar clase para notas, array('class' => 'welcome')
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>