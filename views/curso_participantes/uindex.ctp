<?php
if(count($cursoParticipantes) == 0)
{
	echo 'No estas inscrito en ningun curso.<br><br>';
}
else
{
?>
<div class="cursoParticipantes index">
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Curso', 'Curso.nombre');?></th>
	<th><?php echo $paginator->sort('Participante', 'Participante.Usuario.nombres');?></th>
	<th><?php echo $paginator->sort('Inicio', 'FechasCurso.fecha_inicio');?></th>
	<th><?php echo $paginator->sort('Fin', 'FechasCurso.fecha_fin');?></th>
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
			<?php echo $time->format2($cursoParticipante['FechasCurso']['fecha_inicio']); ?>
		</td>
		<td>
			<?php echo $time->format2($cursoParticipante['FechasCurso']['fecha_fin']); ?>
		</td>
		<td class="actions">
		    <?php
				echo $html->link('Ver', array('controller' => 'cursos', 'action' => 'uview', $cursoParticipante['Curso']['id']));
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<?php } ?>