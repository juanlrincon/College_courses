<?php
class TipoCursosController extends AppController {

	var $name = 'TipoCursos';
    var $helpers = array('Html', 'Form', 'FileUpload.FileUpload', 'Javascript', 'Ajax');

    function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allowedActions = array('home');
        // Para detener la carga automática de archivos
        //$this->set('related', 'Roles');
		$this->permissions = $this->permisos_array();
        //$this->TipoCurso->automatic = false;
    }

    function home() {
		$menu = $this->TipoCurso->find('list', array(
		    'fields' => array('TipoCurso.id', 'TipoCurso.nombre'),
		    'conditions' => array('TipoCurso.id' => array(1,2,3,4), 'TipoCurso.estatus' => '1')
		));

	    $this->set('menu', $menu);

	    /* esto ya no es, ya cambió
		$cursos_rand = $this->TipoCurso->Curso->find('all', array(
		    'fields' => array('Curso.nombre', 'Curso.descripcion_general', 'Curso.objetivo', 'Curso.imagen_logo'),
		    'conditions' => array('Curso.estatus' => '1', 'Curso.nivel' => '2'),
		 	'limit' => 7,
			'order' => 'rand()'
		));
	    $this->set('cursos_rand', $cursos_rand);
		*/
	    
	    $this->loadModel('Contenido');
		$contenido_rand = $this->Contenido->find('all', array(
		    'fields' => array('Contenido.id', 'Contenido.nombre', 'Contenido.descripcion_general', 'Contenido.imagen_logo'),
		    //'conditions' => array('Contenido.estatus' => '1'),
		 	'limit' => 7,
			'order' => 'rand()'
		));
	    $this->set('contenido_rand', $contenido_rand);
    }

	function index() {
		$this->TipoCurso->recursive = 0;
		// Título de la página 
		$this->pageTitle = 'Lista de Tipos de Cursos';
		$this->set('tipoCursos', $this->paginate());
	}

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash('Clave inválida de tipo de curso');
            $this->redirect(array('action' => 'index'));
        }
        $this->set('tipoCurso', $this->TipoCurso->read(null, $id));
    }

	function add() {
	    // Título de la página 
		$this->pageTitle = 'Nuevo Tipo de Curso';
		
		if (!empty($this->data)) {

			if ($this->data['TipoCurso']['file']['name'] != '')
			{
			    // Para asignar el comportamiento de repositorio de imágenes y establecer el directorio de las imágenes  
		        $directory = 'files'.DS.'tipocursos';
		        $this->TipoCurso->Behaviors->attach('FileUpload.FileUpload', array('uploadDir' => $directory));
			}
		    $this->data['TipoCurso']['created_id'] = $this->Auth->user('id');
            $this->data['TipoCurso']['estatus'] = '1';

            // Se crea el registro 
        	$this->TipoCurso->create(); 
            if ($this->TipoCurso->save($this->data)) { 
				$this->Session->setFlash('El tipo de curso ha sido añadido');
				$this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('El tipo de curso no pudo ser añadido.');
                }

	        /*$errorFile = (int)$this->data['TipoCurso']['file']['error'];
	        if ($errorFile == UPLOAD_ERR_OK) {

            } else {
             $this->Session->setFlash('El tipo de curso no pudo ser añadido, hubo un error al subir el archivo.');
            }*/
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Clave inválida de tipo de curso');
			$this->redirect(array('action' => 'index'));
		}
		// Título de la página 
		$this->pageTitle = 'Editar Tipo de Curso';
		// Para asignar el comportamiento de repositorio de imágenes y establecer el directorio de las imágenes 

		if (!empty($this->data)) {
            //$errorFile = (int)$this->data['TipoCurso']['file']['error'];
		    // Si no hubo errores al cargar el archivo o no se anexó algún archivo 
		    //if ($errorFile == UPLOAD_ERR_OK || $errorFile == UPLOAD_ERR_NO_FILE) { 
                // Obtener nombre del archivo a procesar
			if ($this->data['TipoCurso']['file']['name'] != '')
			{
				$directory = 'files'.DS.'tipocursos';
        		$this->TipoCurso->Behaviors->attach('FileUpload.FileUpload', array('uploadDir' => $directory));
        		$nameFile = $this->data['TipoCurso']['file']['name'];

        		// Búsqueda del nombre el archivo anterior para eliminarlo de DD 
                $oldNameFile = $this->TipoCurso->field('name', array('id' => $id));

				// Si el archivo anterior es diferente al nuevo, eliminarlo de DD
				if ($oldNameFile != $nameFile) {
					$this->_deleteImage($oldNameFile,$directory);
				}
			}
		        // Validar que si no se cambió la imagen, solo se debe actualizar el nombre del Tipo de Curso 
		    /*    if (!$nameFile) {
		            // Se anula el contenido de la variable con la información del archivo 
		            if (!isset($this->data['TipoCurso']['file'])) {
		                $this->data['TipoCurso']['file'] = null;
		            }
		            $this->TipoCurso->read(null, $id);
		            $this->TipoCurso->set('nombre', $this->data['TipoCurso']['nombre']);
		            // Se anula el contenido de la variable con la información del archivo (no se actualizará)
		            $this->TipoCurso->set('file', null);
		            // Solo se actualiza el campo 'nombre' 
		            if ($this->TipoCurso->save()) {
		                $this->Session->setFlash('El tipo de curso ha sido modificado');
		                $this->redirect(array('action' => 'index'));
	                } else {
		                $this->Session->setFlash('El tipo de curso no pudo ser modificado. Por favor, trate de nuevo.');
	                }
		        } else { */
			$this->data['TipoCurso']['estatus'] = '1';
			$this->data['TipoCurso']['modified_id'] = $this->Auth->user('id');

			if ($this->TipoCurso->save($this->data)) {
				$this->Session->setFlash('El tipo de curso ha sido modificado');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El tipo de curso no pudo ser modificado.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TipoCurso->read(null, $id);
		}
	}
	
	function _deleteImage($img,$path) {
	    $image = WWW_ROOT.$path.DS.$img;
	    if (file_exists($image)) { 
	        // La imagen $img existe en el directorio $path
	        if(chmod($image, 0777)) { 
	            // La imagen cambió sus permisos para escritura
	            if (unlink($image)) { 
	                // La imagen fue borrada 
                    return true;
                } else { 
                    // La imagen NO fue borrada 
                    return false;
                }
            } else { 
                // La imagen NO cambió sus permisos para escritura
                return false;
            }
        } 
        // La imagen $img NO existe en el directorio $path
        return true;
	}
	
	function deactivate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Clave inválida de Tipo de Curso');
			$this->redirect(array('action' => 'index'));
		}
		// Por ahora, no es necesario que se comporte como 'FileUpload' 
		$this->TipoCurso->Behaviors->detach('FileUpload.FileUpload');
		if (isset($this->data['TipoCurso']['file'])) {
            $this->data['TipoCurso']['file'] = null;
        }

	    $this->TipoCurso->read(null, $id);
        //$this->TipoCurso->set('estatus', '0');
        $this->data['TipoCurso']['estatus'] = '0';
        $this->data['TipoCurso']['modified_id'] = $this->Auth->user('id');
        // Solo se actualiza el campo 'status_id' 
        if ($this->TipoCurso->save($this->data, false)) {
			$this->Session->setFlash('Tipo de Curso desactivado');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('El tipo de curso no pudo ser desactivado.');
		$this->redirect(array('action' => 'index'));
	}
	
	function activate($id = null) {
		if (!$id) {
			$this->Session->setFlash('Clave inválida de Tipo de Curso');
			$this->redirect(array('action' => 'index'));
		}
		// Por ahora, no es necesario que se comporte como 'FileUpload' 
		$this->TipoCurso->Behaviors->detach('FileUpload.FileUpload');
		if (isset($this->data['TipoCurso']['file'])) {
            $this->data['TipoCurso']['file'] = null;
        }

	    $this->TipoCurso->read(null, $id);

        $this->data['TipoCurso']['estatus'] = '0';
        $this->data['TipoCurso']['modified_id'] = $this->Auth->user('id');

        // Solo se actualiza el campo 'status_id' 
        if ($this->TipoCurso->save($this->data, false)) {
			$this->Session->setFlash('Tipo de Curso activado');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('El tipo de curso no pudo ser activado.');
		$this->redirect(array('action' => 'index'));
	}
	
}
?>