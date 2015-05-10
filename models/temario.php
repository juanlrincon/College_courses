<?php
class Temario extends AppModel {

	var $name = 'Temario';
	// Comportamiento como FileUpload 
	
	var $validate = array(
		'curso_id' => array('numeric')
	);
    // Orden por omisión para búsquedas de listas 
	//var $order = array('TemarioCurso.titulo' => 'asc');
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'curso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>