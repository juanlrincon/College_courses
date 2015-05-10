<?php
class CursoParticipante extends AppModel {

	var $name = 'CursoParticipante';
	var $validate = array(
		'curso_id' => array('numeric'),
		'participante_id' => array('numeric')
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
		'FechasCurso' => array(
			'className' => 'FechasCurso',
			'foreignKey' => 'fechacurso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Participante' => array(
			'className' => 'Participante',
			'foreignKey' => 'participante_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	var $order = array('CursoParticipante.created' => 'asc');
}
?>