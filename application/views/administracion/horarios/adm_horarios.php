<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_horarios')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_horarios/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_horarios/update')?>">Modificar  <span class="glyphicon glyphicon-edit"></span></a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="cont">
				<h2>Horario de rutas</h2>
				<hr>
				<?php if(isset($mensaje)){echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$mensaje.'</p></div>';} ?>
				<?php if(isset($error)){echo '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$error.'</p></div>';} ?>

				<table class="table">
				<thead class="thead-inverse">
				<?php
					echo "<th>Salida</th>";
					echo "<th>Llegada</th>";
					echo "<th>Ruta</th>";
					echo "<th>ID Unidad</th>";
				echo "</thead>";
				foreach($horarios as $r) {
					$query = $this->db->query("SELECT num_ruta FROM ruta WHERE id = $r->idRuta");
		        	$resultado = $query->result();
		        	$query = $this->db->query("SELECT id FROM unidades WHERE id = $r->idUnidad");
		        	$unidades = $query->result();
					echo "<tr>";
						echo "<td>".$r->horaSalida."</td>";
						echo "<td>".$r->horaLlegada."</td>";
						echo "<td>".$resultado[0]->num_ruta."</td>";
						echo "<td>".$unidades[0]->id."</td>";
						echo "<tr>";
				}
				?>
	

			</div>	
		</div>
	</div>
