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
					<div id="dcontenido">
						<span class="azul">descripcion general</span>
						<div style="margin-top: 12px; margin-bottom: 10px;">
							<img src="img/lineacorta.png" />
						</div>
						<p><?php echo nl2br(htmlentities($curso['Curso']['descripcion_general'])); ?></p>
						<div class="perfil">
						<strong>Perfil:</strong> <?php echo nl2br($curso['Curso']['perfil']); ?>
						</div>
					</div>
					<div id="dcontenido">
						<span class="azul">beneficio</span>
						<div style="margin-top: 12px; margin-bottom: 10px;">
							<img src="<?php echo $this->base; ?>/img/lineacorta.png" />
						</div>
						<p><?php echo nl2br(htmlentities($curso['Curso']['beneficio'])); ?></p>
					</div>
					<div id="dcontenido">
						<span class="azul">objetivo</span>
						<div style="margin-top: 12px; margin-bottom: 10px;">
							<img src="<?php echo $this->base; ?>/img/lineacorta.png" />
						</div>
						<p><?php echo nl2br(htmlentities($curso['Curso']['objetivo'])); ?></p>
					</div>
				</div>
				<div id="diplomacol2">
					<div id="dmodulos">
						<span class="azul">Modulos</span>
						<div style="margin-top: 13px;">
						</div>
<div id="accordion">
						<?php 
						foreach($curso['Modulo'] as $key => $value)
						{
							echo '<h3><img src="'.$this->base.'/img/linealarga.png" border="0"><a href="#"><div class="modulo">'.$value['nombre'].'</div></a></h3>';
						echo '<div>
								   <div id="moduloleft">';
									//echo htmlentities($value['instructor_id']).'<br>';
									echo '<div id="dcontenido">
											<span class="azul">beneficio</span>
											<div style="margin-top: 12px; margin-bottom: 10px;">
												<img src="'.$this->base.'/img/lineacorta.png" />
											</div>
											<p>'.nl2br(htmlentities($value['beneficio'])).'</p>
									 	  </div>
									      <div id="dcontenido">
											<span class="azul">objetivo</span>
											<div style="margin-top: 12px; margin-bottom: 10px;">
												<img src="'.$this->base.'/img/lineacorta.png" />
											</div>
											<p>'.nl2br(htmlentities($value['objetivo'])).'</p>
										  </div>
										  <div id="dcontenido">
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
										  </div>
								  </div>
								  <div id="temarioright">
									<span class="azul">Temario</span>
										<div style="margin-top: 12px; margin-bottom: 10px;">
											<img src="'.$this->base.'/img/lineacorta.png" />
										</div>
										<p>';
								
										foreach($value['Temario'] as $key2 => $value2)
										{
											echo $value2['titulo'];
											echo '<br>';
											echo nl2br(htmlentities($value2['temas']));
										}
		
								echo '</p>
								  </div>';

							echo '</div>';
						}
							echo '<img src="'.$this->base.'/img/linealarga.png" border="0">';
						?></div>

					</div>
				</div>
				<div style="overflow: hidden;">
					<div id="dcontenedor">
							<div id="dcontenido">
								<span class="azul">Programas Relacionados</span>
								<div style="margin-top: 12px; margin-bottom: 10px;">
									<img src="<?php echo $this->base; ?>/img/lineacorta.png" />
								</div>
								<p><?php
										foreach($curso['Relacionado'] as $key3 => $value3)
										{
											echo nl2br(htmlentities($value3['nombre'])).'<br>';
										}
								 ?></p>
							</div>
							  <div id="dcontenido">
								<span class="azul">Contacto</span>
								<div style="margin-top: 12px; margin-bottom: 10px;">
									<img src="'.$this->base.'/img/lineacorta.png" />
								</div>
								<p><?php echo $curso['Vendedor']['nombres'].' '.$curso['Vendedor']['apellido_paterno'].' '.$curso['Vendedor']['apellido_materno'].'
								<br>Correo: '.$curso['Vendedor']['correo_electronico'].'<br>';
								if ($curso['Vendedor']['telefono'] != '')
								{
									echo 'TEL: '.$curso['Vendedor']['telefono'].' '.$curso['Vendedor']['extension'].'<br>';
								}
								echo '</p>'; ?>
							  </div>
					</div>
				</div>
			</div>