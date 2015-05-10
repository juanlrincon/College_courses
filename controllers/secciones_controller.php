<?php
class SeccionesController extends AppController {

	var $name = 'Secciones';
	var $helpers = array('Html', 'Form');
    
    function beforeFilter() {
	    parent::beforeFilter();
	    //$this->set('related', 'Cursos');
	   	$this->permissions = $this->permisos_array();
	   	$this->Auth->allowedActions = array('view');

	  /*  $menu = $this->Session->read('menu');

	    if (count($menu) <= 1)
	    {
	    	$this->redirect(array('controller' => 'cursos', 'action' => 'create_menu'));
	    }
	    $this->set('menu', $menu);
	    */
	   	$this->loadModel('TipoCurso');
	   			$menu = $this->TipoCurso->find('list', array(
		    'fields' => array('TipoCurso.id', 'TipoCurso.nombre'),
		    'conditions' => array('TipoCurso.id' => array(1,2,3,4), 'TipoCurso.estatus' => '1')
		));

	    $this->set('menu', $menu);
	}
	
	function index() {
		$this->Seccion->recursive = 0;
		// Título de la página
		$this->pageTitle = 'Lista de La Secciones';

		$this->set('secciones', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Código inválido de Sección');
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
		$this->set('seccion', $this->Seccion->read(null, $id));
	}

	function edit($id = null) {
	    // Título de la página 
		$this->pageTitle = 'Editar Sección';
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Clave inválida de Sección');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Seccion->save($this->data)) {
				$this->Session->setFlash('La Sección ha sido guardada');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('La Sección no pudo ser guardada.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Seccion->read(null, $id);
		}
	}

}
?>