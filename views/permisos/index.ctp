<div class="permisos index">
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Rol', 'rol');?></th>
	<th><?php echo $paginator->sort('Creación', 'created');?></th>
	<th><?php echo $paginator->sort('Modificación', 'modified');?></th>
	<th class="actions"><?php __('Acciones');?></th>
</tr>
<?php
$i = 0;
foreach ($permisos as $permiso):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $permiso['Rol']['nombre']; ?>
		</td>
		<td>
			<?php echo $time->format2($permiso['Permiso']['created']); ?>
		</td>
		<td>
			<?php echo $time->format2($permiso['Permiso']['modified']); ?>
		</td>
		<td class="actions">
			<?php echo $html->link('Editar', array('action' => 'edit', $permiso['Permiso']['id'])); ?>
			<?php
			if (count($permiso['Rol']['Usuario']) == 0)
				echo $html->link('Borrar', array('action' => 'delete', $permiso['Permiso']['id']), null, sprintf(__('¿Está seguro de que quiere borrar el permiso # %s?', true), $permiso['Rol']['nombre'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>