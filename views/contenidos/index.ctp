<div class="cursos index">
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Tipo', 'nombre');?></th>
	<th><?php echo $paginator->sort('Contenido', 'nombre');?></th>
	<th class="actions">Acciones</th>
</tr>

<?php
$today = date("Y-m-d");

$i = 0;
foreach ($contenidos as $contenido):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}

?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $contenido['Contenido']['tipo_curso']; ?>
		</td>
		<td>
			<?php echo $contenido['Contenido']['nombre']; ?>
		</td>
		<td class="actions">
		    <?php
			//echo $html->link('Ver', array('action' => 'view', $contenido['Contenido']['id']));

			echo $html->link('Editar', array('action' => 'edit', $contenido['Contenido']['id']));
/*
			echo '&nbsp;&nbsp;&nbsp;';
		    if ($contenido['Contenido']['estatus'] == '1')
		    {
			    echo $html->link('Desactivar', array('action' => 'deactivate', $contenido['Contenido']['id']), null, sprintf('¿Está seguro de que quiere desactivar el curso "%s"?', $contenido['Contenido']['nombre']));
		    }
		    else if ($contenido['Contenido']['estatus'] == '2')
			{
				echo $html->link('Autorizar', array('action' => 'autorize', $contenido['Contenido']['id']), null, sprintf('¿Está seguro de que quiere autorizar el curso "%s"?', $contenido['Contenido']['nombre']));
		    }
		    else
		    {
			    echo $html->link('Activar', array('action' => 'activate', $contenido['Contenido']['id']), null, sprintf('¿Está seguro de que quiere activar el curso "%s"?', $contenido['Contenido']['nombre']));
			}
*/
		    ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>