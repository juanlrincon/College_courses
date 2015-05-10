<?php
class Usuario extends AppModel {

	var $name = 'Usuario';
	var $validate = array(
		'nombre_usuario' => array(
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'El nombre de usuario es requerido'
		        )
		    ),
		'password' => array(
		    'notempty' => array(
		        'rule' => 'notempty',
		        'last' => true,
		        'message' => 'El password del usuario es requerido'
		        ),
		    'mayora8' => array(
		        'rule' => array('minLength', 8),
		        'last' => true,
		        'message' => 'El password del usuario debe ser mayor de 8 caracteres'
		        )),
		'rol_id' => array(
		    'numeric',
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'Por favor, seleccione un rol.'
		        )
		    ),
		'nombres' => array(
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'El, o los, nombres del usuario son requeridos.'
		        )
		    ),
		'apellido_paterno' => array(
		    'notempty' => array(
		        'rule' => 'notempty',
		        'message' => 'El apellido paterno del usuario es requerido.'
		        )
		    ),
		'correo_electronico' => array(
		    'notempty' => array(
		        'rule' => 'notempty',
		        'last' => true,
		        'message' => 'Escriba una dirección de correo electrónico.'
		        ),
		    'email' => array(
		        'rule' => array('email'),
		        'last' => true,
		        'message' => 'Escriba una dirección válida de correo electrónico.'
		        ),
		    'isUnique' => array(
		        'rule' => 'isUnique',
		        'on' => 'create',
		        'message' => 'Esta dirección de correo electrónico ya está asignada a otro usuario.'
		        )
		    )
	);
	// Orden por omisión para búsquedas de listas 
	var $order = array('Usuario.created' => 'asc');

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Rol' => array(
			'className' => 'Rol',
			'foreignKey' => 'rol_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasOne = array(
		'Participante' => array(
			'className' => 'Participante',
			'foreignKey' => 'usuario_id',
			'dependent' => true,    // false,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	

	function fechaFormato($dateString) {
	    return date('d-m-Y', strtotime($dateString));
	}
}
?>