<?php
class PermisosController extends AppController {

	var $name = 'Permisos';
	var $helpers = array('Html', 'Form');

	function beforeFilter() {
		global $permiso;
	    parent::beforeFilter();
	    $this->Auth->userModel = 'Usuario';
	   	if ($this->Auth->user('rol_id') == 1)	// Administrador = 1
		{
	    	$this->Auth->allowedActions = array('*');
	    }
	    $this->set('related', 'Usuarios');
	    $this->permissions = $this->permisos_array();
	}

	function index() {
		$this->pageTitle = 'Lista de Permisos';
		$this->Permiso->recursive = 2; // recursivo 2 para verificar si se puede borrar un permiso
		$this->set('permisos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Permiso Invalido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('permiso', $this->Permiso->read(null, $id));
	}

	function add() {
		$this->pageTitle = 'Agregar Permiso';
		if (!empty($this->data)) {
			
		if ($this->data['Permiso']['p1'] == 1 or $this->data['Permiso']['p2'])
			$this->data['Permiso']['p3'] = 1;
				
		if ($this->data['Permiso']['p5'] == 1 or $this->data['Permiso']['p6'])
			$this->data['Permiso']['p8'] = 1;
			
		if ($this->data['Permiso']['p11'] == 1 or $this->data['Permiso']['p12'])
			$this->data['Permiso']['p13'] = 1;
			
		if ($this->data['Permiso']['p15'] == 1 or $this->data['Permiso']['p16'])
			$this->data['Permiso']['p17'] = 1;
			
		if ($this->data['Permiso']['p19'] == 1 or $this->data['Permiso']['p20'])
			$this->data['Permiso']['p21'] = 1;
			
		if ($this->data['Permiso']['p23'] == 1 or $this->data['Permiso']['p24'])
			$this->data['Permiso']['p25'] = 1;

		if ($this->data['Permiso']['p27'] == 1 or $this->data['Permiso']['p28'])
			$this->data['Permiso']['p29'] = 1;
			
		if ($this->data['Permiso']['p31'] == 1 or $this->data['Permiso']['p32'])
			$this->data['Permiso']['p33'] = 1;

		if ($this->data['Permiso']['p35'] == 1 or $this->data['Permiso']['p36'])
			$this->data['Permiso']['p37'] = 1;
			
		if ($this->data['Permiso']['p39'] == 1 or $this->data['Permiso']['p40'])
			$this->data['Permiso']['p41'] = 1;

		if ($this->data['Permiso']['p43'] == 1)
			$this->data['Permiso']['p44'] = 1;

			
			$this->Permiso->create();
			if ($this->Permiso->save($this->data)) {
				$this->Session->setFlash(__('El Permiso ha sido guardado correctamente', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El Permiso no se pudo guardar', true));
			}
		}
		
		$sql = "SELECT
					roles.id, roles.nombre
				FROM
					roles
				LEFT JOIN
					permisos
				ON
					roles.id = permisos.rol_id
				WHERE
					permisos.id is NULL
				AND
					roles.estatus = '1'
				AND
					roles.nombre != 'Administrador'";
		
		$roles = $this->Permiso->query($sql);
		
		foreach($roles as $key => $value)
		{
			$array[$value['roles']['id']] = $value['roles']['nombre'];
		}
	
		if (!isset($array))
		{
			$this->redirect(array('controller' => 'roles', 'action' => 'add'));
		}

		$this->set('roles', $array);		
	}

	function edit($id = null) {
		$this->pageTitle = 'Editar Permiso';
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Permiso Invalido', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			
			
		if ($this->data['Permiso']['p1'] == 1 or $this->data['Permiso']['p2'])
			$this->data['Permiso']['p3'] = 1;
				
		if ($this->data['Permiso']['p5'] == 1 or $this->data['Permiso']['p6'])
			$this->data['Permiso']['p8'] = 1;
			
		if ($this->data['Permiso']['p11'] == 1 or $this->data['Permiso']['p12'])
			$this->data['Permiso']['p13'] = 1;
			
		if ($this->data['Permiso']['p15'] == 1 or $this->data['Permiso']['p16'])
			$this->data['Permiso']['p17'] = 1;
			
		if ($this->data['Permiso']['p19'] == 1 or $this->data['Permiso']['p20'])
			$this->data['Permiso']['p21'] = 1;
			
		if ($this->data['Permiso']['p23'] == 1 or $this->data['Permiso']['p24'])
			$this->data['Permiso']['p25'] = 1;

		if ($this->data['Permiso']['p27'] == 1 or $this->data['Permiso']['p28'])
			$this->data['Permiso']['p29'] = 1;
			
		if ($this->data['Permiso']['p31'] == 1 or $this->data['Permiso']['p32'])
			$this->data['Permiso']['p33'] = 1;

		if ($this->data['Permiso']['p35'] == 1 or $this->data['Permiso']['p36'])
			$this->data['Permiso']['p37'] = 1;
			
		if ($this->data['Permiso']['p39'] == 1 or $this->data['Permiso']['p40'])
			$this->data['Permiso']['p41'] = 1;

		if ($this->data['Permiso']['p43'] == 1)
			$this->data['Permiso']['p44'] = 1;

			if ($this->Permiso->save($this->data)) {
				$this->Session->setFlash(__('El Permiso ha sido guardado correctamente', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El Permiso no se pudo guardar', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Permiso->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('id invalida para Permiso', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Permiso->del($id)) {
			$this->Session->setFlash(__('Permiso borrado', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El permiso no se pudo borrar', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>