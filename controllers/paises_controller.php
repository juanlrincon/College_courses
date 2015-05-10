<?php
class PaisesController extends AppController {

	var $name = 'Paises';
	var $helpers = array('Html', 'Form');
	
	function beforeFilter() {
	    parent::beforeFilter();
	    //$this->Auth->allowedActions = array('*');
	    //$this->set('related', 'Cursos');
	   	$this->permissions = $this->permisos_array();
	}
	
	function index() {
		$this->Pais->recursive = 0;
		// Título de la página 
		$this->pageTitle = 'Lista de Países';
		$this->set('paises', $this->paginate());
	} 

	function add() {
	    // Título de la página 
		$this->pageTitle = 'Nuevo País';
		
		if (!empty($this->data)) {
    	    $this->data['Pais']['estatus'] = '1';
			$this->data['Pais']['created_id'] = $this->Auth->user('id');
			$this->Pais->create();
			if ($this->Pais->save($this->data)) {
				$this->Session->setFlash('El país ha sido añadido');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El país no pudo ser añadido. Es probable que ya exista un país con ese nombre.');
			}
		}
	}

	function edit($id = null) {
	    // Título de la página 
		$this->pageTitle = 'Edición de País';
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Clave inválida de país');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['Pais']['modified_id'] = $this->Auth->user('id');
			if ($this->Pais->save($this->data)) {
				$this->Session->setFlash('El país ha sido modificado');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El país no pudo ser modificado. Por favor, trate de nuevo.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Pais->read(null, $id);
		}
	}

	function deactivate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Clave inválida de país');
			$this->redirect(array('action' => 'index'));
		}
	    $this->data['Pais']['estatus'] = '0';
		$this->data['Pais']['modified_id'] = $this->Auth->user('id');
    	if ($this->Pais->save($this->data, false)) {
		        $this->Session->setFlash('País desactivado');
		        $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('El país no pudo ser desactivado. Por favor, trate de nuevo.');
		$this->redirect(array('action' => 'index'));
	}
	
	function activate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Clave inválida de país');
			$this->redirect(array('action' => 'index'));
		}
	    $this->data['Pais']['estatus'] = '1';
		$this->data['Pais']['modified_id'] = $this->Auth->user('id');
    	if ($this->Pais->save($this->data, false)) {
		        $this->Session->setFlash('País activado');
		        $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('El país no pudo ser activado. Por favor, trate de nuevo.');
		$this->redirect(array('action' => 'index'));
	}
	
}
?>