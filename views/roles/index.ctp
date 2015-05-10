<div class="roles index">
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Rol','nombre');?></th>
	<th><?php echo $paginator->sort('Creación', 'created');?></th>
	<th><?php echo $paginator->sort('Modificación', 'modified');?></th>
	<th>Estado</th>
	<th class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($roles as $rol):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $rol['Rol']['nombre']; ?>
		</td>
		<td>
			<?php echo $time->format2($rol['Rol']['created']); ?>
		</td>
		<td>
			<?php echo $time->format2($rol['Rol']['modified']); ?>
		</td>
		<td>
            <?php
				if ($rol['Rol']['estatus'] == 1)
				{
					echo 'Activo';
				}
				else
				{
					echo 'Inactivo';	
				}
            ?>
        </td>
		<td class="actions">
		    <?php
		  if ($rol['Rol']['id'] != '1')
		  {
			echo $html->link2('Editar', array('action' => 'edit', $rol['Rol']['id']));
		    echo '&nbsp;&nbsp;&nbsp;';

		    if ($rol['Rol']['estatus'] == '1')
		    {
		    	if ($rol['Rol']['id'] != '1' and $rol['Rol']['id'] != '2' and $rol['Rol']['id'] != '3' and $rol['Rol']['id'] != '4' and $rol['Rol']['id'] != '5' and $rol['Rol']['id'] != '6')
		    	{
					if (count($rol['Usuario']) == 0)
					{
						echo $html->link2('Desactivar', array('action' => 'deactivate', $rol['Rol']['id']), null, sprintf('¿Está seguro de que quiere desactivar el Rol %s?', $rol['Rol']['nombre']));
					}
					else
					{
						echo '<a href="javascript:alert(\'Este Rol no puede ser desactivado hasta que se cambien los usuarios contenidos en el mismo.\')">Desactivar</a>';
					}
		    	}
			} else {
			    echo $html->link2('Activar', array('action' => 'activate', $rol['Rol']['id']), null, sprintf('¿Está seguro de que quiere activar el Rol %s?', $rol['Rol']['nombre']));
			}
		  }
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
