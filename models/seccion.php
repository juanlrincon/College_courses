<?php
class Seccion extends AppModel {

	var $name = 'Seccion';
	// Validaciones para los campos del modelo 
	var $validate = array(
		'nombre' => array(
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'El nombre de la sección es requerido'
		        )
		    )
	);
	// Orden por omisión para búsquedas de listas 
	//var $order = array('Seccion.created' => 'asc');

	function fechaFormato($dateString) {
	    return date('d-m-Y', strtotime($dateString));
	}
	
}
?>