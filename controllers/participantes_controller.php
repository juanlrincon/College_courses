<?php
class ParticipantesController extends AppController {

	var $name = 'Participantes';
	var $helpers = array('Html', 'Form');
	
	function beforeFilter() {
	    parent::beforeFilter();
	    //$this->Auth->allowedActions = array('*');
	    $this->permissions = $this->permisos_array();
	    //$this->set('related', 'Usuarios');

	}
	
	function index() {
		$this->pageTitle = 'Lista de Participantes';
		$this->Participante->recursive = 0;
		$this->set('participantes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Participante Invalido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('participante', $this->Participante->read(null, $id));
	}

	function add() {
		$this->pageTitle = 'Nuevo Participante';
		if (!empty($this->data)) {
    	    $this->data['Participante']['estatus'] = '1';
			$this->data['Participante']['created_id'] = $this->Auth->user('id');
			$this->Participante->create();
			if ($this->Participante->save($this->data)) {
				$this->Session->setFlash(__('El Participante ha sido guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El Participante no pudo ser guardado.', true));
			}
		}
		/*$this->set('usuarios', $this->Participante->Usuario->find('superlist', array(
		    'fields' => array('Usuario.id', 'Usuario.nombres', 'Usuario.apellido_paterno', 'Usuario.apellido_materno'),
		    'conditions' => array('Usuario.estatus' => '1', 'Usuario.id != ' => '1')
		)));*/
		
		
		$sql = "SELECT
					a.id, a.nombres, a.apellido_paterno, a.apellido_materno
				FROM
					usuarios a
				LEFT JOIN
					participantes b
				ON
					a.id = b.usuario_id
				AND
					b.estatus = '1'
				WHERE
					b.id is NULL
				AND
					a.estatus = '1'
				AND
					a.id != 1";
		
		$usuarios = $this->Participante->query($sql);

		foreach($usuarios as $key => $value)
		{
			$array[$value['a']['id']] = $value['a']['nombres'].' '.$value['a']['apellido_paterno'].' '.$value['a']['apellido_materno'];
		}

		if (!isset($array))
		{
			$this->Session->setFlash(__('No hay usuarios disponibles para agregar participantes, favor de agregar un usuario', true));
			$this->redirect(array('controller' => 'usuarios', 'action' => 'add'));
		}

		$this->set('usuarios', $array);

	}

	function edit($id = null) {
		$this->pageTitle = 'Editar Participante';
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Participante Invalido', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['Participante']['modified_id'] = $this->Auth->user('id');
			if ($this->Participante->save($this->data)) {
				$this->Session->setFlash(__('El Participante ha sido guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El Participante no pudo ser guardado.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Participante->read(null, $id);
		}

		$this->set('usuarios', $this->Participante->Usuario->find('superlist', array(
		    'fields' => array('Usuario.id', 'Usuario.nombres', 'Usuario.apellido_paterno', 'Usuario.apellido_materno'),
		    'conditions' => array('Usuario.estatus' => '1')
		)));

		
		//$result[$this->alias]['full_name'] = $result[$this->alias]['first_name'] . ' ' . $result[$this->alias]['last_name'];

		
	}

	function deactivate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Código inválido para el Participante');
			$this->redirect(array('action' => 'index'));
		}
		$this->data['Participante']['estatus'] = '0';
		$this->data['Participante']['modified_id'] = $this->Auth->user('id');
		if ($this->Participante->save($this->data)) {
			$this->Session->setFlash('Participante desactivado');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('El Participante no pudo ser desactivado.');
		$this->redirect(array('action' => 'index'));
	}
	
	function activate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Código inválido de Participante');
			$this->redirect(array('action' => 'index'));
		}
	    $this->data['Participante']['estatus'] = '1';
		$this->data['Participante']['modified_id'] = $this->Auth->user('id');
		if ($this->Participante->save($this->data)) {
			$this->Session->setFlash('Usuario activado');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('El Participante no pudo ser activado.');
		$this->redirect(array('action' => 'index'));
	}

}
?>