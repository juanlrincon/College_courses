<?php
class Rol extends AppModel {

	var $name = 'Rol';
	
	var $displayField = 'name'; // minimalistic access control
	// Validaciones para formas 
	// NOTA: No se incluye el campo "'required' => true" porque ocasiona que fallen las funciones 'delete' y 'activate'
	var $validate = array(
		'nombre' => array(
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'El nombre del rol es requerido'
		        ),
		    'isUnique' => array(
		        'rule' => 'isUnique',
		        'message' => 'El Rol ya existe.'
		        )
		    )
	);
	// Orden por omisión para búsquedas de listas 
	var $order = array('Rol.created' => 'asc');

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'rol_id',
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