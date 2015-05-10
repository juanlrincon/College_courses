<?php // echo $rol.'<-----'; ?>
<div class="usuarios index">

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Usuario','nombre_usuario');?></th>
	<th><?php echo $paginator->sort('Rol','Rol.nombre');?></th>
	<th><?php echo $paginator->sort('Nombre(s)','nombres');?></th>
	<th><?php echo $paginator->sort('E-mail','correo_electronico');?></th>
	<th>Estado</th>
	<th class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($usuarios as $usuario):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $usuario['Usuario']['nombre_usuario']; ?>
		</td>
		<td>
			<?php echo $usuario['Rol']['nombre']; ?>
		</td>
		<td>
			<?php echo $usuario['Usuario']['nombres'].' '.$usuario['Usuario']['apellido_paterno'].' '.$usuario['Usuario']['apellido_materno']; ?>
		</td>
		<td>
			<?php echo $usuario['Usuario']['correo_electronico']; ?>
		</td>
		<td>
            <?php
				if ($usuario['Usuario']['estatus'] == 1)
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
		  if ($usuario['Usuario']['id'] != '1')
		  {
		    echo $html->link2('Ver', array('action' => 'view', $usuario['Usuario']['id']));
			echo $html->link2('Editar', array('action' => 'edit', $usuario['Usuario']['id']));
		    echo '&nbsp;&nbsp;&nbsp;';
		    if ($usuario['Usuario']['estatus'] == '1')
		    {
			    echo $html->link2('Desactivar', array('action' => 'deactivate', $usuario['Usuario']['id']), null, sprintf('¿Está seguro de que quiere desactivar el usuario %s?', $usuario['Usuario']['nombres']." ".$usuario['Usuario']['apellido_paterno']." ".$usuario['Usuario']['apellido_materno']));
			} else {
			    echo $html->link2('Activar', array('action' => 'activate', $usuario['Usuario']['id']), null, sprintf('¿Está seguro de que quiere activar el usuario %s?', $usuario['Usuario']['nombres']." ".$usuario['Usuario']['apellido_paterno']." ".$usuario['Usuario']['apellido_materno']));
			}
		  }
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>