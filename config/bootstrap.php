<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 *
 * This file is loaded automatically by the app/webroot/index.php file after the core bootstrap.php is loaded
 * This is an application wide file to load any function that is not used within a class define.
 * You can also use this to include or require any files in your application.
 *
 */
 // Para configurar el lenguaje de la aplicación a español (es) 
    Configure::write('Config.language', 'spa');
/**
 * The settings below can be used to set additional paths to models, views and controllers.
 * This is related to Ticket #470 (https://trac.cakephp.org/ticket/470)
 *
 * $modelPaths = array('full path to models', 'second full path to models', 'etc...');
 * $viewPaths = array('this path to views', 'second full path to views', 'etc...');
 * $controllerPaths = array('this path to controllers', 'second full path to controllers', 'etc...');
 *
 */
//EOF
global $permiso, $permisos, $short_date, $tc_images_path;

$permiso[1]['titulo'] = 'Usuarios';
$permiso[1]['nombre'] = 'Agregar Usuario';
$permiso[1]['path'] = 'usuarios/add';
$permiso[1]['menu'] = array(array('3' => 'Regresar'));
$permiso[2]['nombre'] = 'Editar Usuario';
$permiso[2]['path'] = 'usuarios/edit';
$permiso[2]['menu'] = array(array('3' => 'Regresar'));
$permiso[3]['nombre'] = 'Usuarios';
$permiso[3]['path'] = 'usuarios/index';
$permiso[3]['menu'] = array('1', '29', '48');
$permiso[4]['nombre'] = 'Activar Usuario';
$permiso[4]['path'] = 'usuarios/activate';
$permiso[4]['espacio'] = '';

$permiso[5]['titulo'] = 'Cursos';
$permiso[5]['nombre'] = 'Agregar Curso';
$permiso[5]['path'] = 'cursos/add';
//$permiso[5]['menu'] = array('37','17','13','25');
$permiso[5]['menu'] = array(array('8' => 'Regresar'));
$permiso[6]['nombre'] = 'Editar Curso';
$permiso[6]['path'] = 'cursos/edit';
//$permiso[6]['menu'] = array(array('8' => 'Regresar'), '17','13','25','33','37');
$permiso[6]['menu'] = array(array('8' => 'Regresar'));
$permiso[7]['nombre'] = 'Instructor';
$permiso[7]['path'] = '';
$permiso[7]['menu'] = array('');

$permiso[46]['nombre'] = 'Instructor cambia nombre del curso';
$permiso[46]['path'] = '';
$permiso[46]['menu'] = array('');

$permiso[8]['nombre'] = 'Cursos';
$permiso[8]['path'] = 'cursos/lists';
$permiso[8]['menu'] = array('5','37','21','17', '41', '33');
$permiso[9]['nombre'] = 'Activar Curso';
$permiso[9]['path'] = 'cursos/activate';
$permiso[9]['menu'] = array('1');
$permiso[10]['nombre'] = 'Autorizar Curso';
$permiso[10]['path'] = 'cursos/autorize';
$permiso[10]['espacio'] = '';

$permiso[11]['titulo'] = 'Estados';
$permiso[11]['nombre'] = 'Agregar Estado';
$permiso[11]['path'] = 'estados/add';
$permiso[11]['menu'] = array(array('13' => 'Regresar'));
$permiso[12]['nombre'] = 'Editar Estado';
$permiso[12]['path'] = 'estados/edit';
$permiso[12]['menu'] = array(array('13' => 'Regresar'));
$permiso[13]['nombre'] = 'Estados';
$permiso[13]['path'] = 'estados/index';
$permiso[13]['menu'] = array(array('17' => 'Regresar'), '11','25');
$permiso[14]['nombre'] = 'Activar Estado';
$permiso[14]['path'] = 'estados/activate';
$permiso[14]['espacio'] = '';

$permiso[15]['titulo'] = 'Paises';
$permiso[15]['nombre'] = 'Agregar Pais';
$permiso[15]['path'] = 'paises/add';
$permiso[15]['menu'] = array(array('17' => 'Regresar'));
$permiso[16]['nombre'] = 'Editar Pais';
$permiso[16]['path'] = 'paises/edit';
$permiso[16]['menu'] = array(array('17' => 'Regresar'));
$permiso[17]['nombre'] = 'Paises';
$permiso[17]['path'] = 'paises/index';
$permiso[17]['menu'] = array(array('8' => 'Regresar'), '15','13');
$permiso[18]['nombre'] = 'Activar Pais';
$permiso[18]['path'] = 'paises/activate';
$permiso[18]['espacio'] = '';

$permiso[19]['titulo'] = 'Areas';
$permiso[19]['nombre'] = 'Agregar Area';
$permiso[19]['path'] = 'areas/add';
$permiso[19]['menu'] = array(array('21' => 'Regresar'));
$permiso[20]['nombre'] = 'Editar Area';
$permiso[20]['path'] = 'areas/edit';
$permiso[20]['menu'] = array(array('21' => 'Regresar'));
$permiso[21]['nombre'] = 'Areas';
$permiso[21]['path'] = 'areas/index';
$permiso[21]['menu'] = array(array('8' => 'Regresar'), '19');
$permiso[22]['nombre'] = 'Activar Area';
$permiso[22]['path'] = 'areas/activate';
$permiso[22]['espacio'] = '';

$permiso[23]['titulo'] = 'Ciudades';
$permiso[23]['nombre'] = 'Agregar Ciudad';
$permiso[23]['path'] = 'ciudades/add';
$permiso[23]['menu'] = array(array('25' => 'Regresar'));
$permiso[24]['nombre'] = 'Editar Ciudad';
$permiso[24]['path'] = 'ciudades/edit';
$permiso[24]['menu'] = array(array('25' => 'Regresar'));
$permiso[25]['nombre'] = 'Ciudades';
$permiso[25]['path'] = 'ciudades/index';
$permiso[25]['menu'] = array(array('13' => 'Regresar'), '23');
$permiso[26]['nombre'] = 'Activar Ciudad';
$permiso[26]['path'] = 'ciudades/activate';
$permiso[26]['espacio'] = '';

$permiso[27]['titulo'] = 'Roles';
$permiso[27]['nombre'] = 'Agregar Rol';
$permiso[27]['path'] = 'roles/add';
$permiso[27]['menu'] = array(array('29' => 'Regresar'));
$permiso[28]['nombre'] = 'Editar Rol';
$permiso[28]['path'] = 'roles/edit';
$permiso[28]['menu'] = array(array('29' => 'Regresar'));
$permiso[29]['nombre'] = 'Roles';
$permiso[29]['path'] = 'roles/index';
$permiso[29]['menu'] = array(array('3' => 'Regresar'), '27');
$permiso[30]['nombre'] = 'Activar Rol';
$permiso[30]['path'] = 'roles/activate';
$permiso[30]['espacio'] = '';

$permiso[31]['titulo'] = 'Inscripciones';
$permiso[31]['nombre'] = 'Inscribir';
$permiso[31]['path'] = 'curso_participantes/add';
$permiso[31]['menu'] = array(array('33' => 'Regresar'));
$permiso[32]['nombre'] = 'Editar Inscripcion';
$permiso[32]['path'] = 'curso_participantes/edit';
$permiso[32]['menu'] = array(array('33' => 'Regresar'));
$permiso[33]['nombre'] = 'Inscripciones';
$permiso[33]['path'] = 'curso_participantes/index';
$permiso[33]['menu'] = array(array('8' => 'Regresar'), '31');
$permiso[34]['nombre'] = 'Activar Inscripcion';
$permiso[34]['path'] = 'curso_participantes/activate';
$permiso[34]['espacio'] = '';

$permiso[35]['titulo'] = 'Tipo de Cursos';
$permiso[35]['nombre'] = 'Agregar Tipo de Curso'; // esta ya se va a quitar
$permiso[35]['path'] = 'tipo_cursos/add';
$permiso[35]['menu'] = array(array('37' => 'Regresar'));
$permiso[36]['nombre'] = 'Editar Tipo de Curso';
$permiso[36]['path'] = 'tipo_cursos/edit';
$permiso[36]['menu'] = array(array('37' => 'Regresar'));
$permiso[37]['nombre'] = 'Tipo de Cursos';
$permiso[37]['path'] = 'tipo_cursos/index';
$permiso[37]['menu'] = array(array('8' => 'Regresar'), '35');
$permiso[38]['nombre'] = 'Activar Tipo de Curso';
$permiso[38]['path'] = 'tipo_cursos/activate';
$permiso[38]['espacio'] = '';

$permiso[39]['titulo'] = 'Participantes';
$permiso[39]['nombre'] = 'Agregar Participante';
$permiso[39]['path'] = 'participantes/add';
$permiso[39]['menu'] = array(array('41' => 'Regresar'));
$permiso[40]['nombre'] = 'Editar Participante';
$permiso[40]['path'] = 'participantes/edit';
$permiso[40]['menu'] = array(array('41' => 'Regresar'));
$permiso[41]['nombre'] = 'Participantes';
$permiso[41]['path'] = 'participantes/index';
$permiso[41]['menu'] = array(array('8' => 'Regresar'), '39');
$permiso[42]['nombre'] = 'Activar Participante';
$permiso[42]['path'] = 'participantes/activate';
$permiso[42]['espacio'] = '';

$permiso[43]['titulo'] = 'Secciones';
$permiso[43]['nombre'] = 'Editar Sección';
$permiso[43]['path'] = 'secciones/edit';
$permiso[43]['menu'] = array('');
$permiso[44]['nombre'] = 'Secciones';
$permiso[44]['path'] = 'secciones/index';
$permiso[44]['menu'] = array('');
$permiso[44]['espacio'] = '';

$permiso[45]['nombre'] = '';
$permiso[45]['path'] = '';
$permiso[45]['espacio'] = '';



//Configure::write('DateBehaviour.dateFormat', 'dd-mm-yyyy');
//Configure::write('DateBehaviour.delimiterDateFormat', '-');

$short_date['Jan'] = 'Ene';
$short_date['Feb'] = 'Feb';
$short_date['Mar'] = 'Mar';
$short_date['Apr'] = 'Abr';
$short_date['May'] = 'May';
$short_date['Jun'] = 'Jun';
$short_date['Jul'] = 'Jul';
$short_date['Aug'] = 'Ago';
$short_date['Sep'] = 'Sep';
$short_date['Oct'] = 'Oct';
$short_date['Nov'] = 'Nov';
$short_date['Dec'] = 'Dic';

$tc_images_path = '/files/tipocursos/';

//echo $this->TipoCurso->field('nombre', array('id' => '1'));
//$menu[0] = 1;
$config =& Configure::getInstance();
$config->permisos = array();

?>