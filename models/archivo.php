<?php
class Archivo extends AppModel {

	var $name = 'Archivo';
	// Comportamiento como FileUpload 
	var $actsAs = array(
	    'FileUpload.FileUpload' => array(
	        'allowedTypes' => array('*')
	        )
	    );
	
	var $validate = array(
		'curso_id' => array('numeric'),
		'name' => array('notempty'),
		'type' => array('notempty'),
		'size' => array('numeric')
	);
    // Orden por omisión para búsquedas de listas 
	var $order = array('Archivo.name' => 'asc');
	
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