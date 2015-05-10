<div class="participantes index">
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('puesto').'/'.$paginator->sort('departamento');?></th>
	<th><?php echo $paginator->sort('Fecha', 'fecha_nacimiento').'/'.$paginator->sort('Lugar de Nacimiento', 'lugar_nacimiento');?></th>
	<th><?php echo $paginator->sort('Grado de Estudio', 'grado_estudio').'/'.$paginator->sort('Matricula Exatec', 'exatec_matricula');?></th>
	<th><?php echo $paginator->sort('Creación', 'created').'/'.$paginator->sort('Modificación', 'modified');?></th>
	<th><?php echo $paginator->sort('Estado', 'estatus');?></th>
	<th class="actions"><?php __('Acciones');?></th>
</tr>
<?php
$i = 0;
foreach ($participantes as $participante):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $participante['Participante']['puesto']; ?>
<br>
			<?php echo $participante['Participante']['departamento']; ?>
		</td>
		<td>
			<?php echo $participante['Participante']['fecha_nacimiento']; ?>
<br>
			<?php echo $participante['Participante']['lugar_nacimiento']; ?>
		</td>
		<td>
			<?php echo $participante['Participante']['grado_estudio']; ?>
<br>
			<?php echo $participante['Participante']['exatec_matricula']; ?>
		</td>
		<td>
			<?php echo $time->format2($participante['Participante']['created']); ?>
<br>
			<?php echo $time->format2($participante['Participante']['modified']); ?>
		</td>
		<td>
            <?php
				if ($participante['Participante']['estatus'] == 1)
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
			echo $html->link2('Ver', array('action' => 'view', $participante['Participante']['id']));
			echo $html->link2('Editar', array('action' => 'edit', $participante['Participante']['id']));
		    echo '&nbsp;&nbsp;&nbsp;';
		    if ($participante['Participante']['estatus'] == '1')
		    {
			    echo $html->link2('Desactivar', array('action' => 'deactivate', $participante['Participante']['id']), null, sprintf('¿Está seguro de que quiere desactivar al participante %s?', $participante['Usuario']['nombres']." ".$participante['Usuario']['apellido_paterno']." ".$participante['Usuario']['apellido_paterno']));
			} else {
			    echo $html->link2('Activar', array('action' => 'activate', $participante['Participante']['id']), null, sprintf('¿Está seguro de que quiere activar al participante %s?', $participante['Usuario']['nombres']." ".$participante['Usuario']['apellido_paterno']." ".$participante['Usuario']['apellido_paterno']));
			}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>