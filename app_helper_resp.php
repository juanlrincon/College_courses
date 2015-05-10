<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @subpackage    cake.cake
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
App::import('Core', 'Helper');
/**
 * This is a placeholder class.
 * Create the same file in app/app_helper.php
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake
 */
class AppHelper extends Helper {

function cssMenu2() {
	global $permisos;
	
	$links = '';

	//echo $this->Session->read('url_referrer');
	//echo '<br>';
	//echo $this->params['url']['url'];

	foreach($permisos as $key => $value)
	{
		if (isset($value['path']))
		{
			if ($this->params['action'] == 'view')
				$action2 = 'edit';
			else
				$action2 = '';			

			if ($this->params['controller'].'/'.$this->params['action'] == $value['path'] or $this->params['controller'].'/'.$action2 == $value['path'])
			{
				foreach($value['menu'] as $key2 => $value2)
				{
					if (is_array($value2))
					{
						//echo Regresar
						foreach($value2 as $key3 => $value3)
						{
							if (strlen($value3) >= 1 and strlen($value3) <= 15)
								$links .= '<div id="botones">';
							else if (strlen($value3) >= 15)
								$links .= '<div id="botones2">';
	
							$links .= '<a href="'.$this->base.'/'.$permisos[$key3]['path'].'">'.$value3.'</a>';
							$links .= '</div>';
						}
					}
					else
					{
						if (isset($permisos[$value2]))
						{
							//if ($url_referrer == '/'.$permisos[$value2]['path'] and )
							//	$permisos[$value2]['nombre'] = 'Regresar';
	
							if (strlen($permisos[$value2]['nombre']) >= 1 and strlen($permisos[$value2]['nombre']) <= 15)
								$links .= '<div id="botones">';
							else if (strlen($permisos[$value2]['nombre']) >= 15)
								$links .= '<div id="botones2">';
	
							$links .= '<a href="'.$this->base.'/'.$permisos[$value2]['path'].'">'.$permisos[$value2]['nombre'].'</a>';
							$links .= '</div>';
						}
					}
				}
			}
		}
	}
	return $links;
}

function menu($menu)
{
	//print_r($menu);
	foreach($menu as $key => $value)
	{
		echo $key;
	?>			<div class="menulista"><?php echo $this->link('Diplomados', array('controller' => 'cursos', 'action' => 'index', '3')); ?></div>
				<div class="menulista"><?php echo $this->link('Seminarios', array('controller' => 'cursos', 'action' => 'index', '2')); ?></div>
				<div class="menulista"><?php echo $this->link('Talleres', array('controller' => 'cursos', 'action' => 'index', '4')); ?></div>
				<div class="menulista"><?php echo $this->link('Certificaciones', array('controller' => 'cursos', 'action' => 'index', '4')); ?></div>
	<?php
	}
}


function link2($title, $url = null, $htmlAttributes = array(), $confirmMessage = false, $escapeTitle = true)
{
	global $permisos;

	foreach($permisos as $key => $value)
	{
		if ($url['action'] == 'view')
			$action2 = 'edit';
		else
			$action2 = '';

		if ($url['action'] == 'deactivate')
			$action3 = 'activate';
		else
			$action3 = '';

		if ($this->params['controller'].'/'.$url['action'] == $value['path'] or $this->params['controller'].'/'.$action2 == $value['path'] or $this->params['controller'].'/'.$action3 == $value['path'])
			return $this->link($title, $url, $htmlAttributes, $confirmMessage, $escapeTitle);
	}
}


function format2($date)
{
	global $short_date;

	$date = substr($date,0,10);
	
	$date_split = split(' - ', $this->format('d - M - Y', $date));
	
	return $date_split[0].' - '.$short_date[$date_split[1]].' - '.$date_split[2];
}

}
?>