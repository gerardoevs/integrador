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
				<h2>Agregar conductor</h2>
				<hr>
				<?php if(validation_errors()== TRUE){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.validation_errors().'</div>'; }?>
            	<?php if(isset($mensaje)){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$error.'</p></div>';} ?>
				<form action="<?= site_url("adm_empleados/agregar") ?>" method="post">
					<div class="form-group">
						<label for="nombre">Nombres:</label>
						<input type="text" class="form-control" name="nombre" id="nombre">
					</div>
					<div class="form-group">
						<label for="apellido">Apellidos:</label>
						<input type="text" class="form-control" name="apellido" id="apellido">
					</div>
					<div class="form-group">
						<label for="tel">Numero de Telefono:</label>
						<input type="text" class="form-control" name="tel" id="tel">
					</div>
					<div class="form-group">
						<label for="dir">Direccion de recidencia:</label>
						<input type="text" class="form-control" name="dir" id="dir">
					</div>
					<div class="form-group">
						<label for="fecha-expedicion">Fecha de expedicion de licencia de conducir:</label>
						<input type="date" class="form-control" name="fechaExpe"id="fecha-expedicion">
					</div>
					<div class="form-group">
						<label for="fecha-expiracion">Fecha de expiracion de licencia de conducir:</label>
						<input type="date" class="form-control" name="fechaExpira" id="fecha-expiracion">
					</div>
					<div class="form-group">
						<label for="tipo-licencia">Tipo de licencia:</label>
						<input type="text" class="form-control" name="tipoLicencia" id="tipo-licencia">
					</div>
					<button type="submit" name="submit" class="btn btn-success">Registrar Conductor</button>
				</form>
			</div>
		</div>
		
	</div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>