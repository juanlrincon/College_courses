<?php
/* SVN FILE: $Id$ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
        echo $html->css('style');
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
            <div id="logotipo">
                <!-- <img src="img/logo.jpg"> -->
				<?php
				if (isset($_SESSION['rol']))
					echo '<a href="'.$this->base.'/pages/welcome">'.$html->image('logo.jpg').'</a>';
				else
					echo '<a href="'.$this->base.'/pages/home">'.$html->image('logo.jpg').'</a>';

				?>
			</div>
			<div id="logotexto">
				Dirección de Extensión y Desarrollo Empresarial
			</div>
		</div>
		
		<?php
		if(!isset($_SESSION['rol']))
		{
			 ?>
			<div id="menu">
				
				<div class="menulista2"><?php echo $html->link('Inicio', array('controller' => 'pages', 'action' => 'home')); ?></div>
		<?php
		echo $html->menu($menu, 1);
		?>
<div class="menulista"><?php echo $html->link('Catálogo de Módulos', array('controller' => 'cursos', 'action' => 'modulos'),  array('style' => 'width:125px;')); ?></div>
				<div class="menulista"><?php echo $html->link('A la Medida', array('controller' => 'secciones', 'action' => 'view', '1')); ?></div>

<!-- 				<div class="menulista"><?php echo $html->link('Nosotros', array('controller' => 'secciones', 'action' => 'view', '2')); ?></div>
 -->
 
				<div class="menulista"><?php echo $html->link('Consultoría', array('controller' => 'secciones', 'action' => 'view', '2')); ?></div>
				<div class="menulista"><?php echo $html->link('Contacto', array('controller' => 'secciones', 'action' => 'view', '3'), array('style' => 'font-weight:bold;')); ?></div>



<!-- 
	            <div id="buscar"><?php echo $form->create('Curso', array('action' => 'search')); ?>
						<input name="data[Curso][search_text]" type="text" value="" id="CursoSearchText" />
						<input style="float:right;position:absolute;cursor:hand;width:20px;" type="image" src="<?php echo $this->base; ?>/img/go.png" />
					</form>
	            </div>
 -->

			</div>
		<?php
		}
		else
		{
			switch($_SESSION['rol'])
    	    {
				case '1': // Administrador ?>

				<div id="menu">
				<div class="menulista2"><?php echo $html->link('Inicio', array('controller' => 'pages', 'action' => 'welcome')); ?></div>
				<div class="menulista"><?php echo $html->link('Cursos', array('controller' => 'cursos', 'action' => 'lists')); ?></div>
				<div class="menulista"><?php echo $html->link('Usuarios', array('controller' => 'usuarios', 'action' => 'index')); ?></div>
				<div class="menulista"><?php echo $html->link('Secciones', array('controller' => 'secciones', 'action' => 'index')); ?></div>
				<div class="menulista"><?php echo $html->link('Contenido', array('controller' => 'contenidos', 'action' => 'index')); ?></div>
				<div class="menulista3">Bienvenido: <?php echo $_SESSION['nombre_usuario']; ?></div>
				<div id="menulistalogout"><?php echo $html->link('Logout', array('controller' => 'usuarios', 'action' => 'logout')); ?></div>
				</div>

<?php 
	break;
			case '2': ?>

				<div id="menu">
				<div class="menulista2"><?php echo $html->link('Inicio', array('controller' => 'pages', 'action' => 'welcome')); ?></div>
				<div class="menulista"><?php echo $html->link('Cursos', array('controller' => 'cursos', 'action' => 'lists')); ?></div>
				<div class="menulista"><?php echo $html->link('Usuarios', array('controller' => 'usuarios', 'action' => 'index')); ?></div>
				<div class="menulista"><?php echo $html->link('Secciones', array('controller' => 'secciones', 'action' => 'index')); ?></div>
				<div class="menulista3"><?php echo $_SESSION['nombre_usuario']; ?></div>
				<div id="menulistalogout"><?php echo $html->link('Logout', array('controller' => 'usuarios', 'action' => 'logout')); ?></div>
				</div>

<?php
	break;
			case '6': // Participante ?>

				<div id="menu">
				<div class="menulista2"><?php echo $html->link('Inicio', array('controller' => 'curso_participantes', 'action' => 'uindex')); ?></div>
				<div class="menulista2"><?php echo $html->link('Perfil', array('controller' => 'usuarios', 'action' => 'info')); ?></div>
				<div class="menulista3"><?php echo $_SESSION['nombre_usuario']; ?></div>
				<div id="menulistalogout"><?php echo $html->link('Logout', array('controller' => 'usuarios', 'action' => 'logout')); ?></div>
				</div>

<?php
	break;
			default: ?>

				<div id="menu">
				<div class="menulista2"><?php echo $html->link('Inicio', array('controller' => 'pages', 'action' => 'welcome')); ?></div>
				<div class="menulista"><?php echo $html->link('Cursos', array('controller' => 'cursos', 'action' => 'lists')); ?></div>
				<div class="menulista"><?php echo $html->link('Usuarios', array('controller' => 'usuarios', 'action' => 'index')); ?></div>
				<div class="menulista"><?php echo $html->link('Secciones', array('controller' => 'secciones', 'action' => 'index')); ?></div>
				<div class="menulista3"><?php echo $_SESSION['nombre_usuario']; ?></div>
				<div id="menulistalogout"><?php echo $html->link('Logout', array('controller' => 'usuarios', 'action' => 'logout')); ?></div>
				</div>

<?php
break;
			}
		}
//	if (!($this->params['controller'] == 'cursos' and $this->params['action'] == 'index') or !($this->params['controller'] == 'pages' and $this->params['action'] == 'home'))
//		echo '<div id="content">';

	if ($this->params['controller'] != 'pages' and
	 !($this->params['controller'] == 'tipo_cursos' and $this->params['action'] == 'home') and
	 !($this->params['controller'] == 'cursos' and $this->params['action'] == 'index') and
	 !($this->params['controller'] == 'cursos' and $this->params['action'] == 'search') and
	 !($this->params['controller'] == 'cursos' and $this->params['action'] == 'uview') and
	 !($this->params['controller'] == 'cursos' and $this->params['action'] == 'umview') and
	 !($this->params['controller'] == 'cursos' and $this->params['action'] == 'modulos') and
	 !($this->params['controller'] == 'secciones' and $this->params['action'] == 'view'))
	{
		echo '<div id="content">';
		echo '<h2>'.$this->pageTitle.'</h2>';
		if (!($this->params['controller'] == 'usuarios' and $this->params['action'] == 'login') and
			(!($this->params['controller'] == 'cursos' and $this->params['action'] == 'sitemap'))
		)
		
			echo '<div id="botones_alto">'.$html->cssMenu2().'</div>';
		else
			echo '<br>';
		?>
		<div id="lineas"><img src="<?php echo $this->base; ?>/img/lineaxlarga.png" /></div>
<?php }

			echo '<div style="margin-top:20px;margin-left:20px;">';
			$session->flash();
			echo '</div>';
			
			echo $content_for_layout; ?>

		<?php

	if ($this->params['controller'] != 'pages' and
	 !($this->params['controller'] == 'tipo_cursos' and $this->params['action'] == 'home') and
	 !($this->params['controller'] == 'cursos' and $this->params['action'] == 'index') and
	 !($this->params['controller'] == 'cursos' and $this->params['action'] == 'search') and
	 !($this->params['controller'] == 'cursos' and $this->params['action'] == 'uview') and
	 !($this->params['controller'] == 'cursos' and $this->params['action'] == 'umview') and
	 !($this->params['controller'] == 'secciones' and $this->params['action'] == 'view'))
	 {
		echo '</div>';
	 }

	 if ($this->action == 'index' or $this->action == 'lists' or $this->action == 'search' or $this->action == 'modulos')
	 {
	 	if (!($this->params['controller'] == 'cursos' and $this->params['action'] == 'index') and
	 	(!($this->params['controller'] == 'cursos' and $this->params['action'] == 'modulos'))
	 	)
	 	{
?>

<div id="paginas" >
<?php

if ($paginator->counter(array('format' => '%pages%')) > 1)
{
	echo $paginator->counter(array(
	'format' => 'Página %page% de %pages%'
	));

?></div>
<div class="paging">
	<?php echo $paginator->prev('<< Anterior', array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next('Siguiente >>', array(), null, array('class' => 'disabled'));?>
</div>
<?php }}} ?>

		<div id="footer">
				<div class="contacto">
					<p>Ave. Eugenio Garza Sada 2501 Sur<br> Colonia 
					Tecnológico C.P. 64849 | Monterrey, NL.</p><br>
<?php
	if ($this->params['url']['url'] == 'tipo_cursos/home' or $this->params['url']['url'] == 'secciones/view/3')
	{
		echo '<p>Profra. Ma. del Refugio Montemayor<br>
				Teléfono: +52 (81) 83582000 Ext. 4480<br>';
	}
?>
					Llamada sin costo de Sudamérica: 01100800052 1348
					&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
					<?php
						echo '<span class="coldtitulo">'.$html->link('Mapa del Sitio', array('controller' => 'cursos', 'action' => 'sitemap'), array('style' => 'text-decoration:none;font-size:10px;color: #666666;')).'</span>';
					?>
					</p><br>

					<p>D.R. Instituto Tecnológico y de Estudios 
					Superiores de Monterrey, México. 2010 </p>
				</div>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>