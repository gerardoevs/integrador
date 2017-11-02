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
				<h2>Modificar Terminal</h2>
				<hr>
				<?php if(validation_errors()== TRUE){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.validation_errors().'</div>'; }?>
				<form action="<?= site_url("adm_terminal/modificar") ?>" method="post">
					<div class="form-group">
						<label for="id">ID:</label>
						<input type="text" class="form-control" readonly="true" value="<?php echo $records[0]->id ?>" name="id" id="id">
					</div>
					<div class="form-group">
						<label for="nombre">Nombre de la terminal:</label>
						<input type="text" class="form-control"  value="<?php echo $records[0]->terminalnombre ?>" name="nombre" id="nombre">
					</div>
					<div class="form-group">
						<label for="dep">Departamento en el que esta ubicada:</label>
						<select class="form-control" name="dep">
							<option value="<?php echo $departamento[0]->idDepartamentos ?>"><?php echo $departamento[0]->nombre ?></option>
							<?php foreach($dep as $r) {
								echo "<option value=".$r->idDepartamentos.">".$r->nombre."</option>"; 
							}
							?>
						</select>
					</div>
					<button type="submit" name="submit" class="btn btn-success">Modificar Terminal</button>
				</form>
			</div>
		</div>
		
	</div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>