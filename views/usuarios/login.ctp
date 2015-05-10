<?php
$session->flash('auth');

echo $form->create('Usuario', array('action' => 'login'));
echo $form->inputs(array(
'legend' => __('', true),
'nombre_usuario',
'password'
));
echo $form->end('Login');
?>