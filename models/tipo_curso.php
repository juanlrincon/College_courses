<?php
class TipoCurso extends AppModel {

	var $name = 'TipoCurso';
	// El comportamiento como repositorio de imágenes (para los logos de los tipos de cursos) se habilita en el controlador 
    
	// Validaciones para formas 
	// NOTA: No se incluye el campo "'required' => true" porque ocasiona que fallen las funciones 'delete' y 'activate'
	var $validate = array(
		'nombre' => array(
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'El nombre del tipo de curso es requerido.',
				'required' => true
		        ),
		'isUnique' => array(
		        'rule' => 'isUnique',
		        'message' => 'El tipo de curso ya existe',
		        )
		    ),
        'name' => array('notempty'),
		'type' => array('notempty'),
		'size' => array('numeric')
	);
	// Orden por omisión para búsquedas de listas 
	var $order = array('TipoCurso.created' => 'asc');

	var $hasMany = array(
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'tipo_curso_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	function fechaFormato($dateString) {
	    return date('d-m-Y', strtotime($dateString));
	}
	
}
?>