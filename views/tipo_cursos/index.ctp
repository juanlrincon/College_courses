<div class="tipoCursos index">
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Tipo de Curso', 'nombre');?></th>
	<th>Imagen</th>
 	<th>Estado</th>
	<th class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($tipoCursos as $tipoCurso):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $tipoCurso['TipoCurso']['nombre']; ?>
		</td>
		<td>
			<?php echo $tipoCurso['TipoCurso']['name']; ?>
		</td>
	 	<td>
            <?php
				if ($tipoCurso['TipoCurso']['estatus'] == 1)
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
		    echo $html->link2('Ver', array('action' => 'view', $tipoCurso['TipoCurso']['id']));
			echo $html->link2('Editar', array('action' => 'edit', $tipoCurso['TipoCurso']['id']));
		    echo '&nbsp;&nbsp;&nbsp;';
 		    if ($tipoCurso['TipoCurso']['id'] != '1' and $tipoCurso['TipoCurso']['id'] != '2' and $tipoCurso['TipoCurso']['id'] != '3' and $tipoCurso['TipoCurso']['id'] != '4')
 		    {
			    if ($tipoCurso['TipoCurso']['estatus'] == '1')
			    {
				    echo $html->link2('Desactivar', array('action' => 'deactivate', $tipoCurso['TipoCurso']['id']), null, sprintf('¿Está seguro de que quiere desactivar el tipo de curso %s?', $tipoCurso['TipoCurso']['nombre']));
				} else {
				    echo $html->link2('Activar', array('action' => 'activate', $tipoCurso['TipoCurso']['id']), null, sprintf('¿Está seguro de que quiere activar el tipo de curso %s?', $tipoCurso['TipoCurso']['nombre']));
				}
 		    }
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>