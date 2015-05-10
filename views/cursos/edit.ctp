<?php echo $javascript->link(array('prototype','scriptaculous'), false);
if (isset($this->data['Temario']))
	$no_temarios = count($this->data['Temario']);
else
	$no_temarios = 0;
	
if (isset($this->data['FechasCurso']))
	$no_fechas = count($this->data['FechasCurso']);
else
	$no_fechas = 0;

echo '<script>
var temario_index = '.$no_temarios.';
var fechas_index = '.$no_fechas.';
</script>';
?>
<script>
function imparticion()
{
	obj = document.getElementById('fechas');
	obj2 = document.getElementById('send_fechas');

	if (obj.style.display == 'block')
	{
		obj.style.display = 'none';
		obj2.value = "0";
	}
	else
	{
		obj.style.display = 'block';
		obj2.value = "1";
	}
}


var upload_number = 2;
function addFileInput() {
    var d = document.createElement("div");
    var file = document.createElement("input");
    file.setAttribute("type", "file");
    file.setAttribute("name", "data[Adjunto]["+upload_number+"]");
    d.appendChild(file);
    document.getElementById("moreUploads").appendChild(d);
    upload_number++;
}

function setBlock() {
   document.getElementById('moreLink').style.display = 'block';
}

function agregarTemario()
{
    var d = document.createElement("div");
    var titulo = document.createElement("div");
    var temas = document.createElement("div");
    var input = document.createElement("input");
    var textarea = document.createElement("textarea");
	titulo.innerHTML = '<label>Titulo</label>';
	temas.innerHTML = '<label>Temas</label>';
    input.setAttribute("type", "text");
    input.setAttribute("name", "data[Temario]["+temario_index+"][titulo]");
	// Esta linea falla con IE
    //textarea.setAttribute("type", "textarea");
    textarea.setAttribute("name", "data[Temario]["+temario_index+"][temas]");
    d.appendChild(titulo);
    d.appendChild(input);
    d.appendChild(temas);
    d.appendChild(textarea);
    document.getElementById("temarios").appendChild(d);
    temario_index++;
}

function agregarFechas()
{
    var br = document.createElement("div");
    d1 = document.createElement("div");
    d2 = document.createElement("div");
    d3 = document.createElement("div");
    e1 = document.createElement("div");
    t1 = document.createElement("div");
    t2 = document.createElement("div");
    t3 = document.createElement("div");

    obj1dia = document.getElementById('CursoFecha1Day').cloneNode(true);
	obj1mes = document.getElementById('CursoFecha1Month').cloneNode(true);
	obj1ano = document.getElementById('CursoFecha1Year').cloneNode(true);

	obj2dia = obj1dia.cloneNode(true);
	obj2mes = obj1mes.cloneNode(true);
	obj2ano = obj1ano.cloneNode(true);

	obj3dia = obj1dia.cloneNode(true);
	obj3mes = obj1mes.cloneNode(true);
	obj3ano = obj1ano.cloneNode(true);

	obj1dia.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_inicio][day]");
	obj1mes.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_inicio][month]");
	obj1ano.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_inicio][year]");

	obj2dia.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_fin][day]");
	obj2mes.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_fin][month]");
	obj2ano.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_fin][year]");

	obj3dia.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_limite][day]");
	obj3mes.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_limite][month]");
	obj3ano.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_limite][year]");

    d1.setAttribute("id", "date");
    d2.setAttribute("id", "date");
    d3.setAttribute("id", "date");
    e1.setAttribute("id", "dates");

	t1.innerHTML = 'Fecha de Inicio';
	t2.innerHTML = 'Fecha de Finaizacion';
	t3.innerHTML = 'Fecha Limite';
    d1.appendChild(t1);
    d2.appendChild(t2);
    d3.appendChild(t3);

    d1.appendChild(obj1dia);
    d1.appendChild(obj1mes);
    d1.appendChild(obj1ano);

    d2.appendChild(obj2dia);
    d2.appendChild(obj2mes);
    d2.appendChild(obj2ano);

    d3.appendChild(obj3dia);
    d3.appendChild(obj3mes);
    d3.appendChild(obj3ano);

    e1.appendChild(d1);
    e1.appendChild(d2);
    e1.appendChild(d3);
    
    document.getElementById("fechas1").appendChild(e1);
    fechas_index++;
}

function validate()
{
	if (fechas_index == 0)
	{
		alert('Necesitas Agregar una Imparticion para el curso');
		return false;
	}
	else
		return true;		
}
</script>

</script>
<div class="cursos form">
<?php echo $form->create('Curso', array('enctype' => 'multipart/form-data', 'onsubmit' => 'return validate();'));?>
	<fieldset>
	<?php

		echo $form->input('id');
//// quitar estos, solo uso temporal
////if ($instructor != 1) // si no es instructor
////{
	if ($form->value('Curso.nivel') == 2) // Curso
		echo '<div class="beforecheckbox">'.$form->input('Modulo', array('label' => 'Modulos del curso', 'type' => 'select', 'multiple' => 'checkbox')).'</div>';

	echo '<br>';

	if ($form->value('Curso.nivel') == 2) // Curso
		echo '<div class="beforecheckbox">'.$form->input('Relacionado', array('label' => 'Cursos Relacionados','div' => array('id' =>  'CursoRelacionados'), 'type' => 'select', 'multiple' => 'checkbox', 'enabled' => FALSE)).'</div>';

	echo '<dt>'.$form->input('nombre', array('label' => 'Nombre')).'</dt>';

	if ($form->value('Curso.nivel') == 2) // Curso
	{
		echo '<dt>Tipo Curso:</dt>';
		echo '<dd>'.$form->value('TipoCurso.nombre').'</dd>';
	}
	
	echo '<dt>Horas:</dt>';
	echo '<dd>'.$form->value('Curso.horas').' hrs.</dd>';
	// cambio temporal
	////if ($form->value('Curso.nivel') == 1) // Modulo
	////{
	////	echo '<dt>Instructor:</dt>';
	////	echo '<dd>'.$form->value('Instructor.nombres').' '.$form->value('Instructor.apellido_paterno').' '.$form->value('Instructor.apellido_materno').'</dd>';
	////}
	// cambio temporal
	//if ($form->value('Curso.nivel') == 2) // Curso
	//{
		////echo '<dt>Vendedor:</dt>';
		////echo '<dd>'.$form->value('Vendedor.nombres').' '.$form->value('Vendedor.apellido_paterno').' '.$form->value('Vendedor.apellido_materno').'</dd>';
	//}
	
	if ($form->value('Curso.nivel') == 1) // Modulo
	echo $form->input('instructor_id', array('label' => 'Instructor'));
	
	echo $form->input('precio', array('label' => 'Precio'));
	
		$options2 = array('1'=>'Pesos','2'=>'Dólares');

        echo $form->input('moneda',
			array('type'=>'select',
				'options'=>$options2,
				'label'=>'Moneda:'));

////}
////else
////{ // Instructor
// nota el instructor no ve cursos de nivel 2
/*
	echo '<dt>Modulos:</dt>';

	foreach($modulos2 as $key => $value)
	{
		echo $value['nombre'].'<br>';
	}
	echo '<br>';

	echo '<dt>Cursos Relacionados:</dt>';
	foreach($relacionados2 as $key2 => $value2)
	{
		echo $value2['nombre'].'<br>';
	}
*/
		echo '<br>';

		if ($form->value('Curso.nivel') == 2) // Curso
			echo '<div class="beforecheckbox">'.$form->input('Relacionado', array('label' => 'Cursos Relacionados','div' => array('id' =>  'CursoRelacionados'), 'type' => 'select', 'multiple' => 'checkbox')).'</div>';
		//// cambio temporal porque al momento de no estar entrando por el else se repite el nombre
		////if ($cambia_nombre)
		////	echo $form->input('nombre', array('label' => 'Nombre'));
		////else
		////{
		////	echo '<dt>Nombre:</dt>';
		////	echo '<dd>'.$form->value('nombre').'</dd>';
		////}

		if ($form->value('Curso.nivel') == 2) // Curso
			echo $form->input('tipo_curso_id', array('label' => 'Tipo de Curso'));

		echo $form->input('horas', array('label' => 'Horas'));
		

		////if ($form->value('Curso.nivel') == 2) // Curso
			echo $form->input('vendedor_id', array('label' => 'Vendedor'));
		//// cambio temporal porque al momento de no estar entrando por el else se repite el precio
		////echo '<dt>Precio:</dt>';
		////echo '<dd>'.$form->value('Curso.precio').'</dd>';
////}
////else
////{
		if($rol_id != 1) // Administrador
		{
			echo $form->input('objetivo', array('label' => 'Objetivo'));
			echo $form->input('descripcion_general', array('label' => 'Descripcion General'));
			echo $form->input('beneficio', array('label' => 'Beneficio'));
			echo $form->input('perfil', array('label' => 'Perfil'));
		}

		if ($form->value('Curso.nivel') == 1) // Modulo
		{
			echo '<label>Temario</label><div style="margin-left:40px">';
	
			for($i = 0; $i <= $no_temarios-1; $i++)
			{
				echo $form->input('Temario.'.$i.'.id', array('label' => 'Titulo'));
				echo $form->input('Temario.'.$i.'.titulo', array('label' => 'Titulo'));
				echo $form->input('Temario.'.$i.'.temas', array('label' => 'Temas'));
			}
			echo '<div id="temarios"></div>';
			echo '</div>';
			echo '<a href="javascript:agregarTemario();">+ Agregar Temario</a><br><br><br>';
		}
////}
////if ($instructor != 1)
////{
		echo '<img src="'.$this->base.'/files/cursos/'.$form->value('Curso.imagen_logo').'" border="0" width="150">';

		echo $form->input('Archivo.file', array('type' => 'file', 'label' => 'Imagen para logo del curso'));

		echo '<label>Imparticiones</label><div style="margin-left:40px;">';

		for($i = 0; $i <= $no_fechas-1; $i++)
		{
			echo '<div id="dates">';
			echo $form->input('FechasCurso.'.$i.'.id');
			echo $form->input('FechasCurso.'.$i.'.fecha_inicio', array('div' => array('id' => 'date'), 'label' => 'Fecha de Inicio', 'dateFormat' => 'DMY'));
			echo $form->input('FechasCurso.'.$i.'.fecha_fin', array('div' => array('id' => 'date'), 'label' => 'Fecha de finalización', 'dateFormat' => 'DMY'));
			echo $form->input('FechasCurso.'.$i.'.fecha_limite', array('div' => array('id' => 'date'), 'label' => 'Fecha limite', 'dateFormat' => 'DMY'));
			echo '</div>';
		}
		echo '<div id="fechas1"></div>';
		echo '</div>';
		echo '<div id="fechasa"><a href="javascript:agregarFechas();">+ Agregar Imparticion</a></div>';

        echo $form->input('fecha1', array('div' => array('style' => 'display:none;'), 'type' => 'date', 'label' => 'Fecha de Inicio', 'dateFormat' => 'DMY'));

		echo $form->input('ciudad_id', array('label' => 'Ciudad'));

		if($rol_id == 5) // Asistente de Ventas
		{
			echo $form->input('campus', array('label' => 'Campus'));
			echo $form->input('edificio', array('label' => 'Edificio'));
			echo $form->input('salon', array('label' => 'Salón'));
			echo $form->input('detalle_salon', array('label' => 'Detalle de la ubicación del salón', 'rows' => '3', 'cols' => '30'));
		}
		echo '<div class="beforecheckbox">'.$form->input('Area', array('type' => 'select', 'multiple' => 'checkbox', 'label' => 'Areas académicas a las que pertenece el curso')).'</div>';
////}
////else
////{
		echo '<label>Archivos</label><br>';
		echo '<div id="post"></div>';

		foreach($adjuntos as $key => $value)
		{
			//echo '<br><div id="del'.$key.'" style="float:left;"><a href="'.$this->base.'/'.$value.'">'.$value.'</a>';
echo $html->link($value, array('action' => 'download', $value));
			echo '&nbsp;&nbsp;&nbsp;';
			echo $ajax->link('borrar', array( 'controller' => 'cursos', 'action' => 'deletefile', 1 , $value ), array( 'update' => 'post', 'after' => 'document.getElementById("del'.$key.'").style.display = \'none\';' ));
			echo '</div>';
		}
		echo '<br><br>';

	?>

      <input type="file" name="data[Adjunto][1]" id="attach"
      onchange="setBlock();" />
      <div id="moreUploads"></div>
      <div id="moreLink">
      <a href="javascript:addFileInput();">Agregar otro Archivo</a>
      </div>
	<br><br>
<?php 
////}
?>
	</fieldset>
    <?php //echo $form->end('Añadir');
        echo $form->submit('guardar.png'); ?>
</div>