<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_usuarios')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_usuarios/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="cont">
				<h2>Agregar Usuario</h2>
				<hr>
				<form action="<?= site_url("adm_usuarios/agregar") ?>" method="post">
					<div class="form-group">
						<label for="usr">Nombre de usuario:</label>
						<input type="text" class="form-control" name="usr" id="usr">
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" name="pwd" id="pwd">
					</div>
					<div class="form-group">
						<label for="pwd2">Repetir Password:</label>
						<input type="password" class="form-control" name="pwd2" id="pwd2">
					</div>
					<button type="submit" name="submit" class="btn btn-success">Registrar Usuario</button>
				</form>
			</div>
		</div>
		
	</div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>