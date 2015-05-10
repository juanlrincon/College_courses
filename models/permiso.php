<?php
class Permiso extends AppModel {

	var $name = 'Permiso';

	var $belongsTo = array(
		'Rol' => array(
			'className' => 'Rol',
			'foreignKey' => 'rol_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	//var $order = array('Permiso.created' => 'asc');
}
?>