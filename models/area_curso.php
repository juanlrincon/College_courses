<?php
class AreaCurso extends AppModel {

	var $name = 'AreaCurso';
	var $validate = array(
		'curso_id' => array('numeric'),
		'area_id' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Curso' => array(
			'className' => 'Curso',
			'foreignKey' => 'curso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'area_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $order = array('AreaCurso.created' => 'asc');
}
?>