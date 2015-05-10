<?php
class Curso extends AppModel {

	var $name = 'Curso';
	// Actúa como un árbol en la relación de programas con módulos (cursos) dependientes 
	//var $actsAs = array('Tree');
	// Validaciones 
	var $validate = array(
		'nombre' => array(
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'El nombre del curso es requerido'
		        )
		    ),
		'tipo_curso_id' => array(
		    'numeric',
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'Por favor, seleccione el tipo de curso'
		        )
		    ),
		'instructor_id' => array(
		    'numeric',
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'Por favor, seleccione al instructor del curso'
		        )
		    ),
		'horas' => array(
		    'numeric' => array(
		        'rule' => 'numeric',
		        'message' => 'Solo escriba números'
		        )
		    ),
		'precio' => array(
		    'numeric' => array(
		        'rule' => 'numeric',
		        'message' => 'Solo escriba números'
		        )
		    ),
		'objetivo' => array(
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'El objetivo del curso es requerido'
		        )
		    ),
		'perfil' => array(
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'El perfil del curso es requerido'
		        )
		    )
	);
	// Orden por omisión para búsquedas de listas 
	//var $order = array('Curso.modified' => 'desc', 'Curso.fecha_inicio' => 'desc', 'Curso.nombre' => 'asc', 'Curso.estatus' => 'asc');

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'TipoCurso' => array(
			'className' => 'TipoCurso',
			'foreignKey' => 'tipo_curso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Instructor' => array(
			'className' => 'Usuario',    // 'Instructor',
			'foreignKey' => 'instructor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Vendedor' => array(
			'className' => 'Usuario',    //'Vendedor',
			'foreignKey' => 'vendedor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ciudad' => array(
			'className' => 'Ciudad',
			'foreignKey' => 'ciudad_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Archivo' => array(
			'className' => 'Archivo',
			'foreignKey' => 'curso_id',
			'dependent' => true,    //false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Adjunto' => array(
			'className' => 'Adjunto',
			'foreignKey' => 'curso_id',
			'dependent' => true,    //false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Temario' => array(
			'className' => 'Temario',
			'foreignKey' => 'curso_id',
			'dependent' => true,    //false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'CursoParticipante' => array( 
			'className' => 'CursoParticipante',
			'foreignKey' => 'curso_id',
			'dependent' => true,    // false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'FechasCurso' => array( 
			'className' => 'FechasCurso',
			'foreignKey' => 'curso_id',
			'dependent' => true,    // false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		), // Tiene múltiples relaciones con este modelo 
//		'CursosRelacionado' => array( // (R1)
//			'className' => 'CursosRelacionado',
//			'foreignKey' => 'curso_id',
//			'dependent' => true,    // false,
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'exclusive' => '',
//			'finderQuery' => '',
//			'counterQuery' => ''
//		), // Relación equivalente a 'CursoRel' en 'CursosRelacionado'
//    	'CursosRelacionadoRel' => array( // (R2)
//    		'className' => 'CursosRelacionado',
//			'foreignKey' => 'curso_rel_id',
//   		'dependent' => true,    // false,
//  		'conditions' => '',
//    		'fields' => '',
//			'order' => '',
//   		'limit' => '',
//    		'offset' => '',
//    		'exclusive' => '',
//			'finderQuery' => '',
//    		'counterQuery' => ''
//    	)
//		'AreaCurso' => array(    // 'Area'
//			'className' => 'AreaCurso',    // 'Area',
//			'foreignKey' => 'curso_id',
//			'dependent' => true,    // false,
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'finderQuery' => '',
//			'deleteQuery' => '',
//			'insertQuery' => ''
//		)
	);

	var $hasAndBelongsToMany = array(
		'Area' => array( // Muchos cursos pertenecen a muchas áreas 
			'className' => 'Area',
			'joinTable' => 'area_cursos',
			'foreignKey' => 'curso_id',
			'associationForeignKey' => 'area_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
		, 
		'Modulo' => array(
			'className' => 'Curso',
			'joinTable' => 'modulo_cursos',
			'foreignKey' => 'curso_id',
			'associationForeignKey' => 'modulo_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => 'orden asc',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Relacionado' => array(
			'className' => 'Curso',
			'joinTable' => 'rel_cursos',
			'foreignKey' => 'curso_id',
			'associationForeignKey' => 'rel_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
	
	// Función: afterFind
	// Decripción: Añade la fecha de modificación a la descripción del estado de los registros Desactivados 
	// e inactivos que tengan el comodín '<fecha_modif>'.

	var $order = array('Curso.nivel' => 'desc', 'Curso.created' => 'asc');

	function fechaFormato($dateString) {
	    return date('d-m-Y', strtotime($dateString));
	}
	
}
?>