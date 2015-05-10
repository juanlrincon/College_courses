<?php
class ContenidosController extends AppController {

	var $name = 'Contenidos';
	var $helpers = array('Html', 'Form', 'FileUpload.FileUpload', 'Javascript', 'Ajax');

	function beforeFilter() {
	    parent::beforeFilter();

	    $this->permissions = $this->permisos_array();
	    $this->set('rol_id', $this->Auth->user('rol_id'));

	}

	function index($id = null) {
		global $tc_images_path;
		$this->Contenido->recursive = 0;
		// Título de la página 
		$this->pageTitle = 'Contenido de Inicio';

		if ($id == "")
		{
        	$this->set('contenidos', $this->paginate());
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Código inválido de Contenido');
			$this->redirect(array('action' => 'index'));
		}
		$this->Contenido->recursive = 2;
		$this->set('curso', $this->Contenido->read(null, $id));
		
	}

	function edit($id = null)
	{
		$this->pageTitle = 'Editar Contenido';

		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Código inválido de Contenido');
			$this->redirect(array('action' => 'index'));
		}
//print_r($this->data);
//die;
		if (!empty($this->data))
		{
			if ($this->data['Contenido']['imagen_logo']['name'] != '')
			{
				if ($this->data['Contenido']['imagen_logo']['name'] != '')
				{
					//$path_info = pathinfo($this->data['Contenido']['imagen_logo']['name']);
					//$new_name = 'contenido'.$id.'.'.$path_info['extension'];

					if ($this->data['Contenido']['imagen_logo']['size'] < MAX_FILE_SIZE)
					{
						if (!move_uploaded_file($this->data['Contenido']['imagen_logo']['tmp_name'], WWW_ROOT.'files'.DS.'contenidos'.DS.$this->data['Contenido']['imagen_logo']['name']))
						{
							$this->Session->setFlash('El archivo de imagen no pudo ser agregado correctamente.');
						}
					}
				}
				$this->data['Contenido']['imagen_logo'] = $this->data['Contenido']['imagen_logo']['name'];
			}
			else
			{
				$this->data['Contenido']['imagen_logo'] = $this->data['Contenido']['imagen_logo_ant'];
			}

			$this->data['Contenido']['modified_id'] = $this->Auth->user('id');

			if ($this->Contenido->save($this->data))
			{
				$this->Session->setFlash('El Contenido ha sido guardado');
			} else {
				$this->Session->setFlash('El Contenido no pudo ser guardado.');
			}
			$this->redirect(array('action' => 'index'));
		}

		if (empty($this->data))
		{
			$this->data = $this->Contenido->read(null, $id);
		}
	}
}
?>