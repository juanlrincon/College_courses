<div class="ciudads index">
<table cellpadding="0" cellspacing="0">
<tr>
    <th><?php echo $paginator->sort('País','Estado.Pais.nombre');?></th>
    <th><?php echo $paginator->sort('Estado / Provincia','Estado.nombre');?></th>
	<th><?php echo $paginator->sort('Ciudad','nombre');?></th>
	<th><?php echo $paginator->sort('Creación', 'created');?></th>
	<th><?php echo $paginator->sort('Modificación', 'modified');?></th>
	<th><?php echo $paginator->sort('Estado', 'estatus');?></th>
    <th class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($ciudades as $ciudad):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
        <td>
			<?php echo $ciudad['Estado']['Pais']['nombre']; ?>
		</td>
		<td>
			<?php echo $ciudad['Estado']['nombre']; ?>
		</td>
		<td>
			<?php echo $ciudad['Ciudad']['nombre']; ?>
		</td>
		<td>
			<?php echo $time->format2($ciudad['Ciudad']['created']); ?>
		</td>
		<td>
			<?php echo $time->format2($ciudad['Ciudad']['modified']); ?>
		</td>
		<td>
            <?php
				if ($ciudad['Ciudad']['estatus'] == 1)
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
			echo $html->link2('Editar', array('action' => 'edit', $ciudad['Ciudad']['id']));
		    echo '&nbsp;&nbsp;&nbsp;';
		    if ($ciudad['Ciudad']['estatus'] == '1')
		    {
			    echo $html->link2('Desactivar', array('action' => 'deactivate', $ciudad['Ciudad']['id']), null, sprintf('¿Está seguro de que quiere desactivar la ciudad %s?', $ciudad['Ciudad']['nombre']));
			} else {
			    echo $html->link2('Activar', array('action' => 'activate', $ciudad['Ciudad']['id']), null, sprintf('¿Está seguro de que quiere activar la ciudad %s?', $ciudad['Ciudad']['nombre']));
			}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>