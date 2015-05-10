<?php
$text_length1 = 240;
$text_length2 = 160

?>
	<div id="banners">
		<div id="shadow-container">
			<div class="shadow1">
				<div class="shadow2">
					<div class="shadow3">
						<div class="container">
							<img src="<?php echo $this->base; ?>/img/banner4.jpg" border="0" width="100%">
						</div>
					</div>
				</div>
		</div>
	</div>


	<!-- 
		<div id="shadow-container">
			<div class="shadow1">
				<div class="shadow2">
					<div class="shadow3">
						<div class="container">
							<img src="<?php echo $this->base; ?>/img/banner2.jpg" border="0" width="100%">
						</div>
					</div>
				</div>
		</div>
	</div>
		<div id="shadow-container3">
			<div class="shadow1">
				<div class="shadow2">
					<div class="shadow3">
						<div class="container">
							<img src="<?php echo $this->base; ?>/img/banner3.jpg" border="0" width="100%">
						</div>
					</div>
				</div>
		</div>
	</div>
	-->
	</div>
<!-- 
		<div id="banners">
			<div id="shadow-container">
			<div id="shadow1"><div id="bannersdiv"><img src="<?php echo $this->base; ?>/img/banner1.jpg" border="0" width="100%"></div></div></div>
			<div id="bannersdiv"><img src="<?php echo $this->base; ?>/img/banner2.jpg" border="0" width="100%"></div>
			<div id="last-banner"><img src="<?php echo $this->base; ?>/img/banner3.jpg" border="0" width="100%"></div>
		</div>
-->
				<?php
				$col1 = '';
				$col2 = '';
				foreach($contenido_rand as $key => $value)
				{
					if ($key % 2 == 0)
					{
						$col1 .= '<div class="cold1">
							<div class="coldimgh"><div class="coldimg">';
							if ($value['Contenido']['imagen_logo'] != '')
							{
								$col1 .= '<img src="'.$this->base.'/files/contenidos/'.$value['Contenido']['imagen_logo'].'" border="0" width="100%" height="100%">';
							}
							else
							{
								$col1 .= '<img src="'.$this->base.'/img/rand'.rand(1,6).'.jpg" border="0" width="100%" height="100%">';
							}
						$col1 .= '</div></div>
							
							<div class="desc1">
								<span class="coldtitulo">';
						if ($value['Contenido']['id'] == 5)
						{
							$col1 .= $html->link($value['Contenido']['nombre'], array('controller' => 'cursos', 'action' => 'modulos'));
						}
						else
						{
							$col1 .= $html->link($value['Contenido']['nombre'], array('controller' => 'cursos', 'action' => 'index', $value['Contenido']['id']));
						}
						
						$col1 .= '</span>
								<p>'.substr($value['Contenido']['descripcion_general'],0,$text_length1).(strlen($value['Contenido']['descripcion_general']) > $text_length1?'...':'').'</p>
							</div>
						</div>';
					}
					else
					{
						$col2 .= '<div class="cold2">
							<div class="coldimgh"><div class="coldimg">';
							if ($value['Contenido']['imagen_logo'] != '')
							{
								$col2 .= '<img src="'.$this->base.'/files/contenidos/'.$value['Contenido']['imagen_logo'].'" border="0" width="100%" height="100%">';
							}
							else
							{
								$col2 .= '<img src="'.$this->base.'/img/rand'.rand(1,6).'.jpg" border="0" width="100%" height="100%">';
							}
						$col2 .= '</div></div>

							<div class="desc2">
							
								<span class="coldtitulo">';
						if ($value['Contenido']['id'] == 5)
						{
							$col2 .= $html->link($value['Contenido']['nombre'], array('controller' => 'cursos', 'action' => 'modulos'));
						}
						else
						{
							$col2 .= $html->link($value['Contenido']['nombre'], array('controller' => 'cursos', 'action' => 'index', $value['Contenido']['id']));
						}
						
						$col2 .= '</span>

								<p>'.substr($value['Contenido']['descripcion_general'],0,$text_length2).(strlen($value['Contenido']['descripcion_general']) > $text_length2?'...':'').'</p>
							</div>
						</div>';
					}
				}
				?>
		<div id="columnas">
			<div id="col1">
				<?php echo $col1; ?>
<!-- 				<div id="mas">
					<a href="#">Ver mas cursos... </a>
				</div>  -->
				
				<!-- <div style="margin-top: 40px;">
					<div id="titulo">Banner Tec</div>
					<img src="<?php echo $this->base; ?>/img/linea.png">
					<div style="margin-top: 5px; width: 370px; height: 112px; background-color:#bbb;"><img src="<?php echo $this->base; ?>/img/abajo.jpg" border="0" width="100%" height="100%"></div>
				</div> -->
				
			</div>
			
			<div id="col2">
					<?php echo $col2; ?>
				
				<!--  <div id="mas">
					<a href="#">Ver mas noticias... </a>
				</div> -->
				
			</div>

			<div id="col3">
							<div id="searchBK">
								<div id="titulo_search">Buscar:</div>
		            <div id="buscar"><?php echo $form->create('Curso', array('action' => 'search')); ?>
							<input name="data[Curso][search_text]" type="text" value="" id="CursoSearchText" />
							<input style="float:right;position:absolute;cursor:hand;width:20px;" type="image" src="<?php echo $this->base; ?>/img/go.png" />
						</form>
		            </div>
	            </div>
				<div id="login">
					<div id="acceso">acceso a portal</div>
					<form id="UsuarioLoginForm" method="post" action="<?php echo $this->base; ?>/usuarios/login">
						<input type="hidden" name="_method" value="POST" />
						<div id="forma">
							<input name="data[Usuario][nombre_usuario]" type="text" value="" id="UsuarioNombreUsuario" maxlength="26"/>
						</div>
						<div id="forma2">
							<input type="password" name="data[Usuario][password]" value="" id="UsuarioPassword"  maxlength="30"/>
						</div>
						<input style="margin-left: 13px; margin-bottom: 0px; margin-top: 0px;" type="submit" value="Login" />
					</form>

					<div id="login_texto" style="padding-top: 15px;">
					Acceso exlusivo para empleados, maestros y colaboradores del sistema tecnologico de monterrey.
					</div>
				
				</div>
				<!-- <div id="titulo">registro</div>
				<img src="<?php echo $this->base; ?>/img/linea.png">
				
				<div id="registro">
					<form>
						Nombre<br />
						<div id="rinput"><input type="text" name="nombre" /></div>
						Correo Electronico<br />
						<div id="rinput"><input type="text" name="correo" /></div>
					</form>
					<div id="registrar"><a href="#"><img src="<?php echo $this->base; ?>/img/registrar.png" / ></a></div>
				</div>
				-->
				
			</div><!-- termina columna tres -->
			
		</div> <!-- termina columnas -->