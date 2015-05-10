<?php
class Area extends AppModel {

	var $name = 'Area';
	// Validaciones para los campos del modelo 
	// NOTA: No se incluye el campo "'required' => true" porque ocasiona que fallen las funciones 'delete' y 'activate'
	var $validate = array(
		'nombre' => array(
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'El nombre del área es requerido',
				'required' => true
		        ),
		'isUnique' => array(
		        'rule' => 'isUnique',
		        'message' => 'El nombre del área ya existe',
		        )
		    )
	);
	// Orden por omisión para búsquedas de listas 
	var $order = array('Area.created' => 'asc');

	//The Associations below have been created with all possible keys, those that are not needed can be removed


//	var $hasMany = array(
//		'AreaCurso' => array(
//			'className' => 'AreaCurso',
//			'foreignKey' => 'area_id',
//			'dependent' => false,
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'exclusive' => '',
//			'finderQuery' => '',
//			'counterQuery' => ''
//		)
//	); 
	
	var $hasAndBelongsToMany = array(
		'Curso' => array( // Muchas áreas pertenecen a muchos cursos
			'className' => 'Curso',
			'joinTable' => 'area_cursos',
			'foreignKey' => 'area_id',
			'associationForeignKey' => 'curso_id',
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

	
	function fechaFormato($dateString) {
	    return date('d-m-Y', strtotime($dateString));
	}
	
}
?>