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
				<h2>Agregar unidades</h2>
				<hr>
				<?php if(validation_errors()== TRUE){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.validation_errors().'</div>'; }?>
				<?php if(isset($error)){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$error.'</p></div>';} ?>
				<form action="<?= site_url("adm_unidades/agregarUnidad") ?>" method="post">
					<div class="form-group">
						<label for="marca">Marca:</label>
						<input type="text" class="form-control" name="marca" id="nombre">
					</div>
					<div class="form-group">
						<label for="placa">Placa:</label>
						<input type="text" class="form-control" name="placa" id="apellido">
					</div>
					<div class="form-group">
						<label for="capacidad">capacidad:</label>
						<input type="number" class="form-control" name="capacidad" id="edad">
					</div>
					<div class="form-group">
						<label for="año">año:</label>
						<input type="number" class="form-control" name="año" id="dir">
					</div>
					<div class="form-group">
						<label for="tipo">Tipo:</label>
						<input type="text" class="form-control" name="tipo" id="dui">
					</div>
					<div class="form-group">
						<label for="num_tarjeta">Numero de tarjeta de circulacion:</label>
						<input type="text" class="form-control" name="num_tarjeta" id="nit">
					</div>

					<button type="submit" name="submit" class="btn btn-success">Registrar Unidad</button>
				</form>
			</div>
		</div>
		
	</div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>