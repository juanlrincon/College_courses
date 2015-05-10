<div class="cursos form">
<?php echo $form->create('Contenido', array('enctype' => 'multipart/form-data'));?>
	<fieldset>
	<?php
		echo $form->input('id');

		echo '<dt>'.$form->input('nombre', array('label' => 'Nombre')).'</dt>';

		echo $form->input('descripcion_general', array('label' => 'Descripcion General'));
		echo '<img src="'.$this->base.'/files/contenidos/'.$form->value('Contenido.imagen_logo').'" border="0" width="150">';

		echo $form->input('imagen_logo', array('type' => 'file', 'label' => 'Imagen'));
		echo '<input type="hidden" name="data[Contenido][imagen_logo_ant]" value="'.$form->value('imagen_logo').'">';
?>
	</fieldset>
<?php
        echo $form->submit('guardar.png'); ?>
</div>