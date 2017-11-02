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
				<table class="table">
					<thead class="thead-inverse">
						<?php
						$i = 1;
						echo "<th>ID</th>";
						echo "<th>Marca</th>";
						echo "<th>Placa</th>";
						echo "<th>Capacidad</th>";
						echo "<th>Año</th>";
						echo "<th>Tipo</th>";
						echo "<th>Numero de Tarjeta</th>";
					echo "</thead>";
					foreach($records as $r) {
					echo "<tr>";
						echo "<td>".$r->id."</td>";
						echo "<td>".$r->marca."</td>";
						echo "<td>".$r->placa."</td>";
						echo "<td>".$r->capacidad."</td>";
						echo "<td>".$r->year."</td>";
						echo "<td>".$r->tipo."</td>";
						echo "<td>".$r->num_tarjeta."</td>";
						echo "<tr>";
							}
							?>
						</table>
					</div>
				</div>
				
			</div>
		</div>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>