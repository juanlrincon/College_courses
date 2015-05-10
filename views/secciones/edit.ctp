<div class="secciones form">
<?php echo $form->create('Seccion');?>
	<fieldset>
	<?php
	    echo $form->input('id');
		echo $form->input('seccion');
		echo $form->input('titulo1');
		echo $form->input('descripcion1');
		echo $form->input('nota1');		
		echo $form->input('titulo2');
		echo $form->input('descripcion2');
		echo $form->input('nota2');
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>