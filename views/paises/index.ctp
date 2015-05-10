<div class="paises index">
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('pais');?></th>
	<th><?php echo $paginator->sort('Creación', 'created');?></th>
	<th><?php echo $paginator->sort('Modificación', 'modified');?></th>
	<th><?php echo $paginator->sort('Estado', 'estatus');?></th>
	<th class="actions"><?php __('Acciones');?></th>
</tr>
<?php
$i = 0;
foreach ($paises as $pais):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $pais['Pais']['id']; ?>
		</td>
		<td>
			<?php echo $pais['Pais']['nombre']; ?>
		</td>
		<td>
			<?php echo $time->format2($pais['Pais']['created']); ?>
		</td>
		<td>
			<?php echo $time->format2($pais['Pais']['modified']); ?>
		</td>
		<td>
            <?php
				if ($pais['Pais']['estatus'] == 1)
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
			echo $html->link2('Editar', array('action' => 'edit', $pais['Pais']['id']));
		    echo '&nbsp;&nbsp;&nbsp;';
		    if ($pais['Pais']['estatus'] == '1')
		    {
			    echo $html->link2('Desactivar', array('action' => 'deactivate', $pais['Pais']['id']), null, sprintf('¿Está seguro de que quiere desactivar el pais %s?', $pais['Pais']['nombre']));
			} else {
			    echo $html->link2('Activar', array('action' => 'activate', $pais['Pais']['id']), null, sprintf('¿Está seguro de que quiere activar el pais %s?', $pais['Pais']['nombre']));
			}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>