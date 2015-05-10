<?php echo $javascript->link(array('jquery_min', 'jquery-ui.min'), false); ?>
 <script>
  $(document).ready(function() {
    $("#accordion").accordion({ collapsible: true, autoHeight: false,  active: false});
  });

  </script>

<?php 

//print_r($curso);

?>
				<div id="diplomado">
					<div id="dcol1">
						<div id="dtitulo"><?php echo $curso['TipoCurso']['nombre']; ?></div>
						<div id="dtitulo2"><?php echo $curso['Curso']['nombre']; ?></div>
					</div>
					<div id="dcol2">
						<div id="dfecha"><!--  nota poner fecha aqui --></div>
						<div id="dlugar">
							Campus <?php echo $curso['Curso']['campus']; ?><br>
							<?php echo $curso['Ciudad']['nombre']; ?>
							<?php //echo $curso['Ciudad']['nombre'].','.$curso['Pais']['nombre']; ?>
						</div>
						<!-- <div id="dcosto">COSTO DE CURSO: <span class="blanco">$<?php echo $curso['Curso']['precio']; ?></span></div>  -->
					</div>
				</div>
				<div id="diplomacol1">
					<div class="dcontenido3">
						<span class="azul">objetivo</span>
						<div style="margin-top: 12px; margin-bottom: 10px;">
							<img src="<?php echo $this->base; ?>/img/lineacorta.png" alt="linea" />
						</div>
						<p><?php echo nl2br($curso['Curso']['objetivo']); ?></p>
					</div>
					<div class="dcontenido3">
						<span class="azul">
						<?php 
						if ($curso['Curso']['descripcion_general'] == '')
							echo 'Perfil</p>';
						else
							echo 'Descripcion General</p>';
						?>
						</span>
						<div style="margin-top: 12px; margin-bottom: 10px;">
							<img src="<?php echo $this->base; ?>/img/lineacorta.png" alt="linea" />
						</div>
						<p><?php
							echo nl2br($curso['Curso']['descripcion_general']); ?></p>
						
						
						<?php 
						if ($curso['Curso']['descripcion_general'] != '')
						{
							echo '<div class="perfil"><strong>Perfil:</strong>';
						}
						else
						{
							echo '<div>';
						}
						echo nl2br($curso['Curso']['perfil']);
						?>
						</div>
					</div>
					<div class="dcontenido3">
						<span class="azul">beneficio</span>
						<div style="margin-top: 12px; margin-bottom: 10px;">
							<img src="<?php echo $this->base; ?>/img/lineacorta.png" alt="linea" />
						</div>
						<p><?php echo nl2br($curso['Curso']['beneficio']); ?></p>
					</div>
					<div class="dcontenido4">
						<span class="azul">Más Información</span>
						<div style="margin-top: 12px; margin-bottom: 10px;">
							<img src="<?php echo $this->base; ?>/img/lineacorta.png" alt="linea" />
						</div>
						<p><?php
						if ($curso['Vendedor']['nombres'])
						{
							echo nl2br($curso['Vendedor']['nombres'].' '.$curso['Vendedor']['apellido_paterno'].' '.$curso['Vendedor']['apellido_materno']).'<br>';
							echo 'Correo Electrónico: '.$curso['Vendedor']['correo_electronico'].'<br>';
							echo 'Teléfono: '.$curso['Vendedor']['telefono'].'<br>';
							echo 'Ext: '.$curso['Vendedor']['extension'];
						}
						/* else
						{
							echo '<br>';
							echo 'Correo Electrónico: <br>';
							echo 'Teléfono: +52 (81) 8358-2000<br>';
							echo 'Ext: ';
						} */
						?></p>
					</div>
					<div class="dcontenido4">
						<span class="azul">Fechas</span>
						<div style="margin-top: 12px; margin-bottom: 10px;">
							<img src="<?php echo $this->base; ?>/img/lineacorta.png" alt="linea" />
						</div>
						<p><?php
								foreach ($curso['FechasCurso'] as $key => $value)
								{
									if ($value['fecha_inicio'] < date("Y-m-d"))
										continue;
					
									$arr['FI'][$key] = strtotime($value['fecha_inicio']);
									$arr['FF'][strtotime($value['fecha_inicio'])] = strtotime($value['fecha_fin']);
								}
								echo 'Fecha de Inicio: ';
								echo $time->format2(date("Y-m-d",min($arr['FI'])));
								echo '<br> Fecha de Finalizacion: ';
								echo $time->format2(date("Y-m-d",$arr['FF'][min($arr['FI'])]));
						?></p>
					</div>
				</div>
				<div id="diplomacol2">
					<div id="dmodulos">
						<span class="azul">Modulos</span>
						<div style="margin-top: 13px;">
						</div>
<div id="accordion">
						<?php
						$tiempo = 0;

						foreach($curso['Modulo'] as $key => $value)
						{
							//echo $key.'<br>';
							$tiempo = $tiempo + $value['horas'];
							//print_r($value);
							echo '<h3><img src="'.$this->base.'/img/linealarga.png" border="0" alt="linea"><a href="#"><div class="modulo">'.$value['nombre'].'</div></a></h3>';
						echo '<div>
								   <div class="moduloleft">';
									//echo htmlentities($value['instructor_id']).'<br>';
									echo '<div class="mcontenido">
											<span class="azul">beneficio</span>
											<div style="margin-top: 12px; margin-bottom: 10px;">
												<img src="'.$this->base.'/img/lineacorta.png" alt="linea"/>
											</div>
											<p>'.nl2br($value['beneficio']).'</p>
									 	  </div>
									      <div class="mcontenido">
											<span class="azul">objetivo</span>
											<div style="margin-top: 12px; margin-bottom: 10px;">
												<img src="'.$this->base.'/img/lineacorta.png" alt="linea"/>
											</div>
											<p>'.nl2br($value['objetivo']).'</p>
										  </div>';
									/*
										  <div class="mcontenido">
											<span class="azul">Instructor</span>
											<div style="margin-top: 12px; margin-bottom: 10px;">
												<img src="'.$this->base.'/img/lineacorta.png" />
											</div>
											<p>'.$value['Instructor']['nombres'].' '.$value['Instructor']['apellido_paterno'].' '.$value['Instructor']['apellido_materno'].'
											<br>Correo: '.$value['Instructor']['correo_electronico'].'<br>';
											if ($value['Instructor']['telefono'] != '')
											{
												echo 'TEL: '.$value['Instructor']['telefono'].' '.$value['Instructor']['extension'].'<br>';
											}
											echo '</p>
										  </div>';
										  */
									if ($logeado == 1)
									{
										echo '
										  <div class="mcontenido">
											<span class="azul">Archivos Adjuntos</span>
											<div style="margin-top: 12px; margin-bottom: 10px;">
												<img src="'.$this->base.'/img/lineacorta.png" alt="linea"/>
											</div>';

											 foreach($value['Adjunto'] as $key2 => $value2)
											 {
//												echo '<a href="javascript:window.open(\''.FILES_DIR.$value2['name'].'\');">'.$value2['name'].'</a>';
//echo '<a style="cursor:pointer;" onclick="javascript:window.open(\''.$this->base.'/download.php?filename='.$value2['name'].'\');">'.$value2['name'].'</a>';
												echo $html->link($value2['name'], array('action' => 'download', $value2['name']));
											 }
											 echo '</div>';
									}

								  echo '</div>
								  <div class="temarioright">
									<span class="azul">Temario</span>
										<div style="margin-top: 12px; margin-bottom: 10px;">
											<img src="'.$this->base.'/img/lineacorta.png" alt="linea" />
										</div>
										<div class="temario">
										<p>';

								  		foreach($value['Temario'] as $key3 => $value3)
										{
											echo $value3['titulo'];
											//echo '<br>';
											echo nl2br($value3['temas']);
										}
		
								echo '</p></div>
								  </div>';

							echo '</div>';
						}
						?></div>
	<img src="<?php echo $this->base; ?>/img/linealarga.png" border="0" alt="linea">
					</div>	
					<div class="dcontenido3" style="margin-left:40px;">
						<span class="azul">Duración del curso</span>
						<div style="margin-top: 12px; margin-bottom: 10px;">
							<img src="<?php echo $this->base; ?>/img/lineacorta.png" alt="linea" />
						</div>
						<p><?php echo $tiempo; ?> horas</p>
					</div>

			</div>