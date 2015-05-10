<?php echo $javascript->link(array('jquery_min', 'jquery-ui.min'), false); ?>
 <script>
  $(document).ready(function() {
	    $("#accordion").accordion({ collapsible: true, autoHeight: false,  active: false, icons: { 'header': 'ui-icon-plus', 'headerSelected': 'ui-icon-minus' }});
  });

  </script>

<link href="<?php echo $this->base; ?>/css/diplomas.css" rel="stylesheet" type="text/css" />
<?php $text_length = 270 ?>
<div class="cursos index">
<div id="diplomado" style="background-image: url(<?php echo $this->base.'/'.$tc_images_path.'/'.$imagen; ?>);">
	<div id="dcol1">
		<div id="dtitulo"><?php echo $tipo; ?></div>
	</div>
	<div id="dcol2">
		<div id="dcosto"><span class="blanco"><?php //echo $curso['Curso']['precio']; ?></span></div>
	</div>
</div>

<?php 

if (count($areas > 0))
{
	echo '<div class="modulo" style="font-size:17px;padding-top:10px;color:#89A7BD;text-decoration:underline;">Seleccione el área de su interés:</div>';
}
?>
<div id="accordion">
<?php



foreach ($areas as $key => $value)
{
	echo '<h3>';

/*	if ($first > 0)
	{
		echo '<img src="'.$this->base.'/img/linea2.jpg" border="0" alt="linea">';
	}
	else
	{
		echo '';
	}
*/
	echo '<a href="#"><div class="modulo">&nbsp;&nbsp;&nbsp;'.$value['area'].'</div></a></h3>';
	//$first++;

	echo '<div class="lista1">';
		foreach($value['cursos'] as $key2 => $value2)
		{
			echo '<div class="lista2"><span class="titulo">';
			echo $html->link($value2, array('action' => 'uview', $key2), array('style' => 'text-decoration:none;'));
			echo '</span></div>';
		}
	echo '</div>';
}
?>
</div>
<?php
/*
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
			<span class="perfil">Perfil: <?php echo $html->link($perfil, array('action' => 'uview', $curso['Curso']['id'])); ?></span>
			<br><br>
		<?php echo $html->link('Ver Más...', array('action' => 'uview', $curso['Curso']['id'])); ?>
	</div>
</div>
<?php endforeach; 
*/
?>

</div>