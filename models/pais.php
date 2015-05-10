<?php
class Pais extends AppModel {

	var $name = 'Pais';
	// Validaciones para formas 
	// NOTA: No se incluye el campo "'required' => true" porque ocasiona que fallen las funciones 'delete' y 'activate'
	var $validate = array( 
		'nombre' => array(
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'El nombre del país es requerido',
		        'required' => true
		        )
		    ),
		'isUnique' => array(
		        'rule' => 'isUnique',
		        'message' => 'El nombre del país ya existe',
		        )
	);
	// Orden por omisión para búsquedas de listas 
	var $order = array('Pais.created' => 'asc');
	

	var $hasMany = array(
		'Estado' => array(
			'className' => 'Estado',
			'foreignKey' => 'pais_id',
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