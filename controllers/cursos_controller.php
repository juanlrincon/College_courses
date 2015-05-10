<?php
class CursosController extends AppController {

	var $name = 'Cursos';
	var $helpers = array('Html', 'Form', 'FileUpload.FileUpload', 'Javascript', 'Ajax');

	function beforeFilter() {
	    parent::beforeFilter();
	    //$this->set('related', 'Cursos');
// falta agregar permiso para el orden
	    $this->Auth->allowedActions = array('search', 'advanced_search', 'index', 'create_menu', 'uview', 'umview', 'download', 'modulos', 'orden', 'sitemap');
	    $this->permissions = $this->permisos_array();
	    $this->set('rol_id', $this->Auth->user('rol_id'));
	    
/*	    $menu = $this->Session->read('menu');

	    if (count($menu) <= 1)
	    {
	    	$this->redirect(array('controller' => 'cursos', 'action' => 'create_menu'));
	    }
	    $this->set('menu', $menu);
	    */
		$menu = $this->Curso->TipoCurso->find('list', array(
		    'fields' => array('TipoCurso.id', 'TipoCurso.nombre'),
		    'conditions' => array('TipoCurso.id' => array(1,2,3,4), 'TipoCurso.estatus' => '1')
		));

	    $this->set('menu', $menu);
	}

function sitemap() {
		$this->pageTitle = 'Mapa del Sitio';

		for ($i = 1; $i <= 4; $i++)
		{
			unset($areas);
			unset($areas2);
			unset($key);
			unset($value);

			$sql = "SELECT
						a.id, a.nombre, b.id, b.nombre
					FROM
						cursos a, areas b, area_cursos c
					WHERE
						a.id = c.curso_id
					AND
						b.id = c.area_id
					AND
						a.tipo_curso_id = $i";
			
			$areas = $this->Curso->query($sql);
			
			$areas2 = array();
			foreach($areas as $key => $value)
			{
				$areas2[$value['b']['id']]['area'] = $value['b']['nombre'];
				$areas2[$value['b']['id']]['cursos'][$value['a']['id']] = $value['a']['nombre'];
			}
			$areas3[$i] = $areas2;
		}
		$this->set('areas', $areas3);
		

			unset($areas);
			unset($areas2);
			unset($key);
			unset($value);

			$sql = "SELECT
					a.id, a.nombre, b.id, b.nombre
				FROM
					cursos a, areas b, area_cursos c
				WHERE
					a.id = c.curso_id
				AND
					b.id = c.area_id
				AND
					a.tipo_curso_id is NULL";
		
		$areas = $this->Curso->query($sql);
		
		$areas2 = array();
		foreach($areas as $key => $value)
		{
			$areas2[$value['b']['id']]['area'] = $value['b']['nombre'];
			$areas2[$value['b']['id']]['cursos'][$value['a']['id']] = $value['a']['nombre'];
		}
		$this->set('modulos', $areas2);
	}
	function download($filename = NULL) {
		header('Content-disposition: attachment; filename='.$filename);
		//header('Content-type: video/mpeg');
		readfile(FILES_DIR.$filename);
	    die;
	}

/*function create_menu() {
		global $menu;

	}
*/
	function index($id = null) {
		global $tc_images_path;
		$this->Curso->recursive = 0;
		// Título de la página 
		$this->pageTitle = 'Lista de Cursos';

		if ($id == "")
		{
        	$this->set('cursos', $this->paginate());
		}
		else
		{
			/*
			$cursos = $this->paginate('Curso', array('Curso.tipo_curso_id =' => $id, 'Curso.estatus' => '1'));
			$this->set('cursos', $cursos);
*/
			$imagen = $this->Curso->TipoCurso->find('list', array(
		    'fields' => array('TipoCurso.nombre', 'TipoCurso.name'),
		    'conditions' => array('TipoCurso.id' => $id, 'TipoCurso.estatus' => '1')
			));

			foreach($imagen as $key => $value)
			{
				$tipo = $key;
				$imagen = $value;
			}
	
			$this->set('tipo', $tipo);
			
			$this->set('imagen', $imagen);
	
			$this->set('tc_images_path', $tc_images_path);

			//print_r($this->Curso->TipoCurso);
/*
			$areas = $this->Curso->TipoCurso->Area->find('list', array(
		    'fields' => array('Area.nombre', 'Area.nombre'),
		    'conditions' => array('TipoCurso.id' => $id, 'Area.estatus' => '1')
			));
*/
			
			$sql = "SELECT
						a.id, a.nombre, b.id, b.nombre
					FROM
						cursos a, areas b, area_cursos c
					WHERE
						a.id = c.curso_id
					AND
						b.id = c.area_id
					AND
						a.tipo_curso_id = $id";
			
			$areas = $this->Curso->query($sql);
			
			$areas2 = array();
			foreach($areas as $key => $value)
			{
				$areas2[$value['b']['id']]['area'] = $value['b']['nombre'];
				$areas2[$value['b']['id']]['cursos'][$value['a']['id']] = $value['a']['nombre'];
			}
			$this->set('areas', $areas2);
			$this->set('id', $id);
			
		}
	}

	function modulos() {
		//global $tc_images_path;
		$this->paginate = array('limit' => 9);
		$this->Curso->recursive = 0;
		// Título de la página 
		//$this->pageTitle = 'Lista de Cursos';

		/*if ($id == "")
		{
        	$this->set('cursos', $this->paginate());
		}
		else
		{*/
			/*$cursos = $this->paginate('Curso', array('Curso.tipo_curso_id =' => $id));
			$this->set('cursos', $cursos);

			$imagen = $this->Curso->TipoCurso->find('list', array(
		    'fields' => array('TipoCurso.nombre', 'TipoCurso.name'),
		    'conditions' => array('TipoCurso.id' => $id, 'TipoCurso.estatus' => '1') 
			));

			foreach($imagen as $key => $value)
			{
				$tipo = $key;
				$imagen = $value;
			}
	
			$this->set('tipo', $tipo);
			
			$this->set('imagen', $imagen);
	
			$this->set('tc_images_path', $tc_images_path);
*/
		//}
		//$this->set('cursos', $this->paginate('Curso'));
		//$this->set('cursos', $this->paginate('Curso', array('Curso.nivel =' => 1)));
		
		
					$sql = "SELECT
						a.id, a.nombre, b.id, b.nombre
					FROM
						cursos a, areas b, area_cursos c
					WHERE
						a.id = c.curso_id
					AND
						b.id = c.area_id
					AND
						a.tipo_curso_id is NULL";
			
			$areas = $this->Curso->query($sql);
			
			$areas2 = array();
			foreach($areas as $key => $value)
			{
				$areas2[$value['b']['id']]['area'] = $value['b']['nombre'];
				$areas2[$value['b']['id']]['cursos'][$value['a']['id']] = $value['a']['nombre'];
			}
			$this->set('areas', $areas2);
	}

	function lists($id = null) {
		$this->Curso->recursive = 1;
		// Título de la página 
		$this->pageTitle = 'Lista de Cursos';

		$config =& Configure::getInstance();
		//print_r($config->permisos);
		////if (isset($config->permisos['7']) and $this->Auth->user('rol_id') != 1) // Instructor
		////{
		////	$this->set('cursos', $this->paginate('Curso', array('Curso.instructor_id =' => $this->Auth->user('id'))));
		////}
		////else if ($this->Auth->user('rol_id') == 3) // vendedor
		////{
		////	$this->set('cursos', $this->paginate('Curso', array('Curso.vendedor_id =' => $this->Auth->user('id'))));
		////}
		////else
		////{
			$this->set('cursos', $this->paginate());
		////}			
		/*
		if ($id == "")
		{
        	$this->set('cursos', $this->paginate());
		}
		else
		{
			$this->set('cursos', $this->paginate('Curso', array('Curso.tipo_curso_id =' => $id)));
		}*/

// mostrar cursos a los que esta inscrito alguien que no es participante
		$usuario_id = $this->Auth->user('id');
		$participante_id = $this->Curso->query("SELECT id FROM participantes WHERE usuario_id = '".$usuario_id."'");

		$participante_id = Set::extract('/participantes/id', $participante_id);

		//$this->set('cursoParticipantes', $this->paginate(array('Participante.id ' => $participante_id[0])));
        $this->set('cursoParticipantes', $this->Curso->CursoParticipante->find('all', array(
		    'fields' => array('Curso.id', 'Curso.nombre', 'FechasCurso.fecha_inicio', 'FechasCurso.fecha_fin'),
        	'recursive' => 1,
		    'conditions' => array('Participante.id' => $participante_id, 'Participante.estatus' => '1')
		)));
		
// fin
		if (isset($config->permisos['7']) and $this->Auth->user('rol_id') != 1)
			$this->set('instructor', '1');
		else
			$this->set('instructor', '0');
	}

	function search()
	{
		$this->paginate = array('limit' => 9);
		$this->pageTitle = 'Busqueda de Cursos';
		if (!empty($this->data))
		{
			//$this->set('cursos', $this->paginate('Curso', array('Curso.nombre like ' => '%'.$this->data['Curso']['search_text'].'% or Curso.objetivo like %'.$this->data['Curso']['search_text'].'%')));
			//"Fixture.sport_id = '$sport_id' AND Fixture.competition_id = '$competition_id'"
			$this->set('cursos', $this->paginate('Curso', "Curso.nombre like '%".$this->data['Curso']['search_text']."%' OR Curso.objetivo like '%".$this->data['Curso']['search_text']."%' OR  Curso.perfil like '%".$this->data['Curso']['search_text']."%'"));
		}
	}
	
	function advanced_search()
	{
		$this->pageTitle = 'Busqueda de Cursos';
	}
	/*
	function index($id = null) {
		$this->Curso->recursive = 0;
		// Título de la página 
		$this->pageTitle = 'Lista de Cursos';
		// Búsqueda de estado 'Activo' (0) para objetos 'curso'
	    $statusActivo = $this->Curso->Status->field('id', array('elemento' => 'curso', 'clave' => 0));
	    $this->set('statusActivo', $statusActivo);
	    // Búsqueda de estado 'Pendiente por autorizar' (1) para objetos 'curso'
        $statusActivo = $this->Curso->Status->field('id', array('elemento' => 'curso', 'clave' => 1));
        $this->set('statusPendiente', $statusActivo);
		if ($id == "")
		{
        	$this->set('cursos', $this->paginate());
		}
		else
		{
			$this->set('cursos', $this->paginate('Curso', array('Curso.tipo_curso_id =' => $id)));
		}
	}
*/
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Código inválido de Curso');
			$this->redirect(array('action' => 'index'));
		}
		$this->Curso->recursive = 2;
		$this->set('curso', $this->Curso->read(null, $id));
		
		//$adjuntos = $this->Curso->Adjunto->find('list', array('fields' => array('Adjunto.name')));
		//$this->set(compact('adjuntos'));
	}

	function uview($id = null) {
		if (!$id) {
			$this->Session->setFlash('Código inválido de Curso');
			$this->redirect(array('action' => 'index'));
		}
		$this->Curso->recursive = 2;
		$this->set('curso', $this->Curso->read(null, $id));
		
		if ($this->Auth->user('rol_id') != '')
			$logeado = 1;
		else
			$logeado = 0;

		$this->set('logeado', $logeado);

	}

	function umview($id = null) {
		if (!$id) {
			$this->Session->setFlash('Código inválido de Curso');
			$this->redirect(array('action' => 'index'));
		}
		$this->Curso->recursive = 2;
		$this->set('curso', $this->Curso->read(null, $id));
		
		if ($this->Auth->user('rol_id') != '')
			$logeado = 1;
		else
			$logeado = 0;

		$this->set('logeado', $logeado);

	}

	function add()
	{
		$this->pageTitle = 'Nuevo Curso';
		$error = 0;
		// Para establecer el directorio de los archivos del curso 
		$directory = 'files'.DS.'cursos';
		$this->Curso->Archivo->Behaviors->attach('FileUpload.FileUpload', array('uploadDir' => $directory));

		$adjuntos = $this->Curso->Adjunto->find('list', array('fields' => array('Adjunto.name')));

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
			}

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
								$this->Session->setFlash('Algun archivo no pudo ser agregado correctamente.');
							}
						}
					}
				}
			}
			// Fin archivos adjuntos

			$this->data['Curso']['estatus'] = '2';
			//$this->data['Curso']['modulo_id'] = '2';
			$this->data['Curso']['created_id'] = $this->Auth->user('id');

			if ($this->data['Curso']['nivel'] == '1')
			{
				////unset($this->data['Curso']['vendedor_id']);
				unset($this->data['Curso']['tipo_curso_id']);
				unset($this->data['Modulo']['Modulo']);
			}

			if ($this->data['Curso']['nivel'] == '2')
			{
				unset($this->data['Curso']['instructor_id']);
			}

			$this->Curso->create();

			if ($error != 1)
			{
				if ($this->Curso->saveAll($this->data))
				{
					if (isset($this->data['Archivo']))
					{
						$id = $this->Curso->getLastInsertId();

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

	    $this->set('tipoCursos', $this->Curso->TipoCurso->find('list', array(
			'fields' => array('TipoCurso.nombre'), 
			'conditions' => array('TipoCurso.estatus' => '1') 
		)));

		// Carga modelo Usuario (al parecer no funciona la relación directa mediante 'Instructores' o 'Vendedores')
		$this->loadModel('Usuario');

		
 
		
		$instructores = $this->Usuario->find('superlist', array(
			'fields' => array('Usuario.id', 'Usuario.nombres', 'Usuario.apellido_paterno', 'Usuario.apellido_materno'),
			'format' => '%s %s %s',
			'conditions' => array('Usuario.rol_id' => 4, 'Usuario.estatus' => '1') // Busca rol 'Instructor'
		));
		
		foreach($instructores as $key => $value)
		{
			if (ereg('C.P. ', $value))
			{
				$value = ereg_replace('C.P. ', '', $value);
				$value = $value.', C.P.';
			}

			if (ereg('C.P.C. ', $value))
			{
				$value = ereg_replace('C.P.C. ', '', $value);
				$value = $value.', C.P.C.';
			}

			if (ereg('Lic. ', $value))
			{
				$value = ereg_replace('Lic. ', '', $value);
				$value = $value.', Lic.';
			}

			if (ereg('Dra. ', $value))
			{
				$value = ereg_replace('Dra. ', '', $value);
				$value = $value.', Dra.';
			}

			if (ereg('Dr. ', $value))
			{
				$value = ereg_replace('Dr. ', '', $value);
				$value = $value.', Dr.';
			}

			if (ereg('Ing. ', $value))
			{
				$value = ereg_replace('Ing. ', '', $value);
				$value = $value.', Ing.';
			}

			$instructores2[$key] = $value;
		}
		// Asiganción de lista de instructores activos 
		$this->set('instructores', $instructores2);

		
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
			'conditions' => array('Area.estatus = 1'))));

		$this->set('modulos', $this->Curso->find('list',array(
			'fields' => array('Curso.nombre'),
			'conditions' => array('Curso.nivel = 1', 'Curso.estatus = 1'))));

		$this->set('relacionados', $this->Curso->find('list',array(
			'fields' => array('Curso.nombre'),
			'conditions' => array('Curso.nivel = 2', 'Curso.estatus = 1'))));
	}



	function get_new_name($name, $array1, $array2, $i)
	{
		global $array2;
	
		if (!is_array($array2))
			$array2[] = '';
	
	
		if (in_array($name, $array1) or in_array($name, $array2))
		{
			$i++;
			$path_info = pathinfo($name);
	
			if ($i > 1)
			{
				$new_name = substr($path_info['filename'], 0, -4).'_'.sprintf("%03d", $i).'.'.$path_info['extension'];
			}
			else
			{
				$new_name = $path_info['filename'].'_'.sprintf("%03d", $i).'.'.$path_info['extension'];
			}		
			return $this->get_new_name($new_name, $array1, $array2, $i);
		}
		else
		{
			$array2[] =  $name;
			return $name;
		}
	}
		
		
		
	function orden($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Código inválido de Curso');
			$this->redirect(array('action' => 'index'));
		}
		// Título de la página 
		$this->pageTitle = 'Ordenar modulos';

		if (!empty($this->data))
		{
			if ($this->Curso->saveAll($this->data))
			{
				$this->Session->setFlash('El Orden ha sido guardado');
			    $this->redirect(array('action' => 'lists'));
			}
			else
			{
				$this->Session->setFlash('El Orden no pudo ser guardado.');
			}
		}
		else
		{
			$sql = "SELECT
						b.id, b.modulo_id, b.orden, c.nombre
						
					FROM
						cursos a, modulo_cursos b
					LEFT JOIN
						cursos c
					ON
						c.id = b.modulo_id
					WHERE
						a.id = b.curso_id
					AND
						a.id = $id";
			
			$modulos = $this->Curso->query($sql);
			
			$modulos2 = array();
			foreach($modulos as $key => $value)
			{
				$modulos2[$value['b']['id']]['nombre'] = $value['c']['nombre'];
				$modulos2[$value['b']['id']]['modulo_id'] = $value['b']['modulo_id'];
				$modulos2[$value['b']['id']]['orden'] = $value['b']['orden'];
				$modulos2[$value['b']['id']]['orden'] = $value['b']['orden'];
				
			}
			$this->set('modulos', $modulos2);
			$this->set('id', $id);
		}
	}

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
			//print_r($this->data['Modulo']);
			//die;
			
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
					$this->Curso->FechasCurso->saveAll($this->data['FechasCurso']);

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
		/*$this->set('instructores', $this->Usuario->find('superlist', array(
			'fields' => array('Usuario.id', 'Usuario.nombres', 'Usuario.apellido_paterno', 'Usuario.apellido_materno'),
			'format' => '%s %s %s',
			'conditions' => array('Usuario.rol_id' => 4, 'Usuario.estatus' => '1') // Busca rol 'Instructor'
		)));
		*/
		$instructores = $this->Usuario->find('superlist', array(
			'fields' => array('Usuario.id', 'Usuario.nombres', 'Usuario.apellido_paterno', 'Usuario.apellido_materno'),
			'format' => '%s %s %s',
			'conditions' => array('Usuario.rol_id' => 4, 'Usuario.estatus' => '1') // Busca rol 'Instructor'
		));
		
		foreach($instructores as $key => $value)
		{
			if (ereg('C.P. ', $value))
			{
				$value = ereg_replace('C.P. ', '', $value);
				$value = $value.', C.P.';
			}

			if (ereg('C.P.C. ', $value))
			{
				$value = ereg_replace('C.P.C. ', '', $value);
				$value = $value.', C.P.C.';
			}

			if (ereg('Lic. ', $value))
			{
				$value = ereg_replace('Lic. ', '', $value);
				$value = $value.', Lic.';
			}

			if (ereg('Dra. ', $value))
			{
				$value = ereg_replace('Dra. ', '', $value);
				$value = $value.', Dra.';
			}

			if (ereg('Dr. ', $value))
			{
				$value = ereg_replace('Dr. ', '', $value);
				$value = $value.', Dr.';
			}

			if (ereg('Ing. ', $value))
			{
				$value = ereg_replace('Ing. ', '', $value);
				$value = $value.', Ing.';
			}

			$instructores2[$key] = $value;
		}
		// Asiganción de lista de instructores activos 
		$this->set('instructores', $instructores2);
		

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