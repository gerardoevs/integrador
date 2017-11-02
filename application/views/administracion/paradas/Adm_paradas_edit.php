<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_paradas')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_paradas/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="cont">
				<h2>Modificar Parada</h2>
				<hr>
				<?php if(isset($error)){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$error.'</p></div>';} ?>
				<form action="<?= site_url("adm_paradas/modificar") ?>" method="post">
					<div class="form-group">
						<label for="id">ID:</label>
						<input type="text" class="form-control" readonly="true" value="<?php echo $records[0]->id ?>" name="id" id="id">
					</div>
					<div class="form-group">
						<label for="nom_parada">nombre de ruta:</label>
						<input type="text" class="form-control" name="nom_parada" id="nom_parada" value="<?php echo $records[0]->nombre ?>">
					</div>
					<div class="form-group">
						<label for="lat_parada">latitud:</label>
						<input type="decimal" class="form-control" name="lat_parada" id="lat_parada" value="<?php echo $records[0]->latitud ?>">
					</div>
					<div class="form-group">
					<div class="form-group">
						<label for="lon_parada">Longitud:</label>
						<input type="decimal" class="form-control" name="lon_parada" id="lon_parada" value="<?php echo $records[0]->longitud ?>">
					</div>
					<button type="submit" name="submit" class="btn btn-success">Modificar Parada</button>
				</form>
			</div>
		</div>
		
	</div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>