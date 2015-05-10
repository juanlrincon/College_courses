<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Short description for class.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
    var $helpers = array('CssMenu', 'Html', 'Form', 'Time');
	var $components = array('Auth', 'RequestHandler', 'Session');
    var $permissions = array();
/*
    var $paginate = array(
        'limit' => 3
    );
*/
    function beforeFilter(){
    	global $permiso, $permisos;

        $this->Auth->authorize = 'controller';
        $this->Auth->autoRedirect = false;
        $this->Auth->loginAction = array('controller' => 'usuarios', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'usuarios', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'usuarios', 'action' => 'login2'); 

        App::import('L10n'); 
        $this->L10n = new L10n; 
        $this->L10n->get('spa');
        $os = env('OS'); 
        if (!empty ($os) && strpos($os, 'Windows') !== false) { 
            setlocale(LC_ALL, array('Spanish (Mexico)', 'Spanish'));
        } else {
            setlocale(LC_ALL, array('es_ES.UTF8','es_ES.UTF-8','es.UTF8','es.UTF-8','es_ES.ISO8859-1','es.ISO8859-1','es_ES','es','spanish','en_US.UTF8','en_US.UTF-8','en.UTF8','en.UTF-8','en_US.ISO8859-1','en.ISO8859-1','en_US','en','eng','english'));
        }
        setlocale(LC_TIME, 'es-ES');

        // Nombre del modelo con iformación para autentificación 
        $this->Auth->userModel = 'Usuario';
        $this->Auth->fields = array('username' => 'nombre_usuario', 'password' => 'password');
        
        // loadModel('Status')
        ////$this->Auth->userScope = array('User.active' => true);
        //$this->Auth->userScope = array('Usuario.status_id' => $statusActivo);


		//$permisos = $this->Session->read('permisos');

        $this->set('permiso', $permiso);
        $this->set('permisos', $permisos);
    }



function permisos() {

}


function permisos_array() {
	global $permisos, $permiso;
	$permisos = $permiso;

	if ($this->Auth->user('rol_id') != 1)	// Administrador = 1
	{
		$sql = "SELECT * FROM permisos WHERE rol_id = '".$this->Auth->user('rol_id')."'";

		$record = mysql_query($sql);



		if ($record)
		{
			if (mysql_num_rows($record) == 0)
			{
				unset($permisos);
				$permisos = array();
			}

			$row = mysql_fetch_array($record);

			foreach($permisos as $key => $value)
			{
				if ($row['p'.$key] != 1)
				{
					unset($permisos[$key]);
					
				}
			}
		}
		else
		{
			unset($permisos);
			$permisos = array();
		}
	}

	if ($this->Auth->user('rol_id') == 1)
	{
		$permisos[46]['nombre'] = 'Agregar Permiso';
		$permisos[46]['path'] = 'permisos/add';
		$permisos[46]['menu'] = array(array('48' => 'Regresar'));
		$permisos[47]['nombre'] = 'Editar Permiso';
		$permisos[47]['path'] = 'permisos/edit';
		$permisos[47]['menu'] = array(array('48' => 'Regresar'));
		$permisos[48]['nombre'] = 'Permisos';
		$permisos[48]['path'] = 'permisos/index';
		$permisos[48]['menu'] = array(array('3' => 'Regresar'), '46');
	}

	$config =& Configure::getInstance();
	$config->permisos = $permisos;
        $this->set('permisos', $permisos);
	$permisos2 = '';
//print_r($permisos);
if (count($permisos) > 0)
	foreach($permisos as $key => $value)
	{
		if (ereg($this->params['controller'], $value['path']))
		{
			if (ereg('add', $value['path']))
				$permisos2['add'] = '*';

			if (ereg('edit', $value['path']))
				$permisos2['edit'] = '*';

			if (ereg('lists', $value['path']))
				$permisos2['lists'] = '*';

			if (ereg('activate', $value['path']))
			{
				$permisos2['activate'] = '*';
				$permisos2['deactivate'] = '*';
			}

			if (ereg('index', $value['path']))
			{
				$permisos2['index'] = '*';
				$permisos2['view'] = '*';
			}
		}
	}
	return $permisos2;
}



function isAuthorized(){
        if($this->Auth->user('rol_id') == 1) return true; //Remove this line if you don't want admins to have access to everything by default
        if(!empty($this->permissions[$this->action])){
            if($this->permissions[$this->action] == '*') return true;
            if(in_array($this->Auth->user('rol'), $this->permissions[$this->action])) return true;
        }
        $this->Session->setFlash('No estas autorizado para accesar a esta area.');
        $this->redirect(array('controller' => 'pages', 'action' => 'error'));
        return false;
        
    }
}
?>