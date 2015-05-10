<?php 
if (count($cursoParticipantes) > 0)
{
?>
<div class="cursoParticipantes index">
<table cellpadding="0" cellspacing="0">
<tr><td><h2>Cursos en los que esta inscrito</h2><br></td></tr>
<tr>
	<th><?php echo 'Curso';?></th>
	<th><?php echo 'Inicio';?></th>
	<th><?php echo 'Fin';?></th>
	<th class="actions"><?php __('Acciones');?></th>
</tr>
<?php
if(count($cursoParticipantes) == 0)
{
	echo 'No estas inscrito en ningun curso.<br><br>';
}
//print_r($cursoParticipantes);

$i = 0;
foreach ($cursoParticipantes as $cursoParticipante):

?>
	<tr>
		<td>
			<?php echo $cursoParticipante['Curso']['nombre']; ?>
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

<div id="lineas"><img src="<?php echo $this->base; ?>/img/lineaxlarga.png" /></div>

<?php 
}
?>






<div class="cursos index">
<table cellpadding="0" cellspacing="0">
<tr><td><h2>Cursos</h2><br></td></tr>
<tr>
	<th><?php echo $paginator->sort('Curso', 'nombre');?></th>
    <!-- <th><?php //echo $paginator->sort('Inicio', 'fecha_inicio');?></th> -->
	<th><?php echo $paginator->sort('Ciudad', 'Ciudad.nombre');?></th>
	<th><?php echo $paginator->sort('Campus', 'campus');?></th>
	<th><?php echo $paginator->sort('Estado', 'estatus');?></th>
	<th class="actions">Acciones</th>
</tr>

<?php
$today = date("Y-m-d");

$i = 0;
foreach ($cursos as $curso):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}


	if (isset($nivel_ant) and ($nivel_ant != $curso['Curso']['nivel']))
	{
		echo '</tr><tr><td><br><h2>Modulos</h2>&nbsp;<br></td></tr><tr>';
		?>
		<tr>
			<th><?php echo $paginator->sort('Curso', 'nombre');?></th>
	    <!-- <th><?php //echo $paginator->sort('Inicio', 'fecha_inicio');?></th> -->
			<th><?php echo $paginator->sort('Ciudad', 'Ciudad.nombre');?></th>
			<th><?php echo $paginator->sort('Campus', 'campus');?></th>
			<th><?php echo $paginator->sort('Estado', 'estatus');?></th>
			<th class="actions">Acciones</th>
		</tr>
		<?php
		$fincursos = 1;
	}

	$nivel_ant = $curso['Curso']['nivel'];
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $curso['Curso']['nombre']; ?>
		</td>
		<!-- <td>
			<?php //echo $time->format2($curso['Curso']['fecha_inicio']); ?>
		</td> -->
		<td>
			<?php echo $curso['Ciudad']['nombre']; ?>
		</td>
		<td>
			<?php echo $curso['Curso']['campus']; ?>
		</td>
        <td>
            <?php
				if ($curso['Curso']['estatus'] == 1)
				{
					echo 'Activo';
				}
				else if ($curso['Curso']['estatus'] == 2)
				{
					echo 'Sin Autorizar';
				}
				else
				{
					echo 'Inactivo';
				}
            ?>
        </td>
		<td class="actions">
		    <?php
			echo $html->link2('Ver', array('action' => 'view', $curso['Curso']['id']));

			$fecha_limite = '';
			foreach($curso['FechasCurso'] as $key => $value)
			{
				//echo '&nbsp;&nbsp;&nbsp;'.$value['fecha_limite'];
				$fecha_limite = $value['fecha_limite'];
			}
			//echo date('');
			 
			//echo $fecha_limite;
			/*echo $today;
			echo '<br>';
			echo $fecha_limite;
			echo '<br>';*/
			if (!($today > $fecha_limite and $instructor == 1))
				echo $html->link2('Editar', array('action' => 'edit', $curso['Curso']['id']));

		    if (!isset($fincursos))
		    {
		 		if($rol_id == 1 or $rol_id == 3) // Administrador y Vendedor
				{
		    		echo $html->link('Ordenar Modulos', array('action' => 'orden', $curso['Curso']['id']));
				}
		    }

			echo '&nbsp;&nbsp;&nbsp;';
		    if ($curso['Curso']['estatus'] == '1')
		    {
			    echo $html->link2('Desactivar', array('action' => 'deactivate', $curso['Curso']['id']), null, sprintf('¿Está seguro de que quiere desactivar el curso "%s"?', $curso['Curso']['nombre']));
		    }
		    else if ($curso['Curso']['estatus'] == '2')
			{
				echo $html->link2('Autorizar', array('action' => 'autorize', $curso['Curso']['id']), null, sprintf('¿Está seguro de que quiere autorizar el curso "%s"?', $curso['Curso']['nombre']));
		    }
		    else
		    {
			    echo $html->link2('Activar', array('action' => 'activate', $curso['Curso']['id']), null, sprintf('¿Está seguro de que quiere activar el curso "%s"?', $curso['Curso']['nombre']));
			}

		    ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>