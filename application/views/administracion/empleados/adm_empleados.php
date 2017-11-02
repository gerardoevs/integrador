<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_empleados')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_empleados/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_empleados/update')?>">Modificar  <span class="glyphicon glyphicon-edit"></span></a></li>
				<li class="login-btn-a"><a class="login-btn" href="<?= site_url('login/logout')?> ">imprimir</a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="cont">
				<h2>Listado de Empleados</h2>
				<?php if(isset($success)){echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$success.'</p></div>';} ?>
				<?php if(isset($error)){echo '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$error.'</p></div>';} ?>
				<table class="table">
					<thead class="thead-inverse">
						<?php
						$i = 1;
						echo "<th>Nombre</th>";
						echo "<th>Apellido</th>";
						echo "<th>Telefono</th>";
						echo "<th>Direccion</th>";
					echo "</thead>";
					foreach($records as $r) {
					echo "<tr>";
						echo "<td>".$r->nombre."</td>";
						echo "<td>".$r->apellido."</td>";
						echo "<td>".$r->telefono."</td>";
						echo "<td>".$r->direccion."</td>";
						echo "<tr>";
									}
							?>
						</table>
					</div>
				</div>
				
			</div>
		</div>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>