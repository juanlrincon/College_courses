<?php
class FechasCurso extends AppModel {

	var $name = 'FechasCurso';
	var $validate = array(
		'curso_id' => array('numeric')
	);

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

	//var $order = array('AreaCurso.created' => 'asc');
}
?>