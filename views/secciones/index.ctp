<?php 
$text_length = 130;
$secciones1['1'] = 'a la medida';
//$secciones1['2'] = 'Nosotros';
$secciones1['2'] = 'Consultoría';
$secciones1['3'] = 'Contacto';
?>
<div class="areas index">
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo 'Menu'; ?></th>
	<th><?php echo $paginator->sort('seccion');?></th>
	<th><?php echo $paginator->sort('titulo1');?></th>
	<th><?php echo $paginator->sort('titulo2');?></th>
	<th class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($secciones as $seccion):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
<td><?php echo $secciones1[$i]; ?></td>
		<td>
			<?php
				if(strlen($seccion['Seccion']['seccion']) > $text_length)
				{
					echo substr($seccion['Seccion']['seccion'],0,strrpos(substr($seccion['Seccion']['seccion'],0,$text_length)," ")).' ...';
				}
				else
				{
					echo $seccion['Seccion']['seccion'];
				}
			?>
		</td>
		<td>
			<?php
				if(strlen($seccion['Seccion']['titulo1']) > $text_length)
				{
					echo substr($seccion['Seccion']['titulo1'],0,strrpos(substr($seccion['Seccion']['titulo1'],0,$text_length)," ")).' ...';
				}
				else
				{
					echo $seccion['Seccion']['titulo1'];
				}
			?>
		</td>
		<td>
			<?php
				if(strlen($seccion['Seccion']['titulo2']) > $text_length)
				{
					echo substr($seccion['Seccion']['titulo2'],0,strrpos(substr($seccion['Seccion']['titulo2'],0,$text_length)," ")).' ...';
				}
				else
				{
					echo $seccion['Seccion']['titulo2'];
				}
			?>
		</td>
		<td class="actions">
		    <?php
			//echo $html->link2('Ver', array('action' => 'view', $seccion['Seccion']['id']));
		    echo $html->link2('Editar', array('action' => 'edit', $seccion['Seccion']['id']));
		    echo '&nbsp;&nbsp;&nbsp;';
			?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>