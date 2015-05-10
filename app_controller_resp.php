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

    var $paginate = array(
        'limit' => 3
    );

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
        
        //$this->Auth->allowedActions = array('display');
        // Otras validaciones: el usuario debe estar activo 
        // loadModel('Status')
        ////$this->Auth->userScope = array('User.active' => true);
        //$this->Auth->userScope = array('Usuario.status_id' => $statusActivo);
        //echo $this->Session->read('url_referrer2');
//        echo $this->referer();
        //if ($this->Session->read('url_referrer') != $this->Session->read('url_referrer2'))
//        	$this->Session->write('url_referrer2',$this->Session->read('url_referrer'));
/*
        if ($this->Session->read('url_referrer') != $this->params['url']['url'])
        	$this->Session->write('url_referrer',$this->params['url']['url']);
        else
        	echo 'son iguales';
*/
       // echo $this->referer();
        $menu = $this->Session->read('menu');
        $this->set('menu', $menu);
		//echo $this->Curso->TipoCurso->field('nombre', array('id' => '1'));
//echo $this->TipoCurso->field('nombre', array('id' => '1'));
//$this->query('select * from cursos');

        $this->permisos();
        $this->set('permiso', $permiso);
        $this->set('permisos', $permisos);
    }



function permisos() {
	global $permisos;

	if ($this->Auth->user('rol_id') != 1)	// Administrador = 1
	{
		$sql = "SELECT * FROM permisos WHERE rol_id = '".$this->Auth->user('rol_id')."'";
	
		$record = mysql_query($sql);
		
	
		if ($record)
		{
			$row = mysql_fetch_array($record);
		
			
			for($i=1;$i<=count($permisos);$i++)
			{
				if ($row['p'.$i] != 1)
				{
					unset($permisos[$i]);
				}
			}
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

/*else
{
	unset($permisos);
}*/
	//return $permiso;
}


function permisos_array() {
	global $permisos;

      //  $this->set('url_referrer', $this->referer());
//echo $this->referer();
   //$this->set('url_referrer', $this->referer());

	$permisos2 = '';
	//$sql = "SELECT * FROM permisos WHERE id = '".$this->Auth->user('rol_id')."'";

	//$record = mysql_query($sql);

	//$row = mysql_fetch_array($record);

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
       // $this->redirect(array('controller' => 'cursos', 'action' => 'index'));
        return false;
        
    }
    
}
?>