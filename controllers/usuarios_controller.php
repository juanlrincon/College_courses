<?php
class UsuariosController extends AppController {

	var $name = 'Usuarios';
	var $helpers = array('Html', 'Form');

	function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->userModel = 'Usuario';
	    $this->Auth->allowedActions = array('login','login2','logout', 'info');
	    //$this->set('related', 'Usuarios');

	    $this->Auth->allow('logout'); 
	    $this->permissions = $this->permisos_array();

	    /*$menu = $this->Session->read('menu');

	    if (count($menu) <= 1)
	    {
	    	$this->redirect(array('controller' => 'cursos', 'action' => 'create_menu'));
	    }
	    $this->set('menu', $menu);*/
	   	$this->loadModel('TipoCurso');
	   			$menu = $this->TipoCurso->find('list', array(
		    'fields' => array('TipoCurso.id', 'TipoCurso.nombre'),
		    'conditions' => array('TipoCurso.id' => array(1,2,3,4), 'TipoCurso.estatus' => '1')
		));

	    $this->set('menu', $menu);
	}

    function welcome(){
    }

    function login(){
    	$this->Session->del('Message.auth');
    	//$this->Auth->authError = 'caca';
    	//print_r($this->Auth);
    	$this->pageTitle = 'Acceso a Portal';
        if($this->Auth->user()){
        	$this->Session->write('rol', $this->Usuario->Rol->field('nombre',array('id' => $this->Auth->user('rol_id'))));
        	//$this->redirect($this->Auth->redirect());
        	$this->redirect(array('controller' => 'usuarios', 'action' => 'login2'));
        }
    }

	function login2(){
		if ($this->Auth->user())
	        {
	        	$this->Session->write('rol', $this->Usuario->Rol->field('nombre',array('id' => $this->Auth->user('rol_id'))));
				$_SESSION['rol'] = $this->Auth->user('rol_id');
				$_SESSION['nombre_usuario'] = $this->Auth->user('nombres').' '.$this->Auth->user('apellido_paterno').' '.$this->Auth->user('apellido_materno');
				//$this->redirect($this->Auth->redirect());

				$bienvenida = $this->Usuario->Rol->find('list', array(
				    'fields' => array('Rol.mensaje'),
				    'conditions' => array('Rol.estatus' => '1', 'Rol.id' => $this->Auth->user('rol_id'))
				));

				if ($this->Auth->user('rol_id') == 6)
				{
					$this->redirect(array('controller' => 'curso_participantes', 'action' => 'uindex'));
				}
				else
				{
					$this->Session->write('bienvenida',$bienvenida);
					$this->redirect(array('controller' => 'pages', 'action' => 'welcome'));
				}				
	        }
	    }

    function logout(){
		unset($_SESSION['rol']);
    	clearCache();
		cache::Clear();
		$this->redirect($this->Auth->logout());

    } 

	
	function index() {
		$this->Usuario->recursive = 0;
		// Título de la página 
		$this->pageTitle = 'Lista de Usuarios';

		////if ($this->Auth->user('rol_id') == 3) // vendedor
		////{
		////	$data = $this->paginate('Usuario', array('Usuario.created_id =' => $this->Auth->user('id')));
		////	$this->set('usuarios', $data);
		////}
		////else
		////{
			$this->set('usuarios', $this->paginate());
		////}
	}

	function view($id = null) {
		$this->pageTitle = 'Informaci&oacute;n de Usuario';
		if (!$id) {
			$this->Session->setFlash('Código inválido de Usuario');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('usuario', $this->Usuario->read(null, $id));
	}

	function add() {
	    // Título de la página 
		$this->pageTitle = 'Añadir Usuario';
		if (!empty($this->data)) {
		    // Obtener nombre del usuario 
		    $this->data['Usuario']['nombre_usuario'] = $this->data['Usuario']['correo_electronico'];

		    $password = $this->data['Usuario']['password'];

		    $this->data['Usuario']['created_id'] = $this->Auth->user('id');

		    // Obtiene y genera password 
//		    $arroba = strpos($this->data['Usuario']['correo_electronico'], '@');
//		    if ($arroba) {
//		        $this->data['Usuario']['password'] = $this->Auth->password(substr($this->data['Usuario']['correo_electronico'], 0, $arroba+1));
//	        }
    	    $this->data['Usuario']['estatus'] = '1';
        	//$this->data['Usuario']['created_id'] = $this->Auth->user('id');
    	    $this->Usuario->set($this->data);

    	    if ($this->Usuario->validates()) {
//echo $this->data['Usuario']['confirmar_password'].'<--';
		    	$this->data['Usuario']['password'] = $this->Auth->password($this->data['Usuario']['password']);

    	    	if ($password == $this->data['Usuario']['confirmar_password'])
				{
				    $this->Usuario->create();
				    if ($this->Usuario->save($this->data)) { 
					    $this->Session->setFlash('El Usuario ha sido añadido.');
					    $this->redirect(array('action' => 'index'));
				    } else {
				    	$this->data['Usuario']['password'] = $password;
					    $this->Session->setFlash('El Usuario no pudo ser añadido. Por favor, trate de nuevo.');
				    }
				}
				else
				{
					    $this->data['Usuario']['password'] = $password;
				    	$this->Session->setFlash('El password no coincide. Por favor, trate de nuevo.');				
				}
				    
		    } else {
			    $this->data['Usuario']['password'] = $password;
		    	$this->Session->setFlash('El Usuario no pudo ser añadido. Por favor, trate de nuevo.');
		    }
		}

		if ($this->Auth->user('rol_id') == 3) // vendedor
		{
			// Asiganción de lista de roles activos 
			$this->set('roles', $this->Usuario->Rol->find('list', array(
			    'fields' => array('Rol.nombre'),
			    'conditions' => array('Rol.estatus' => '1', 'Rol.id ' => array('6', '4'))
			)));
		}
		else
		{
			// Asiganción de lista de roles activos 
			$this->set('roles', $this->Usuario->Rol->find('list', array(
			    'fields' => array('Rol.nombre'),
			    'conditions' => array('Rol.estatus' => '1', 'Rol.id != ' => '1')
			)));
		}
	}

	function edit($id = null) {
	    // Título de la página 
		$this->pageTitle = 'Editar Usuario';
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Código inválido de Usuario');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
		    // Si el password no fue modificado, no se actualizará 
		    if (empty($this->data['Usuario']['password']))
		    {
		        unset($this->data['Usuario']['password']);
				unset($this->data['Usuario']['confirmar_password']);
		    }
		    else
		    {
				$password = $this->data['Usuario']['password'];
		    	$this->data['Usuario']['password'] = $this->Auth->password($this->data['Usuario']['password']);
		    }


		    $this->data['Usuario']['modified_id'] = $this->Auth->user('id');
    	    $this->Usuario->set($this->data);
            if ($this->Usuario->validates()) {


	   	    	if (!isset($this->data['Usuario']['password']) or ($password == $this->data['Usuario']['confirmar_password']))
				{
	            	//$this->data['Usuario']['password'] = $this->Auth->password($this->data['Usuario']['password']);
	            	// Actualizar el registro 
				    if ($this->Usuario->save($this->data, array('validate' => false))) {
					    $this->Session->setFlash('El Usuario ha sido guardado.');
					    $this->redirect(array('action' => 'index'));
				    } else {
					    $this->Session->setFlash('El Usuario no pudo ser guardado. Por favor, trate de nuevo.');
				    }
				}
				else
				{
					//if (isset($this->data['Usuario']['password']))
					    $this->data['Usuario']['password'] = $password;

				    $this->Session->setFlash('El password no coincide. Por favor, trate de nuevo.');				
				}
			} else {
					//if (isset($this->data['Usuario']['password']))
					    $this->data['Usuario']['password'] = $password;

	            	$this->Session->setFlash('El Usuario no pudo ser guardado. Por favor, trate de nuevo.');
            }
		}
		if (empty($this->data)) {
			$this->data = $this->Usuario->read(null, $id);
			// El password no se muestra en la forma de edición (solo se actualiza si se captura algún dato)
			$this->data['Usuario']['password'] = '';
		}

		$this->set('roles', $this->Usuario->Rol->find('list', array(
		    'fields' => array('Rol.nombre'),
		    'conditions' => array('Rol.estatus' => '1', 'Rol.id != ' => '1')
		)));
		
		if ($this->Auth->user('rol_id') == 1)	// Administrador = 1
			$this->set('admin', 1);
		else
			$this->set('admin', 0);		
	}

	function info() {
	    // Título de la página 
		$this->pageTitle = 'Editar Información Personal';
		$id = $this->Auth->user('id');
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Código inválido de Usuario');
			$this->redirect(array('action' => 'info'));
		}
		if (!empty($this->data)) {
		    // Si el password no fue modificado, no se actualizará 
		    if (empty($this->data['Usuario']['password']))
		    {
		        unset($this->data['Usuario']['password']);
				unset($this->data['Usuario']['confirmar_password']);
		    }
		    else
		    {
				$password = $this->data['Usuario']['password'];
		    	$this->data['Usuario']['password'] = $this->Auth->password($this->data['Usuario']['password']);
		    }

		    $this->data['Usuario']['modified_id'] = $this->Auth->user('id');
    	    $this->Usuario->set($this->data);
            if ($this->Usuario->validates()) {

	   	    	if (!isset($this->data['Usuario']['password']) or ($password == $this->data['Usuario']['confirmar_password']))
				{
	            	//$this->data['Usuario']['password'] = $this->Auth->password($this->data['Usuario']['password']);
	            	// Actualizar el registro 
				    if ($this->Usuario->save($this->data, array('validate' => false))) {
					    $this->Session->setFlash('Su información personal ha sido guardada.');
					    $this->redirect(array('action' => 'info'));
				    } else {
					    $this->Session->setFlash('La información no pudo ser guardada. Por favor, trate de nuevo.');
				    }
				}
				else
				{
					//if (isset($this->data['Usuario']['password']))
					    $this->data['Usuario']['password'] = $password;

				    $this->Session->setFlash('El password no coincide. Por favor, trate de nuevo.');				
				}
			} else {
					//if (isset($this->data['Usuario']['password']))
					    $this->data['Usuario']['password'] = $password;

	            	$this->Session->setFlash('La información no pudo ser guardada. Por favor, trate de nuevo.');
            }
		}
		if (empty($this->data)) {
			$this->data = $this->Usuario->read(null, $id);
			// El password no se muestra en la forma de edición (solo se actualiza si se captura algún dato)
			$this->data['Usuario']['password'] = '';
		}
	}

	function deactivate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Código inválido de Usuario');
			$this->redirect(array('action' => 'index'));
		}
		$this->data['Usuario']['estatus'] = '0';
		$this->data['Usuario']['modified_id'] = $this->Auth->user('id');
		if ($this->Usuario->save($this->data)) {
			$this->Session->setFlash('Usuario desactivado');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('El Usuario no pudo ser desactivado. Por favor, trate de nuevo.');
		$this->redirect(array('action' => 'index'));
	}
	
	function activate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Código inválido de Usuario');
			$this->redirect(array('action' => 'index'));
		}
	    $this->data['Usuario']['estatus'] = '1';
		$this->data['Usuario']['modified_id'] = $this->Auth->user('id');
		if ($this->Usuario->save($this->data)) {
			$this->Session->setFlash('Usuario activado');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('El Usuario no pudo ser activado. Por favor, trate de nuevo.');
		$this->redirect(array('action' => 'index'));
	}

}
?>