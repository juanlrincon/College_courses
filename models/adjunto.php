<?php
class Adjunto extends AppModel {

	var $name = 'Adjunto';
	// Comportamiento como FileUpload 
	
	var $validate = array(
		'curso_id' => array('numeric'),
		'name' => array('notempty'),
		'type' => array('notempty'),
		'size' => array('numeric')
	);
    // Orden por omisión para búsquedas de listas 
	var $order = array('Adjunto.name' => 'asc');
	
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