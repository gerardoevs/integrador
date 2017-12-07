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
				<h2>Listado de unidades</h2>
				<hr>
				<?php if(isset($mensaje)){echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$mensaje.'</p></div>';} ?>
				<?php if(isset($error)){echo '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$error.'</p></div>';} ?>


				<div class="tab-menu">
					<a data-toggle="tab" href="#home" class="a-asignacion">Unidades en funcionamiento</a>
					<a data-toggle="tab" href="#menu1" class="a-asignacion">Unidades en mantenimiento</a>
				</div>
				
				
				<div class="tab-content">
					<div id="home" class="tab-pane fade in active">
						<table class="table">
							<thead class="thead-inverse">
								<?php
								echo "<th>Marca</th>";
								echo "<th>Placa</th>";
								echo "<th>Capacidad</th>";
								echo "<th>Año</th>";
								echo "<th>Tipo</th>";
								echo "<th>Numero de Tarjeta</th>";
								echo "<th>Poner en Mantenimiento</th>";
							echo "</thead>";
							$k=0;
							foreach($funcionales as $r) {
							$k++;
							echo "<tr>";
								echo "<td>".$r->marca."</td>";
								echo "<td>".$r->placa."</td>";
								echo "<td>".$r->capacidad."</td>";
								echo "<td>".$r->year."</td>";
								echo "<td>".$r->tipo."</td>";
								echo "<td>".$r->num_tarjeta."</td>";
								echo "<td><button class='btn btn-warning btn-xs' role='button' data-toggle='modal' data-target='#myModal".$k."'><span class='glyphicon glyphicon-wrench'></span></a></td>";
								echo '<div class="modal fade" id="myModal'.$k.'" role="dialog">
								    <div class="modal-dialog">
								    
								      <!-- Modal content-->
								      <div class="modal-content">
								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal">&times;</button>
								          <h4 class="modal-title">¿Poner en mantenimiento esta unidad?</h4>
								        </div>
								        <div class="modal-body">
								        	'."<a href = '".site_url("adm_unidades/ponerMantenimiento/")
								.$r->id."' class='btn btn-success'>Aceptar</a>"."   "."<a href = '".site_url("adm_unidades/update")."' class='btn btn-default'>Cancelar</a>".'
								        </div>
								      </div>
								    </div>';
								echo "<tr>";
									}
									?>
						</table>	
					</div>

					<div id="menu1" class="tab-pane fade">
						<table class="table">
							<thead class="thead-inverse">
								<?php
								
							if (empty($mantenimiento) == false) {
								echo "<th>Marca</th>";
								echo "<th>Placa</th>";
								echo "<th>Capacidad</th>";
								echo "<th>Año</th>";
								echo "<th>Tipo</th>";
								echo "<th>Numero de Tarjeta</th>";
								echo "<th>Quitar de Mantenimiento</th>";
							echo "</thead>";
							$j=0;
								foreach($mantenimiento as $r) {
								echo "<tr>";
								echo "<td>".$r->marca."</td>";
								echo "<td>".$r->placa."</td>";
								echo "<td>".$r->capacidad."</td>";
								echo "<td>".$r->year."</td>";
								echo "<td>".$r->tipo."</td>";
								echo "<td>".$r->num_tarjeta."</td>";
								echo "<td><button class='btn btn-warning btn-xs' role='button' data-toggle='modal' data-target='#myModal".$j."'><span class='glyphicon glyphicon-wrench'></span></a></td>";
								echo '<div class="modal fade" id="myModal'.$j.'" role="dialog">
								    <div class="modal-dialog">
								    
								      <!-- Modal content-->
								      <div class="modal-content">
								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal">&times;</button>
								          <h4 class="modal-title">¿Quitar de mantenimiento esta unidad?</h4>
								        </div>
								        <div class="modal-body">
								        	'."<a href = '".site_url("adm_unidades/quitarMantenimiento/")
								.$r->id."' class='btn btn-success'>Aceptar</a>"."   "."<a href = '".site_url("adm_unidades/update")."' class='btn btn-default'>Cancelar</a>".'
								        </div>
								      </div>
								    </div>';
								echo "<tr>";
									}
							}else{
								echo '<div class="alert alert-success fade in"><p>No hay Unidades en  mantenimiento</p></div>';
							}
							?>
						</table>
					</div>
				</div>


						
					</div>
				</div>
				
			</div>
		</div>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>