<div class="cursoParticipantes index">
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Curso', 'Curso.nombre');?></th>
	<th><?php echo $paginator->sort('Participante', 'Participante.Usuario.nombres');?></th>
	<th><?php echo $paginator->sort('Creación', 'created');?></th>
	<th><?php echo $paginator->sort('Modificación', 'modified');?></th>
	<th><?php echo $paginator->sort('Estado', 'estatus');?></th>
	<th class="actions"><?php __('Acciones');?></th>
</tr>
<?php
$i = 0;
foreach ($cursoParticipantes as $cursoParticipante):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $cursoParticipante['Curso']['nombre']; ?>
		</td>
		<td>
			<?php echo $cursoParticipante['Participante']['Usuario']['nombres'].' '.$cursoParticipante['Participante']['Usuario']['apellido_paterno'].' '.$cursoParticipante['Participante']['Usuario']['apellido_materno']; ?>
		</td>
		<td>
			<?php echo $time->format2($cursoParticipante['CursoParticipante']['created']); ?>
		</td>
		<td>
			<?php echo $time->format2($cursoParticipante['CursoParticipante']['modified']); ?>
		</td>
		<td>
            <?php
				if ($cursoParticipante['CursoParticipante']['estatus'] == 1)
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
				echo $html->link2('Editar', array('action' => 'edit', $cursoParticipante['CursoParticipante']['id']));
			    echo '&nbsp;&nbsp;&nbsp;';
			    if ($cursoParticipante['CursoParticipante']['estatus'] == '1')
			    {
				    echo $html->link2('Desactivar', array('action' => 'deactivate', $cursoParticipante['CursoParticipante']['id']), null, sprintf('¿Está seguro de que quiere desactivar la inscripcion al participante %s?', $cursoParticipante['Participante']['Usuario']['nombres'].' '.$cursoParticipante['Participante']['Usuario']['apellido_paterno'].' '.$cursoParticipante['Participante']['Usuario']['apellido_materno']));
				} else {
				    echo $html->link2('Activar', array('action' => 'activate', $cursoParticipante['CursoParticipante']['id']), null, sprintf('¿Está seguro de que quiere activar la inscripcion al participante %s?', $cursoParticipante['Participante']['Usuario']['nombres'].' '.$cursoParticipante['Participante']['Usuario']['apellido_paterno'].' '.$cursoParticipante['Participante']['Usuario']['apellido_materno']));
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>