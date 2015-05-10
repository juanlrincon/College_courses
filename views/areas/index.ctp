<div class="areas index">
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Área','nombre');?></th>
	<th><?php echo $paginator->sort('Creación', 'created');?></th>
	<th><?php echo $paginator->sort('Modificación', 'modified');?></th>
	<th><?php echo $paginator->sort('Estado', 'estatus');?></th>
	<th class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($areas as $area):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $area['Area']['nombre']; ?>
		</td>
		<td>
			<?php echo $time->format2($area['Area']['created']); ?>
		</td>
		<td>
			<?php echo $time->format2($area['Area']['modified']); ?>
		</td>
		<td>
            <?php
				if ($area['Area']['estatus'] == 1)
				{
					echo 'Activa';
				}
				else
				{
					echo 'Inactiva';	
				}
            ?>
        </td>
		<td class="actions">
		    <?php
			echo $html->link2('Editar', array('action' => 'edit', $area['Area']['id']));
		    echo '&nbsp;&nbsp;&nbsp;';
		    if ($area['Area']['estatus'] == '1')
		    {
			    echo $html->link2('Desactivar', array('action' => 'deactivate', $area['Area']['id']), null, sprintf('¿Está seguro de que quiere desactivar el Área %s?', $area['Area']['nombre']));
			} else {
			    echo $html->link2('Activar', array('action' => 'activate', $area['Area']['id']), null, sprintf('¿Está seguro de que quiere activar el Área %s?', $area['Area']['nombre']));
			}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
