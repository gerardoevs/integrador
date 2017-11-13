<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_unidades')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_unidades/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_unidades/update')?>">Modificar  <span class="glyphicon glyphicon-edit"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_unidades/asignar')?>">Asignar   <span class="glyphicon glyphicon-paperclip"></span></a></li>
				<li class="login-btn-a"><a class="login-btn" href="<?= site_url('login/logout')?> ">imprimir</a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="cont">
				<h2>Asignar Unidades</h2>
				<hr>
				<?php if(isset($mensaje)){echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$mensaje.'</p></div>';} ?>
				<?php if(isset($error)){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$error.'</p></div>';} ?>
				<div class="tab-menu">
					<a data-toggle="tab" href="#home" class="a-asignacion">Conductores sin Asignar</a>
					<a data-toggle="tab" href="#menu1" class="a-asignacion">Conductores Asignados</a>
				</div>
				
				
				<div class="tab-content">
					<div id="home" class="tab-pane fade in active">
						<table class="table">
					<thead class="thead-inverse">
						<?php
						echo "<th>ID</th>";
						echo "<th>Placa</th>";
						echo "<th>Tipo</th>";
						echo "<th>Conductor</th>";
						echo "<th>Ruta</th>";
						echo "<th>Terminal</th>";
						echo "<th>Editar</th>";
					echo "</thead>";
					foreach($records as $r) {
					
					?><form action="<?= site_url('adm_unidades/asignacion') ?>" method="post"><tr><?php
						echo "<td><input type='text' name='idss' value=".$r->id." style='width:30px; text-align:center; background:white; border-style:none;' readonly='true'></td>";
						echo "<td>".$r->placa."</td>";
						echo "<td>".$r->tipo."</td>";
						echo '<td><div class="form-group">
						  <select class="form-control" name="condutor" id="sel1">
						  	';echo "<option value='none'>Seleccionar Conductor</option>";'
						    ';foreach($conductores as $c) {
						    	echo "<option value=".$c->id." >".$c->nombre."</option>";
						    }'
						  </select>
						</div></td>';
						echo '<td><div class="form-group">
						  <select class="form-control" name="nruta" id="sel1">
						  ';echo "<option value='none'>Seleccionar Ruta</option>";'
						    ';foreach($rutas as $d) {
						    	echo "<option value=".$d->id." >".$d->num_ruta."</option>";
						    }'
						  </select>
						</div></td>';
						echo '<td><div class="form-group">
						  <select class="form-control" name="nterminal" id="sel1">
						  '; echo "<option value='none'>Seleccionar Terminal</option>"; '
						    ';foreach($terminales as $e) {
						    	echo "<option value=".$e->id." >".$e->terminalnombre."</option>";
						    }'
						  </select>
						</div></td>';
						echo "<td>";
						echo "<input type='submit' name='enviar' value='Asignar' /></td>";
						echo '</tr></form>';
						}
						?>
						</table>	
					</div>

					<div id="menu1" class="tab-pane fade">
					<table class="table">
					<thead class="thead-inverse">
						<?php
						echo "<th>ID</th>";
						echo "<th>Placa</th>";
						echo "<th>Tipo</th>";
						echo "<th>Conductor</th>";
						echo "<th>Ruta</th>";
						echo "<th>Terminal</th>";
						echo "<th>Editar</th>";
					echo "</thead>";
					foreach($unidades as $r) {
					
					?><form action="<?= site_url('adm_unidades/reasignacion') ?>" method="post"><tr><?php
						echo "<td><input type='text' name='idss' value='$r->id' style='width:30px; text-align:center; background:white; border-style:none;' readonly='true'></td>";
						echo "<td>".$r->placa."</td>";
						echo "<td>".$r->tipo."</td>";
						echo '<td><div class="form-group">
						  <select class="form-control" name="condutor" id="sel1">
						  	';echo "<option value=".$r->idConductor.">".$r->nombre."</option>";'
						    ';foreach($conductores as $c) {
						    	echo "<option value=".$c->id." >".$c->nombre."</option>";
						    }'
						  </select>
						</div></td>';
						echo '<td><div class="form-group">
						  <select class="form-control" name="nruta" id="sel1">
						  ';echo "<option value=".$r->idRuta." >".$r->num_ruta."</option>";'
						    ';foreach($rutas as $d) {
						    	echo "<option value=".$d->id." >".$d->num_ruta."</option>";
						    }'
						  </select>
						</div></td>';
						echo '<td><div class="form-group">
						  <select class="form-control" name="nterminal" id="sel1">
						  '; echo "<option value=".$r->idTerminal.">". $r->terminalnombre ."</option>"; '
						    ';foreach($terminales as $e) {
						    	echo "<option value=".$e->id." >".$e->terminalnombre."</option>";
						    }'
						  </select>
						</div></td>';
						echo "<td>";
						echo "<input type='hidden' name='idconductor_quitar' value='".$r->idConductor."' />";
						echo "<input type='submit' name='submit' value='editar' /></td>";
						'</form>';
						}
						?>
						</table>	
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
				