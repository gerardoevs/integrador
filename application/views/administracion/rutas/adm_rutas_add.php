<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_rutas')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_rutas/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="cont">
				<h2>Agregar Ruta</h2>
				<hr>
				<?php if(isset($error)){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$error.'</p></div>';} ?>
				<form action="<?= site_url("adm_rutas/agregar") ?>" method="post">
					<div class="form-group">
						<label for="num_ruta">Numero de ruta:</label>
						<input type="text" class="form-control" name="num_ruta" id="num_ruta">
					</div>
					<div class="form-group">
					<label>Terminal de Origen:</label>
						<select class="form-control" name="Origen">
							<option value="none">Elija una opción</option>
							<?php 
							foreach($terminales as $r) {
						echo "<option value='$r->terminalnombre'>".$r->terminalnombre."</option>";
							}
							?>

						</select>
					</div>
					<div class="form-group">
					<label>Terminal de Destino:</label>
						<select class="form-control" name="Destino">
						<option value="none">Elija una opción</option>
							<?php 
							foreach($terminales as $r) {
						echo "<option value='$r->terminalnombre'>".$r->terminalnombre."</option>";
							}
							?>
						</select>
					</div>		
					<button type="submit" name="submit" class="btn btn-success">Registrar Ruta</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>