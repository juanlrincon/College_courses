		if (!empty($this->data)) {

        $directory = 'files'.DS.'cursos';
        $this->Curso->Archivo->Behaviors->attach('FileUpload.FileUpload', array('uploadDir' => $directory));

// Inicio archivos adjuntos
		$adjuntos = $this->Curso->Adjunto->find('list', array('fields' => array('Adjunto.name')));

		foreach($this->data['Adjunto'] as $key => $value)
		{
			$new_name = $this->get_new_name($value['name'], $adjuntos, array(), 0);
		
			$this->data['Adjunto'][$key]['name'] = $new_name;
		
			if ($value['size'] < MAX_FILE_SIZE)
			    if (!move_uploaded_file($value['tmp_name'], FILES_DIR.$new_name))
					$this->Session->setFlash('Algun archivo no pudo ser agregado correctamente.');
					echo $new_name.'<br>';
					echo $value['tmp_name'].'<br>';
		}
// Fin archivos adjuntos
//print_r($this->data['Adjunto']);
//die;
    	    $this->data['Curso']['estatus'] = '2';
    	    $this->data['Curso']['modulo_id'] = '2';
    	   	$this->data['Curso']['created_id'] = $this->Auth->user('id');
    	   //print_r($this->data);
		   //die;
		  
			if ($this->data['Curso']['nivel'] == '1')
			{
				unset($this->data['Curso']['vendedor_id']);
				unset($this->data['Curso']['tipo_curso_id']);
				unset($this->data['Modulo']['Modulo']);
			}
		  
			if ($this->data['Curso']['nivel'] == '2')
			{
				unset($this->data['Curso']['instructor_id']);
			}

			$this->Curso->create();
			//if ($this->Curso->save($this->data)) {
			    if ($this->Curso->saveAll($this->data, array('validate' => 'first'))) { // , array('validate' => 'first')
				 $this->Session->setFlash('El Curso ha sido añadido');
				 $this->redirect(array('action' => 'lists'));
			    // Crear directorio para guardar imágenes y archivos
			    /* 
			    $directory = WWW_ROOT.'files'.DS.'cursos'.DS.$this->Curso->id;
			    $directoryResized = $directory.DS.'resized';
			    $this->log('CursoID ['.$this->Curso->id.']: '.$directory, LOG_DEBUG);
			    $this->log('CursoID ['.$this->Curso->id.']: '.$directoryResized, LOG_DEBUG);
			    if (mkdir($directoryResized.DS, 0777, true)) {
			        chmod($directoryResized, 0777);
			        chmod($directory, 0777);
			        if($parent_id) {
			            $this->Session->setFlash('El Módulo ha sido añadido');
			            $this->redirect(array('action' => 'edit', $parent_id));
			        } else {
				        $this->Session->setFlash('El Curso ha sido añadido');
				        $this->redirect(array('action' => 'index'));
				    }
			    }
			    */
			} else {
				$this->Session->setFlash('El Curso no pudo ser añadido.');
			}
		}