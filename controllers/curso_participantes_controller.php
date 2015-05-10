<?php
class CursoParticipantesController extends AppController {

	var $name = 'CursoParticipantes';
	var $helpers = array('Html', 'Form', 'Ajax', 'Javascript');
	
	function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allowedActions = array('update_fechas', 'uindex');
	    $this->permissions = $this->permisos_array();
	}

	function index() {
		$this->pageTitle = 'Lista de Inscripciones';
		$this->CursoParticipante->recursive = 2;

		if ($this->Auth->user('rol_id') == 3) // vendedor
		{
			$data = $this->paginate('CursoParticipante', array('Curso.vendedor_id =' => $this->Auth->user('id')));
			$this->set('cursoParticipantes', $data);
		}
		else
		{
			$this->set('cursoParticipantes', $this->paginate());
		}	
	}

	function uindex() {
		$this->CursoParticipante->recursive = 2;
	//print_r();
		$usuario_id = $this->Auth->user('id');
		$participante_id = $this->CursoParticipante->query("SELECT id FROM participantes WHERE usuario_id = '".$usuario_id."'");

		$participante_id = Set::extract('/participantes/id', $participante_id);

		$this->set('cursoParticipantes', $this->paginate(array('Participante.id ' => $participante_id[0])));
		
		
//		$cursos = $this->paginate('Curso', array('Curso.tipo_curso_id =' => $id));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Código inválido de Inscripción', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('cursoParticipante', $this->CursoParticipante->read(null, $id));
	}

	function add() {
		$this->pageTitle = 'Inscripción';
		if (!empty($this->data)) {
    	    $this->data['CursoParticipante']['estatus'] = '1';
			$this->data['CursoParticipante']['created_id'] = $this->Auth->user('id');
			$this->CursoParticipante->create();
			if ($this->CursoParticipante->save($this->data)) {
				$this->Session->setFlash(__('La inscripción fue correcta', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo realizar la inscripción.', true));
			}
		}

		
		if ($this->Auth->user('rol_id') == 3) // vendedor
		{
			$this->set('cursos', $this->CursoParticipante->Curso->find('list', array(
			    'fields' => array('Curso.nombre'),
			    'conditions' => array('Curso.estatus' => '1', 'Curso.vendedor_id =' => $this->Auth->user('id'))
			)));
		}
		else
		{
			$this->set('cursos', $this->CursoParticipante->Curso->find('list', array(
			    'fields' => array('Curso.nombre'),
			    'conditions' => array('Curso.estatus' => '1')
			)));
		}	
		
		


		$sql = "SELECT
					a.id, b.nombres, b.apellido_paterno, b.apellido_materno
				FROM
					participantes a, usuarios b
				WHERE
					a.usuario_id = b.id
				AND
					a.estatus = '1'
				AND
					b.estatus = '1'
				AND
					b.id != 1";
		
		$participantes = $this->CursoParticipante->query($sql);

		foreach($participantes as $key => $value)
		{
			$array[$value['a']['id']] = $value['b']['nombres'].' '.$value['b']['apellido_paterno'].' '.$value['b']['apellido_materno'];
		}

		if (!isset($array))
		{
			//$array[''] = '';
			$this->Session->setFlash(__('No hay participantes disponibles para hacer una inscripción, favor de agregar un participante', true));
			$this->redirect(array('controller' => 'participantes', 'action' => 'add'));
		}
		$this->set('participantes', $array);

		$array2[] = '';
		$this->set('fechacursos', $array2);
	}


	function update_fechas() {
        if (!empty($this->data['CursoParticipante']['curso_id'])) {
		    // Pra desactivar temporalmente mensajes 'warning' por la llamada Ajax
		    Configure::write('debug', 0);
		    // Layout necesario para llamadas Ajax
		    $this->layout = 'ajax';
		    $idCurso = (int)$this->data['CursoParticipante']['curso_id'];
        
		    // Asignación de lista de estados activos del país $paise_id
         /*   $this->set('fecha_cursos', $this->CursoParticipante->Estado->find('list', array(
                'fields' => array('Estado.nombre'),
                'conditions' => array('Estado.estatus' => '1', 'Estado.pais_id' => $idCurso) 
            )));
           */ 

			$sql = "SELECT
						a.id, a.fecha_inicio, a.fecha_fin, a.fecha_limite
					FROM
						fechas_cursos a
					WHERE
						a.curso_id = $idCurso";
			
			$fechas = $this->CursoParticipante->query($sql);
			
			foreach($fechas as $key => $value)
			{
				$array[$value['a']['id']] = $value['a']['fecha_inicio'];
			}
		
			/*if (!isset($array))
			{
				$this->redirect(array('controller' => 'roles', 'action' => 'add'));
			}*/

			$this->set('fechacursos', $array);
	    }
	}

	function edit($id = null) {
		$this->pageTitle = 'Editar Inscripción';
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Código inválido de Inscripción', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['CursoParticipante']['modified_id'] = $this->Auth->user('id');
			if ($this->CursoParticipante->save($this->data)) {
				$this->Session->setFlash(__('La inscripción se ediito correctamente', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo modificar la inscripción.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CursoParticipante->read(null, $id);
		}


		$this->set('cursos', $this->CursoParticipante->Curso->find('list', array(
		    'fields' => array('Curso.nombre'),
		    'conditions' => array('Curso.estatus' => '1')
		)));

		$sql = "SELECT
					a.id, b.nombres, b.apellido_paterno, b.apellido_materno
				FROM
					participantes a, usuarios b
				WHERE
					a.usuario_id = b.id
				AND
					a.estatus = '1'
				AND
					b.estatus = '1'
				AND
					a.id != 1";
		
		$participantes = $this->CursoParticipante->query($sql);

		foreach($participantes as $key => $value)
		{
			$array[$value['a']['id']] = $value['b']['nombres'].' '.$value['b']['apellido_paterno'].' '.$value['b']['apellido_materno'];
		}

		if (!isset($array))
		{
			//$array[''] = '';
			$this->Session->setFlash(__('No hay participantes disponibles para hacer una inscripción, favor de agregar un participante', true));
			$this->redirect(array('controller' => 'participantes', 'action' => 'add'));
		}
		$this->set('participantes', $array);

		//$array2[] = '';
		//$this->set('fechacursos', $array2);
		    $idCurso = (int)$this->data['CursoParticipante']['curso_id'];
			$sql = "SELECT
						a.id, a.fecha_inicio, a.fecha_fin, a.fecha_limite
					FROM
						fechas_cursos a
					WHERE
						a.curso_id = $idCurso";

			$fechas = $this->CursoParticipante->query($sql);

			foreach($fechas as $key => $value)
			{
				$array2[$value['a']['id']] = $value['a']['fecha_inicio'];
			}

			/*if (!isset($array))
			{
				$this->redirect(array('controller' => 'roles', 'action' => 'add'));
			}*/

			//$this->set('aaaaa', count($array2));
			if (!isset($array2))
				$array2[] = '';

			$this->set('fechacursos', $array2);
	}

	function deactivate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Código inválido de Inscripción');
			$this->redirect(array('action' => 'index'));
		}

		$this->data['CursoParticipante']['estatus'] = '0';
		$this->data['CursoParticipante']['modified_id'] = $this->Auth->user('id');
		if ($this->CursoParticipante->save($this->data)) {
			    $this->Session->setFlash('Inscripción desactivada');
			    $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('La inscripción no pudo ser desactivada.');
		$this->redirect(array('action' => 'index'));
	}
	
	function activate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Código inválido de Inscripción');
			$this->redirect(array('action' => 'index'));
		}

		$this->data['CursoParticipante']['estatus'] = '1';
		$this->data['CursoParticipante']['modified_id'] = $this->Auth->user('id');
		if ($this->CursoParticipante->save($this->data)) {
			    $this->Session->setFlash('Inscripción activada');
			    $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('La inscripción no pudo ser activada.');
		$this->redirect(array('action' => 'index'));
	}
}
?>