<div class="permisos form" style="overflow: hidden;">
<?php echo $form->create('Permiso');?>
	<fieldset>
	<?php
		echo $form->input('id');
		//$i = 0;
			echo '<div id="permisos">'."\n";;
		foreach($permiso as $key => $value)
		{
			if (isset($value['titulo']))
				echo '<div style="margin-bottom:10px">'.$value['titulo'].'</div>';
// No se para que es el 45 todavia
if ($key != 45)
			echo $form->input('p'.$key, array('label' =>$value['nombre']))."\n";;

			if (isset($value['espacio']))
				if ($key == 45)
					echo '</div>'."\n";
				else
					echo '</div><div id="permisos">'."\n";
		}
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>