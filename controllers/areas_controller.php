<?php
class AreasController extends AppController {

	var $name = 'Areas';
	var $helpers = array('Html', 'Form');
    
    function beforeFilter() {
	    parent::beforeFilter();
	    //$this->set('related', 'Cursos');
	   	$this->permissions = $this->permisos_array();
	}
	
	function index() {
		$this->Area->recursive = 0;
		// Título de la página
		$this->pageTitle = 'Lista de Áreas académicas';

		$this->set('areas', $this->paginate());
	}

	function add() {
	    // Título de la página
		$this->pageTitle = 'Nueva Área';
		
		if (!empty($this->data)) {
    	    $this->data['Area']['estatus'] = '1';
    	    $this->data['Area']['created_id'] = $this->Auth->user('id');
    	    
			$this->Area->create();
			if ($this->Area->save($this->data)) {
				$this->Session->setFlash('El Área ha sido añadida');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El Área no pudo ser añadida.');
			}
		}
	}

	function edit($id = null) {
	    // Título de la página 
		$this->pageTitle = 'Edición de Área';
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Clave inválida de Área');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['Area']['modified_id'] = $this->Auth->user('id');
			if ($this->Area->save($this->data)) {
				$this->Session->setFlash('El Área ha sido guardada');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El Área no pudo ser guardada.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Area->read(null, $id);
		}
	}

	function deactivate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Clave inválida de Área');
			$this->redirect(array('action' => 'index'));
		}
	    $this->data['Area']['estatus'] = '0';
		$this->data['Area']['modified_id'] = $this->Auth->user('id');
		if ($this->Area->save($this->data, false)) {
			$this->Session->setFlash('Área desactivada');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('El área no pudo ser desactivada.');
		$this->redirect(array('action' => 'index'));
	}

	function activate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Clave inválida de Área');
			$this->redirect(array('action' => 'index'));
		}
	    $this->data['Area']['estatus'] = '1';
		$this->data['Area']['modified_id'] = $this->Auth->user('id');
	    
		if ($this->Area->save($this->data, false)) {
			    $this->Session->setFlash('Área activada');
				$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('El área no pudo ser activada.');
		$this->redirect(array('action' => 'index'));
	}

}
?>