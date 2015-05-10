<?
	function edit($id = null)
	{
		$this->pageTitle = 'Editar Curso';
		$error = 0;
		// Para establecer el directorio de los archivos del curso 
		$directory = 'files'.DS.'cursos';
		$this->Curso->Archivo->Behaviors->attach('FileUpload.FileUpload', array('uploadDir' => $directory));

		$adjuntos = $this->Curso->Adjunto->find('list', array('fields' => array('Adjunto.name')));

		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Código inválido de Curso');
			$this->redirect(array('action' => 'index'));
		}

		if (!empty($this->data))
		{
			$today = date("Y-m-d");
			foreach($this->data['FechasCurso'] as $key2 => $value2)
			{
				$fecha_inicio = $value2['fecha_inicio']['year'].'-'.$value2['fecha_inicio']['month'].'-'.$value2['fecha_inicio']['day'];
				$fecha_limite = $value2['fecha_limite']['year'].'-'.$value2['fecha_limite']['month'].'-'.$value2['fecha_limite']['day'];
				$fecha_fin = $value2['fecha_fin']['year'].'-'.$value2['fecha_fin']['month'].'-'.$value2['fecha_fin']['day'];
				if ($fecha_limite <= $today)
				{
					$this->Session->setFlash('En las imparticiones, la fecha limite debe ser despues del dia de hoy.');
					$error = 1;
				}

				if ($fecha_limite >= $fecha_inicio)
				{
					$this->Session->setFlash('En las imparticiones, la fecha limite debe ser menor que la fecha de inicio.');
					$error = 1;
				}

				if ($fecha_fin < $fecha_inicio)
				{
					$this->Session->setFlash('En las imparticiones, la fecha de terminación debe ser mayor o igual que la fecha de inicio.');
					$error = 1;
				}
				$this->data['FechasCurso'][$key2]['curso_id'] = $id;
			}
/*
			unset($this->data['FechasCurso']);

			$this->data['FechasCurso'][0]['fecha_inicio'] = Array('day' => 14, 'month' => 06, 'year' => 2010);
			$this->data['FechasCurso'][0]['fecha_fin'] = Array('day' => 14, 'month' => 06, 'year' => 2010);
			$this->data['FechasCurso'][0]['fecha_limite'] = Array('day' => 14, 'month' => 06, 'year' => 2010);
			*/
			//$this->data['FechasCurso'][0]['curso_id'] = 47;

//print_r($this->data['Temario']);

//print_r($this->data['FechasCurso']);
//die;


			// Inicio archivos adjuntos
			if (isset($this->data['Adjunto']))
			{
				foreach($this->data['Adjunto'] as $key => $value)
				{
					if ($value['name'] != '')
					{
						$new_name = $this->get_new_name($value['name'], $adjuntos, array(), 0);

						$this->data['Adjunto'][$key]['name'] = $new_name;

						if ($value['size'] < MAX_FILE_SIZE)
						{
							if (!move_uploaded_file($value['tmp_name'], FILES_DIR.$new_name))
							{
								$this->Session->setFlash('Algún archivo no pudo ser agregado correctamente.');
							}
						}
					}
				}
			}
			// Fin archivos adjuntos

			$this->data['Curso']['modified_id'] = $this->Auth->user('id');

			if ($error != 1)
			{
				if ($this->Curso->saveAll($this->data))
				{
					if (isset($this->data['Archivo']))
					{
						$errorFile = (int)$this->data['Archivo']['file']['error'];
						// Si no hubo errores al cargar el archivo o no se anexó algún archivo 
						if ($errorFile == UPLOAD_ERR_OK || $errorFile == UPLOAD_ERR_NO_FILE)
						{
							//debug($this->data); revisar esto no jala
							// Obtener nombre del archivo a procesar 
							$nameFile = $this->data['Archivo']['file']['name'];  
							if ($nameFile)
							{ 
								$this->data['Archivo']['curso_id'] = $id;
								$oldFile = $this->Curso->field('imagen_logo', array('Curso.id' => $id));
							} else {
								if (isset($this->data['Curso']['imagen_logo']))
								{
									unset($this->data['Curso']['imagen_logo']);
								}
							}

							if ($this->Curso->Archivo->save($this->data))
							{
								$this->Session->setFlash('El Archivo ha sido guardado.');                	
							}
							else
							{
								$this->Session->setFlash('El Archivo no pudo ser guardado.');
							}
						}

						// Si el logo fue modificado...			        
						if ($nameFile)
						{
							$newID = $this->Curso->Archivo->id;
							// Borrara registro de imagen anterior
							$oldID = $this->Curso->Archivo->field('id', array('curso_id' => $id, 'name' => $oldFile));
							if ($oldID)
							{
								$this->Curso->Archivo->del($oldID);
							}
							//Actualizar registro con imagen nueva 
							$nuevoLogo = $this->Curso->Archivo->field('name', array('Archivo.id' => $newID));
							$this->Curso->saveField('imagen_logo', $nuevoLogo);
						}
						$this->Session->setFlash('El Curso ha sido guardado');
					} else {
						$this->Session->setFlash('El Curso ha sido guardado pero hubo un problema al cargar la imagen.');
					}
					$this->redirect(array('action' => 'lists'));
				} else {
					$this->Session->setFlash('El Curso no pudo ser guardado.');
				}
			}
		}

		if (empty($this->data))
		{
			$this->data = $this->Curso->read(null, $id);
		}

		$this->set('tipoCursos', $this->Curso->TipoCurso->find('list', array(
			'fields' => array('TipoCurso.nombre'), 
			'conditions' => array('TipoCurso.estatus' => '1')
		)));

		// Carga modelo Usuario (al parecer no funciona la relación directa mediante 'Instructores' o 'Vendedores')
		$this->loadModel('Usuario');

		// Asiganción de lista de instructores activos 
		$this->set('instructores', $this->Usuario->find('superlist', array(
			'fields' => array('Usuario.id', 'Usuario.nombres', 'Usuario.apellido_paterno', 'Usuario.apellido_materno'),
			'format' => '%s %s %s',
			'conditions' => array('Usuario.rol_id' => 4, 'Usuario.estatus' => '1') // Busca rol 'Instructor'
		)));

		// Asiganción de lista de vendedores activos 
		$this->set('vendedores', $this->Usuario->find('superlist', array(
			'fields' => array('Usuario.id', 'Usuario.nombres', 'Usuario.apellido_paterno', 'Usuario.apellido_materno'),
			'conditions' => array('Usuario.rol_id' => array(2, 3), 'Usuario.estatus' => '1') // Busca roles 'Director' y 'Vendedor' 
		)));
        
		// Asignación de lista de ciudades activas 
		$this->set('ciudades', $this->Curso->Ciudad->find('list', array(
			'fields' => array('Ciudad.nombre'),
			'conditions' => array('Ciudad.estatus' => '1')
		)));

		// Busqueda de lista de Áreas académicas
		$this->set('areas', $this->Curso->Area->find('list', array(
			'fields' => array('Area.nombre'),
			'conditions' => array('Area.estatus' => '1')
		)));

		/*$this->set('dates', $this->Curso->find('list',
									 array('fields' => array('FechasCursos.nombre'),
									 'conditions' => array('FechasCursos.parent_id is NULL'))));
									 
		*/

		$sql = "SELECT
					a.id, a.fecha_inicio, a.fecha_fin, a.fecha_limite
				FROM
					fechas_cursos a
				WHERE
					a.curso_id = $id";

		$fechas = $this->Curso->query($sql);

		foreach($fechas as $key => $value)
		{
			$fechas[$key]['inicio'] = $value['a']['fecha_inicio'];
			$fechas[$key]['fin'] = $value['a']['fecha_fin'];
			$fechas[$key]['limite'] = $value['a']['fecha_limite'];
		}
	
		/*if (!isset($array))
		{
			$this->redirect(array('controller' => 'roles', 'action' => 'add'));
		}*/

		$this->set('fechas_inicio', $fechas);
		$this->set('modulos', $this->Curso->find('list',array(
			'fields' => array('Curso.nombre'),
			'conditions' => array('Curso.nivel = 1', 'Curso.estatus = 1'))));

		$this->set('relacionados', $this->Curso->find('list',array(
			'fields' => array('Curso.nombre'),
			'conditions' => array('Curso.nivel = 2', 'Curso.estatus = 1'))));

		$adjuntos = $this->Curso->Adjunto->find('list', array(
			'fields' => array('Adjunto.name'),
			'conditions' => array('Adjunto.curso_id' => $id)
		));

		$this->set('adjuntos', $adjuntos);
		
		$config =& Configure::getInstance();

		if (isset($config->permisos['7']) and $this->Auth->user('rol_id') != 1)
			$this->set('instructor', '1');
		else
			$this->set('instructor', '0');

		if (isset($config->permisos['7']) and $this->Auth->user('rol_id') != 1 and isset($config->permisos['46']))
			$this->set('cambia_nombre', '1');
		else
			$this->set('cambia_nombre', '0');

		// nota el instructor no ve cursos de nivel 2
		//$this->set('modulos2', $this->data['Modulo']);
		//$this->set('relacionados2', $this->data['Relacionado']);
	}



	function deletefile($id = null, $file) {
		//$this->data['Adjunto'][$id] = null;
		
		if ($this->Curso->Adjunto->del($id)) {
			//echo $this->Curso->Adjunto->read($id).'<--';
		}
//if ($this->Group->del($id)) {
		$filename = FILES_DIR.$file;

		if (file_exists($filename))
		{
			unlink($filename);
			echo 'Archivo '.$file.' borrado';
		}
		else
		{
			echo "El archivo no existe";
		}
	}

	function deactivate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Código inválido de Curso');
			$this->redirect(array('action' => 'lists'));
		}

		$this->data['Curso']['estatus'] = '0';
		$this->data['Curso']['modified_id'] = $this->Auth->user('id');
		if ($this->Curso->save($this->data)) {
			    $this->Session->setFlash('Curso desactivado');
			    $this->redirect(array('action' => 'lists'));
		}
		$this->Session->setFlash('El Curso no pudo ser desactivado.');
		$this->redirect(array('action' => 'lists'));
	}
	
	function activate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Código inválido de Curso');
			$this->redirect(array('action' => 'lists'));
		}

		$this->data['Curso']['estatus'] = '1';
		$this->data['Curso']['modified_id'] = $this->Auth->user('id');
		if ($this->Curso->save($this->data)) {
			    $this->Session->setFlash('Curso activado');
			    $this->redirect(array('action' => 'lists'));
		}
		$this->Session->setFlash('El Curso no pudo ser activado.');
		$this->redirect(array('action' => 'lists'));
	}
	
	function autorize($id = null) {
		if (!$id) {
			$this->Session->setFlash('Código inválido de Curso');
			$this->redirect(array('action' => 'lists'));
		}

		$this->data['Curso']['estatus'] = '1';
		$this->data['Curso']['modified_id'] = $this->Auth->user('id');
		if ($this->Curso->save($this->data)) {
			    $this->Session->setFlash('Curso autorizado');
			    $this->redirect(array('action' => 'lists'));
		}
		$this->Session->setFlash('El Curso no pudo ser autorizado.');
		$this->redirect(array('action' => 'lists'));
	}
	
}
?>