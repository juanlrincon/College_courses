				<div id="diplomado">
					
					<div id="scol1">
						<div id="dtitulo"><?php echo $seccion['Seccion']['seccion']; ?></div>
					</div>
				</div>
				
				<div id="seccion_izquierda">
					
					<div id="scontenido">
						<span class="azul"><?php echo $seccion['Seccion']['titulo1']; ?></span>
						<div style="margin-top: 12px; margin-bottom: 10px;">
							<img src="<?php echo $this->base; ?>/img/lineacorta.png" />
						</div>
						<p><?php echo nl2br($seccion['Seccion']['descripcion1']); ?></p>
						<div class="perfil">
						<?php if($seccion['Seccion']['nota1'] != '') { ?>
						<strong>Nota:</strong> <?php echo nl2br($seccion['Seccion']['nota1']);
						} ?>
						</div>
					</div>
				</div>
				
				<div id="seccion_derecha">

					<div id="scontenido">
						<span class="azul"><?php echo $seccion['Seccion']['titulo2']; ?></span>
						<div style="margin-top: 12px; margin-bottom: 10px;">
							<img src="<?php echo $this->base; ?>/img/lineacorta.png" />
						</div>
						<p><?php echo nl2br($seccion['Seccion']['descripcion2']); ?></p>
						<div class="perfil">
						<?php if($seccion['Seccion']['nota2'] != '') { ?>
						<strong>Nota:</strong> <?php echo nl2br($seccion['Seccion']['nota2']);
						} ?>
						</div>
					</div>
				</div>
