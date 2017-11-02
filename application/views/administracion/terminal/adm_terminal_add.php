<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_terminal')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_terminal/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="cont">
				<h2>Agregar Terminal</h2>
				<hr>
				<?php if(validation_errors()== TRUE){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.validation_errors().'</div>'; }?>
				<form action="<?= site_url("adm_terminal/agregar") ?>" method="post">
					<div class="form-group">
						<label for="nombre">Nombre de la terminal:</label>
						<input type="text" class="form-control" name="nombre" id="nombre">
					</div>
					<div class="form-group">
					<label for="nombre">Departamento:</label>
						<select class="form-control" name="dep">
							<?php 
							foreach($departamentos as $r) {
						echo "<option value=".$r->idDepartamentos.">".$r->nombre."</option>";
							}
							?>
						</select>
					</div>					
					<button type="submit" name="submit" class="btn btn-success">Registrar Terminal</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>