<?php
class EstadosController extends AppController {

	var $name = 'Estados';
	var $helpers = array('Html', 'Form');
	
	function beforeFilter() {
	    parent::beforeFilter();
	    //$this->Auth->allowedActions = array('*');
	    //$this->set('related', 'Cursos');
	    $this->permissions = $this->permisos_array();
	}
	
	function index() {
		
   
		$this->Estado->recursive = 0;
		// Título de la página 
		$this->pageTitle = 'Lista de Estados';
	    $this->set('statusActivo', '1');

		$this->set('estados', $this->paginate());
	}

	function add() {
	    // Título de la página 
		$this->pageTitle = 'Nuevo Estado';
		
		if (!empty($this->data)) {
    	    $this->data['Estado']['estatus'] = '1';
    	    $this->data['Estado']['created_id'] = $this->Auth->user('id');
			$this->Estado->create();
			if ($this->Estado->save($this->data)) {
				$this->Session->setFlash('El estado ha sido añadido');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El estado no pudo ser añadido.');
			}
		}

		// Asiganción de lista de países activos 
		$this->set('paises', $this->Estado->Pais->find('list', array(
		    'fields' => array('Pais.nombre'),
		    'conditions' => array('Pais.estatus' => '1')
		)));
	}

	function edit($id = null) {
	    // Título de la página 
		$this->pageTitle = 'Editar de Estado';
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Clave inválida de Estado');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['Estado']['modified_id'] = $this->Auth->user('id');
			if ($this->Estado->save($this->data)) {
				$this->Session->setFlash('El estado ha sido guardado');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El estado no pudo ser guardado.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Estado->read(null, $id);
		}
        
		// Asiganción de lista de países activos 
		$this->set('paises', $this->Estado->Pais->find('list', array(
		    'fields' => array('Pais.nombre'),
		    'conditions' => array('Pais.estatus' => '1')
		)));
	}

	function deactivate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Clave inválida de estado');
			$this->redirect(array('action' => 'index'));
		}

	    $this->data['Estado']['estatus'] = '0';
		$this->data['Estado']['modified_id'] = $this->Auth->user('id');
    	if ($this->Estado->save($this->data, false)) {
    	    // 'Inactivar' los registros de todas las ciudades de los estados/provincias/departamentos del país 

	        if ($this->Estado->Ciudad->updateAll(array('Ciudad.estatus' => '0'), array('Ciudad.estado_id' => $id))) {
			    $this->Session->setFlash('Estado desactivado');
			    $this->redirect(array('action' => 'index'));
		    }
		}
		$this->Session->setFlash('El estado no pudo ser desactivado.');
		$this->redirect(array('action' => 'index'));
	}
	
	function activate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Clave inválida de estado');
			$this->redirect(array('action' => 'index'));
		}
	    $this->data['Estado']['estatus'] = '1';
		$this->data['Estado']['modified_id'] = $this->Auth->user('id');
    	if ($this->Estado->save($this->data, false)) {
			    $this->Session->setFlash('Estado activado');
			    $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('El estado no pudo ser activado.');
		$this->redirect(array('action' => 'index'));
	}
	
}
?>