<link href="<?php echo $this->base; ?>/css/diplomas.css" rel="stylesheet" type="text/css" />
<?php
$text_length = 265;

echo '<div style="margin-left:20px;margin-top:20px;"><b>Resultados de b&uacute;squeda para:</b> "'.$this->data['Curso']['search_text'].'"</div>';
echo '<div style="margin-left:0px;height:800px;margin-top:20px;padding-bottom:20px;border:1px;" class="cursos index">';

if (isset($cursos))
if (count($cursos) == 0)
{
	echo '<div>No se encontraron resultados.<br><br>';
	echo $form->create('Curso', array('action' => 'search'));
	echo '<fieldset>';
	echo $form->input('search_text', array('label' => 'Buscar'));
	echo '<div class="submit"><input type="submit" value="Buscar" /></div>
	</div>';
}
else
{
	$i = 0;
	foreach ($cursos as $curso):
		?>
		<div class="float_contenido">
		<div class="dtexto">
		<p><span class="azul"><?php echo $curso['Curso']['nombre']; ?></span></p>
		<div style="margin-top: 10px; margin-bottom: 10px;">
			<img src="<?php echo $this->base; ?>/img/lineacorta.png" />
		</div>
		<?php
	
		if(strlen($curso['Curso']['objetivo']) > $text_length)
		{
			echo '<p>'.substr($curso['Curso']['objetivo'],0,strrpos(substr($curso['Curso']['objetivo'],0,$text_length)," ")).' ...</p>';
		}
		else
		{
			echo '<p>'.$curso['Curso']['objetivo'].'</p>';
		}

		if(strlen($curso['Curso']['perfil']) > $text_length)
		{
			$perfil = substr($curso['Curso']['perfil'],0,strrpos(substr($curso['Curso']['perfil'],0,$text_length)," ")).' ...';
		}
		else
		{
			$perfil = $curso['Curso']['perfil'];
		}

		?>
		<br>
		<span class="perfil">Perfil: <?php
		if ($curso['Curso']['nivel'] == 2)
		{
			echo $html->link($perfil, array('action' => 'uview', $curso['Curso']['id']));
		}
		else
		{
			echo $html->link($perfil, array('action' => 'umview', $curso['Curso']['id']));
		}
		?>
		</span>
		<?php
		
		echo '<br><br>';

		if ($curso['Curso']['nivel'] == 2)
		{
			echo $html->link('Ver Más...', array('controller' => 'cursos', 'action' => 'uview', $curso['Curso']['id']));
		}
		else
		{
			echo $html->link('Ver Más...', array('controller' => 'cursos', 'action' => 'umview', $curso['Curso']['id']));
		}
		?>

		</div>
		</div>
		<?php
	endforeach;
}
?>

</div>