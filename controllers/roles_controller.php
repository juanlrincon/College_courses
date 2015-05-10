<?php
class RolesController extends AppController {

	var $name = 'Roles';
	var $helpers = array('Html', 'Form');

	function beforeFilter() {
	    parent::beforeFilter();
	   	$this->Auth->userModel = 'Usuario';
		$this->permissions = $this->permisos_array();
		//$this->set('related', 'Roles');
	}

	function index() {
		$this->Rol->recursive = 2;
		// Título de la página 
		$this->pageTitle = 'Lista de Roles de Usuarios';
		$this->set('roles', $this->paginate());
	}

	function add() {
	    // Título de la página 
		$this->pageTitle = 'Añdir Nuevo Rol';
		
		if (!empty($this->data)) {
    	    $this->data['Rol']['estatus'] = '1';
			$this->data['Rol']['created_id'] = $this->Auth->user('id');
			$this->Rol->create();
			if ($this->Rol->save($this->data)) {
				$this->Session->setFlash('El rol ha sido añadido');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El rol no pudo ser añadido. Por favor, trate de nuevo.');
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Clave inválida de Rol');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['Rol']['modified_id'] = $this->Auth->user('id');
			if ($this->Rol->save($this->data)) {
				$this->Session->setFlash('El rol ha sido guardado');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El rol no pudo ser guardado.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Rol->read(null, $id);
		}
	}

	function deactivate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Clave inválida de Rol');
			$this->redirect(array('action' => 'index'));
		}
	    $this->data['Rol']['estatus'] = '0';
		$this->data['Rol']['modified_id'] = $this->Auth->user('id');	    
		if ($this->Rol->save($this->data)) {
			    $this->Session->setFlash('Rol desactivado');
				$this->redirect(array('action' => 'index'));
		    }
		$this->Session->setFlash('El rol no pudo ser desactivado.');
		$this->redirect(array('action' => 'index'));
	}
	
	function activate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Clave inválida de Rol');
			$this->redirect(array('action' => 'index'));
		}
	    $this->data['Rol']['estatus'] = '1';
		$this->data['Rol']['modified_id'] = $this->Auth->user('id');

		if ($this->Rol->save($this->data)) {
			    $this->Session->setFlash('Rol activado');
				$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('El rol no pudo ser activado.');
		$this->redirect(array('action' => 'index'));
	}
}
?>