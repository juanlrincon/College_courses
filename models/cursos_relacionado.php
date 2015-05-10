<?php
class CursosRelacionado extends AppModel {

	var $name = 'CursosRelacionado';
	var $validate = array(
		'curso_id' => array('numeric'),
		'curso_rel_id' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Curso' => array( // (R1) Tiene múltiples relaciones con este modelo
			'className' => 'Curso',
			'foreignKey' => 'curso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		), // Relación equivalente a 'CursosRelacionadoRel' en 'Curso'
		'CursoRel' => array( // (R2)
			'className' => 'Curso',
			'foreignKey' => 'curso_rel_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	var $order = array('CursosRelacionado.created' => 'asc');
}
?>