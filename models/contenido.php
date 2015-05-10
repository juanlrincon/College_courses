<?php
class Contenido extends AppModel {

	var $name = 'Contenido';

	// Validaciones 
	var $validate = array(
		'nombre' => array(
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'El nombre del curso es requerido'
		        )
		    )
	);

	//var $order = array('Curso.nivel' => 'desc', 'Curso.created' => 'asc');

	function fechaFormato($dateString) {
	    return date('d-m-Y', strtotime($dateString));
	}
	
}
?>