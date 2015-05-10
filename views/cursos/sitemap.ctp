<?php echo $javascript->link(array('jquery_min', 'jquery-ui.min'), false); ?>
 <script>
  $(document).ready(function() {
	    $("#accordion_1").accordion({ collapsible: true, autoHeight: false,  active: false, icons: { 'header': 'ui-icon-plus', 'headerSelected': 'ui-icon-minus' }});
	    $("#accordion_2").accordion({ collapsible: true, autoHeight: false,  active: false, icons: { 'header': 'ui-icon-plus', 'headerSelected': 'ui-icon-minus' }});
	    $("#accordion_3").accordion({ collapsible: true, autoHeight: false,  active: false, icons: { 'header': 'ui-icon-plus', 'headerSelected': 'ui-icon-minus' }});
	    $("#accordion_4").accordion({ collapsible: true, autoHeight: false,  active: false, icons: { 'header': 'ui-icon-plus', 'headerSelected': 'ui-icon-minus' }});
	    $("#accordion_5").accordion({ collapsible: true, autoHeight: false,  active: false, icons: { 'header': 'ui-icon-plus', 'headerSelected': 'ui-icon-minus' }});
  });
  </script>
<?php
echo '<div class="sitemap">'.$html->link('Inicio', array('controller' => 'pages', 'action' => 'home')).'</div>';

	foreach($menu as $key => $value)
	{
		echo '<div class="sitemap2">'.$html->link($value, array('controller' => 'cursos', 'action' => 'index', $key)).'</div>';
		echo '<div id="accordion_'.$key.'" class="sitemap3">';

		foreach ($areas[$key] as $key1 => $value1)
		{

			echo '<h3>';
		
			echo '<a href="#"><div class="sitemap">&nbsp;&nbsp;&nbsp;'.$value1['area'].'</div></a></h3>';
		
			echo '<div class="lista1">';
			foreach($value1['cursos'] as $key2 => $value2)
			{
				echo '<div class="lista2"><span class="titulo_sm">';
				echo $html->link($value2, array('action' => 'uview', $key2), array('style' => 'text-decoration:none;'));
				echo '</span></div>';
			}
			echo '</div>';
		}
		echo '</div>';
	}


echo '<div class="sitemap">'.$html->link('Catálogo de Módulos', array('controller' => 'cursos', 'action' => 'modulos'),  array('style' => 'width:125px;')).'</div>';

	unset($key1);
	unset($value1);
	unset($key2);
	unset($value2);

	echo '<div id="accordion_5" class="sitemap3">';

	foreach ($modulos as $key1 => $value1)
	{

		echo '<h3>';
	
		echo '<a href="#"><div class="sitemap">&nbsp;&nbsp;&nbsp;'.$value1['area'].'</div></a></h3>';
	
		echo '<div class="lista1">';
		foreach($value1['cursos'] as $key2 => $value2)
		{
			echo '<div class="lista2"><span class="titulo_sm">';
			echo $html->link($value2, array('action' => 'uview', $key2), array('style' => 'text-decoration:none;'));
			echo '</span></div>';
		}
		echo '</div>';
	}
	echo '</div>';

	echo '<div class="sitemap">'.$html->link('A la Medida', array('controller' => 'secciones', 'action' => 'view', '1')).'</div>';

	echo '<div class="sitemap">'.$html->link('Consultoría', array('controller' => 'secciones', 'action' => 'view', '2')).'</div>';

	echo '<div class="sitemap">'.$html->link('Contacto', array('controller' => 'secciones', 'action' => 'view', '3'), array('style' => 'font-weight:bold;')).'</div>';
?>