<?php
class Participante extends AppModel {

	var $name = 'Participante';
	/*var $validate = array(
		'usuario_id' => array('numeric')
	);
*/
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    var $hasMany = array(
        'CursoParticipante' => array(
		    'className' => 'CursoParticipante',
		    'foreignKey' => 'participante_id',
		    'dependent' => true,    // false,
		    'conditions' => '',
		    'fields' => '',
		    'order' => '',
		    'limit' => '',
		    'offset' => '',
		    'exclusive' => '',
		    'finderQuery' => '',
		    'counterQuery' => ''
	    )
	);

	var $order = array('Participante.created' => 'asc');
//	var $hasAndBelongsToMany = array(
//		'Curso' => array(
//			'className' => 'Curso',
//			'joinTable' => 'curso_participantes',
//			'foreignKey' => 'participante_id',
//			'associationForeignKey' => 'curso_id',
//			'unique' => true,
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'finderQuery' => '',
//			'deleteQuery' => '',
//			'insertQuery' => ''
//		)
//	);

}
?>