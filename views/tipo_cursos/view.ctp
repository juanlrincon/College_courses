<div class="tipoCursos view">
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Tipo de Curso</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tipoCurso['TipoCurso']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>>Imagen</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		    <?php
		    if (isset($tipoCurso['TipoCurso']['name']) && !empty($tipoCurso['TipoCurso']['name']))
		    {
            	echo $tipoCurso['TipoCurso']['name'].'<br />';
            	
            	echo '<img src="'.$this->base.'/files/tipocursos/'.$tipoCurso['TipoCurso']['name'].'" border="0" width="200"><br />';
            	//echo $fileUpload->image($tipoCurso['TipoCurso']['name'], array('uploadDir' => 'files'.DS.'tipocursos', 'width' => 100));
            } else {
                echo '&lt;Sin imagen asignada&gt;';
            }
             ?>
			&nbsp;
		</dd>
	</dl>
</div>
