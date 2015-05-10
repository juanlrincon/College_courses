<?php echo $javascript->link(array('prototype','scriptaculous'), false); ?>
<script>
function changeView(nivel)
{
	if (nivel == '1')
	{
		var level = 1;
		document.getElementById('CursoInstructorP').style.display = 'block';
		document.forms[0].CursoInstructorId.style.display = 'block';
		// cambio temporal
		//document.getElementById('CursoVendedorP').style.display = 'none';
		//document.forms[0].CursoVendedorId.style.display = 'none';
		document.getElementById('CursoTipoCurso').style.display = 'none';
		document.forms[0].CursoTipoCursoId.style.display = 'none';
		document.getElementById('CursoModulos').style.display = 'none';
		if (document.getElementById('temarios_all'))
			document.getElementById('temarios_all').style.display = 'block';
		document.getElementById('CursoRelacionados').style.display = 'none';

		document.getElementById('Horas').style.display = 'block';
	}
	else
	{
		var level = 2;
		document.getElementById('CursoInstructorP').style.display = 'none';
		document.forms[0].CursoInstructorId.style.display = 'none';
		// cambio temporal
		//document.getElementById('CursoVendedorP').style.display = 'block';
		//document.forms[0].CursoVendedorId.style.display = 'block';
		document.getElementById('CursoTipoCurso').style.display = 'block';
		document.forms[0].CursoTipoCursoId.style.display = 'block';
		document.getElementById('CursoModulos').style.display = 'block';
		if (document.getElementById('temarios_all'))
			document.getElementById('temarios_all').style.display = 'none';
		document.getElementById('CursoRelacionados').style.display = 'block';

		document.getElementById('Horas').style.display = 'none';
	}
}

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

var temario_index = 0;

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
    //textarea.setAttribute("type", "textarea");
    textarea.setAttribute("name", "data[Temario]["+temario_index+"][temas]");
    d.appendChild(titulo);
    d.appendChild(input);
    d.appendChild(temas);
    d.appendChild(textarea);
    document.getElementById("temarios").appendChild(d);
    temario_index++;
}

var fechas_index = 0;

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

    objorigdia = document.getElementById('CursoFecha1Day');
    objorigmes = document.getElementById('CursoFecha1Month');
    objorigano = document.getElementById('CursoFecha1Year');
    
    obj1dia = objorigdia.cloneNode(true);
	obj1mes = objorigmes.cloneNode(true);
	obj1ano = objorigano.cloneNode(true);

    dia = objorigdia.selectedIndex;
    mes = objorigmes.selectedIndex;
    ano = objorigano.selectedIndex;

	obj2dia = obj1dia.cloneNode(true);
	obj2mes = obj1mes.cloneNode(true);
	obj2ano = obj1ano.cloneNode(true);

	obj3dia = obj1dia.cloneNode(true);
	obj3mes = obj1mes.cloneNode(true);
	obj3ano = obj1ano.cloneNode(true);

	obj1dia.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_inicio][day]");
	obj1mes.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_inicio][month]");
	obj1ano.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_inicio][year]");

	obj1dia.selectedIndex = dia;
	obj1mes.selectedIndex = mes;
	obj1ano.selectedIndex = ano;

	obj2dia.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_fin][day]");
	obj2mes.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_fin][month]");
	obj2ano.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_fin][year]");

	obj2dia.selectedIndex = dia;
	obj2mes.selectedIndex = mes;
	obj2ano.selectedIndex = ano;

	obj3dia.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_limite][day]");
	obj3mes.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_limite][month]");
	obj3ano.setAttribute("name", "data[FechasCurso]["+fechas_index+"][fecha_limite][year]");

	obj3dia.selectedIndex = dia;
	obj3mes.selectedIndex = mes;
	obj3ano.selectedIndex = ano;

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

   // obj1ano.selectedIndex = document.getElementById('CursoFecha1Year').selectedIndex; 
    
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
<div class="cursos form">

<?php echo $form->create('Curso', array('enctype' => 'multipart/form-data', 'onsubmit' => 'return validate();')); ?>
	<fieldset>
	<?php
	
	//echo $form->input('fecha_inicio', array('type' => 'date', 'label' => 'Fecha de Inicio', 'dateFormat' => 'DMY', 'minDay' => date('d'), 'minMonth' => date('n'), 'minYear' => date('Y'), 'maxYear' => date('Y') +1));
	

	echo $form->input('fecha1', array('div' => array('style' => 'display:none;'), 'type' => 'date', 'label' => 'Fecha de Inicio', 'dateFormat' => 'DMY'));
	
		$options=array('1'=>'Modulo','2'=>'Curso');
		//echo '<label for="CursoNombre">Nombre</label>';
		
		        echo $form->input('nivel',
                          array('type'=>'select',
                                'options'=>$options,
                                'label'=>'Nivel de Curso:',
                                'onChange'=>'changeView(this.value);'));

		//echo $form->select('tipo',$options, null, null, false);
//		echo $form->input('modulo', array('label' => 'Areas académicas a las que pertenece el curso', 'type' => 'select', 'multiple' => true ));
		echo '<div class="beforecheckbox">'.$form->input('Modulo', array('label' => 'Modulos del curso','div' => array('id' =>  'CursoModulos'), 'type' => 'select', 'multiple' => 'checkbox')).'</div>';
		echo '<div class="beforecheckbox">'.$form->input('Relacionado', array('label' => 'Cursos Relacionados','div' => array('id' =>  'CursoRelacionados'), 'type' => 'select', 'multiple' => 'checkbox')).'</div>';
		echo '<div class="beforecheckbox">'.$form->input('nombre', array('label' => 'Nombre')).'</div>';
		echo $form->input('tipo_curso_id', array('label' => 'Tipo de Curso','div' => array('id' =>  'CursoTipoCurso')));
		echo $form->input('horas', array('label' => 'Horas', 'div' => array('id' =>  'Horas')));
		
		echo '<div style="overflow:hidden;" id="CursoInstructorP"><div style="float:left">'.$form->input('instructor_id', array('label' => 'Instructor','div' => array('id' =>  'CursoInstructor'))).'</div>';

		if (count($instructores) == 0)
		{
			echo '<script>var instructores = 0;</script>';
			echo '<div class="empty">'.$html->link('Agregar Instructor', array('controller' => 'usuarios', 'action' => 'add')).'</div>';
		}

		echo '</div>';
		echo '<div style="overflow:hidden;" id="CursoVendedorP"><div style="float:left">'.$form->input('vendedor_id', array('label' => 'Vendedor','div' => array('id' =>  'CursoVendedor'))).'</div>';

		if (count($vendedores) == 0)
		{
			echo '<script>var vendedores = 0;</script>';
			echo '<div class="empty">'.$html->link('Agregar Vendedor', array('controller' => 'usuarios', 'action' => 'add')).'</div>';
		}

		echo '</div>';
		
		echo $form->input('precio', array('label' => 'Precio'));

		$options2 = array('1'=>'Pesos','2'=>'Dólares');

        echo $form->input('moneda',
			array('type'=>'select',
				'options'=>$options2,
				'label'=>'Moneda:'));

		//if ($nivel == 'modulo') {
		  //  echo $form->label('VentaSoloGrupo', 'Venta solo en grupo');
		   // echo $form->checkbox('venta_solo_grupo');
	    //} else {
	    //    echo $form->hidden('venta_solo_grupo', array('default' => '0'));
	    //}

		if($rol_id != 1) // Administrador
		{
			echo $form->input('objetivo', array('label' => 'Objetivo'));
			echo $form->input('descripcion_general', array('label' => 'Descripcion General'));
			echo $form->input('beneficio', array('label' => 'Beneficio'));
			echo $form->input('perfil', array('label' => 'Perfil'));
		}

		////if($instructor == 1) // Instructor
		////{
			echo '<div id="temarios_all"><label>Temario</label><div style="margin-left:40px">';
			echo '<div id="temarios"></div>';
			echo '</div>';
			echo '<a href="javascript:agregarTemario();">+ Agregar Temario</a><br><br><br></div>';
		////}		

        echo $form->input('Archivo.file', array('type' => 'file', 'label' => 'Imagen para logo del curso'));
        
		echo '<div id="fechas1"></div>';
		//echo '</div>';
		echo '<div id="fechasa"><a href="javascript:agregarFechas();">+ Agregar Imparticion</a></div>';

		echo '<div style="overflow:hidden;"><div style="float:left">'.$form->input('ciudad_id', array('label' => 'Ciudad')).'</div>';

		if (count($ciudades) == 0)
		{
			echo '<script>var instructores = 0;</script>';
			echo '<div class="empty">'.$html->link('Agregar Ciudad', array('controller' => 'ciudades', 'action' => 'add')).'</div>';
		}

		echo '</div>';

		if($rol_id == 5) // Asistente de Ventas
		{
			echo $form->input('campus', array('label' => 'Campus'));
			echo $form->input('edificio', array('label' => 'Edificio'));
			echo $form->input('salon', array('label' => 'Salón'));
			echo $form->input('detalle_salon', array('label' => 'Detalle de la ubicación del salón', 'rows' => '3', 'cols' => '30'));
		}
		if (count($areas) > 0)
			echo '<div class="beforecheckbox">'.$form->input('Area', array('type' => 'select', 'multiple' => 'checkbox', 'label' => 'Areas académicas a las que pertenece el curso')).'</div>';
		else
		{
			echo 'Areas académicas a las que pertenece el curso:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No existen áreas academicas.<br><br>';
		}
		/*if($instructor == 1) // Instructor
		{
			echo '<label>Archivos</label><br>';
			echo '<div id="post"></div>';
	
	
		?>
	
	      <input type="file" name="data[Adjunto][1]" id="attach"
	      onchange="setBlock();" />
	      <div id="moreUploads"></div>
	      <div id="moreLink">
	      <a href="javascript:addFileInput();">Agregar otro Archivo</a>
	      </div>
		<br><br> 
		
	 } */ ?>
</fieldset>
<script>
changeView('1'); // Modulo
</script>

<?php //echo $form->end('Añadir');
echo $form->submit('guardar.png'); ?>
</div>