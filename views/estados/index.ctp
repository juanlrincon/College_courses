<div class="estados index">
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('País','Pais.nombre');?></th>
	<th><?php echo $paginator->sort('Estado / Provincia','nombre');?></th>
	<th><?php echo $paginator->sort('Creación', 'created');?></th>
	<th><?php echo $paginator->sort('Modificación', 'modified');?></th>
	<th><?php echo $paginator->sort('Estado', 'estatus');?></th>
    <th class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($estados as $estado):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
        <td>
			<?php echo $estado['Pais']['nombre']; ?>
		</td>
		<td>
			<?php echo $estado['Estado']['nombre']; ?>
		</td>
		<td>
			<?php echo $time->format2($estado['Estado']['created']); ?>
		</td>
		<td>
			<?php echo $time->format2($estado['Estado']['modified']); ?>
		</td>
		<td>
            <?php
				if ($estado['Estado']['estatus'] == 1)
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
			echo $html->link2('Editar', array('action' => 'edit', $estado['Estado']['id']));
		    echo '&nbsp;&nbsp;&nbsp;';
		    if ($estado['Estado']['estatus'] == '1')
		    {
			    echo $html->link2('Desactivar', array('action' => 'deactivate', $estado['Estado']['id']), null, sprintf('¿Está seguro de que quiere desactivar el estado %s?', $estado['Estado']['nombre']));
			} else {
			    echo $html->link2('Activar', array('action' => 'activate', $estado['Estado']['id']), null, sprintf('¿Está seguro de que quiere activar el estado %s?', $estado['Estado']['nombre']));
			}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>