<?php
echo '<fieldset>';

	echo '<br>';
//if ($instructor != 1) // No administrador
//{
		if ($curso['Curso']['nivel'] == 2) // Modulo
	{
		echo '<label>Modulos</label><div style="margin-left:40px">';
		echo '<table border="0" celpadding="0" cellspacing="0">';

		foreach($curso['Modulo'] as $key => $value)
		{
			echo '<tr>';
			echo '<td valign="top">'.$value['nombre'].'</td>';
			echo '</tr>';
		}
		echo '</table></div>';			
	}

	echo '<br>';
	
	if ($curso['Curso']['nivel'] == 2) // Modulo
	{
		echo '<label>Cursos Relacionados</label><div style="margin-left:40px">';
		echo '<table border="0" celpadding="0" cellspacing="0">';

		foreach($curso['Relacionado'] as $key => $value)
		{
			echo '<tr>';
			echo '<td valign="top">'.$value['nombre'].'</td>';
			echo '</tr>';
		}
		echo '</table></div>';
	}
		
	echo '<dt>Nombre Curso:</dt>';
	echo '<dd>'.$curso['Curso']['nombre'].'</dd>';

	if ($curso['Curso']['nivel'] == 2) // Curso
	{
		echo '<dt>Tipo Curso:</dt>';
		echo '<dd>'.$curso['TipoCurso']['nombre'].'</dd>';
	}
	
	echo '<dt>Horas:</dt>';
	echo '<dd>'.$curso['Curso']['horas'].' hrs.</dd>';

	if ($curso['Curso']['nivel'] == 1) // Modulo
	{
		echo '<dt>Instructor:</dt>';
		echo '<dd>'.$curso['Instructor']['nombres'].' '.$curso['Instructor']['apellido_paterno'].' '.$form->value('Instructor.apellido_materno').'</dd>';
	}

	if ($curso['Curso']['nivel'] == 2) // Curso
	{
		echo '<dt>Vendedor:</dt>';
		echo '<dd>'.$curso['Vendedor']['nombres'].' '.$curso['Vendedor']['apellido_paterno'].' '.$curso['Vendedor']['apellido_materno'].'</dd>';
	}
	
	echo '<dt>Precio:</dt>';
	echo '<dd>'.$curso['Curso']['precio'].'</dd>';
//}
//else
//{ // Administrador
	
////}
////else
////{
		//if($rol_id != 1) // Administrador
		//{
	echo '<dt>Objetivo:</dt>';
	echo '<dd>'.$curso['Curso']['objetivo'].'</dd>';

	echo '<dt>Descripción General:</dt>';
	echo '<dd>'.$curso['Curso']['descripcion_general'].'</dd>';

	echo '<dt>Beneficio:</dt>';
	echo '<dd>'.$curso['Curso']['beneficio'].'</dd>';

	echo '<dt>Perfil:</dt>';
	echo '<dd>'.$curso['Curso']['perfil'].'</dd>';

		//}

		if ($curso['Curso']['nivel'] == 1) // Modulo
		{
			echo '<label>Temario</label><div style="margin-left:40px">';
			echo '<table border="0" celpadding="0" cellspacing="0">';
			echo '<tr>';
			echo '<td>Titulo</td>';
			echo '<td>Temas</td>';
			echo '</tr>';
			foreach($curso['Temario'] as $key => $value)
			{
				echo '<tr>';
				echo '<td valign="top">'.$value['titulo'].'</td>';
				echo '<td valign="top"><pre>'.$value['temas'].'</pre></td>';
				echo '</tr>';
			}
			echo '</table></div>';			
		}

//}
//if ($instructor != 1)
//{
		echo '<label>Imagen para logo del curso:</label>';

		if ($curso['Curso']['imagen_logo'] != '')
			echo '<img src="'.$this->base.'/files/cursos/'.$curso['Curso']['imagen_logo'].'" border="0" width="150">';
		else
			echo 'No hay imagen';

		echo '<label>Imparticiones</label><div style="margin-left:40px;">';

		echo '<table border="0" celpadding="0" cellspacing="0">';
		echo '<tr>';
		echo '<td>Fecha Inicio</td>';
		echo '<td>Fecha Fin</td>';
		echo '<td>Fecha Limite</td>';
		echo '</tr>';
		foreach($curso['FechasCurso'] as $key => $value)
		{
			echo '<tr>';
			echo '<td>'.$value['fecha_inicio'].'</td>';
			echo '<td>'.$value['fecha_fin'].'</td>';
			echo '<td>'.$value['fecha_limite'].'</td>';
			echo '</tr>';
		}
		echo '</table></div>';


//		echo $form->value('ciudad_id', array('label' => 'Ciudad'));
		echo '<dt>Ciudad</dt>';
		echo '<dd>'.$curso['Ciudad']['nombre'].'</dd>';

		//if($rol_id == 5) // Asistente de Ventas
		//{
			echo '<dt>Campus</dt>';
			echo '<dd>'.$curso['Curso']['campus'].'</dd>';

			echo '<dt>Edificio</dt>';
			echo '<dd>'.$curso['Curso']['edificio'].'</dd>';

			echo '<dt>Salón</dt>';
			echo '<dd>'.$curso['Curso']['salon'].'</dd>';

			echo '<dt>Detalle de la ubicación del salón</dt>';
			echo '<dd>'.nl2br($curso['Curso']['detalle_salon'].'</dd>');
		//}
//}
//else
//{
			echo '<label>Areas Academicas</label><div style="margin-left:40px">';
			echo '<table border="0" celpadding="0" cellspacing="0">';
			foreach($curso['Area'] as $key => $value)
			{
				echo '<tr>';
				echo '<td valign="top">'.$value['nombre'].'</td>';
				echo '</tr>';
			}
			echo '</table></div>';

	echo '</fieldset>';
?>