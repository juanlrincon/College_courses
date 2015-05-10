<?php
class Estado extends AppModel {

	var $name = 'Estado';
	// Validaciones para formas 
	// NOTA: No se incluye el campo "'required' => true" porque ocasiona que fallen las funciones 'delete' y 'activate'
	var $validate = array(
		'pais_id' => array(
		    'numeric',
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'Por favor, seleccione un país.',
		        'required' => true
		        )
		    ),
		'nombre' => array(
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'El nombre del estado es requerido',
		        'required' => true
		        )
		    )
	);
	// Orden por omisión para búsquedas de listas 
	var $order = array('Estado.created' => 'asc');
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Pais' => array(
			'className' => 'Pais',
			'foreignKey' => 'pais_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Ciudad' => array(
			'className' => 'Ciudad',
			'foreignKey' => 'estado_id',
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