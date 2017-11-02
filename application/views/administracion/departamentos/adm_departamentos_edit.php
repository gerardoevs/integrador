<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_departamentos')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_departamentos/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="cont">
				<h2>Modificar Departamento</h2>
				<hr>
				<?php if(isset($error)){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$error.'</p></div>';} ?>
				<form action="<?= site_url("adm_departamentos/modificar") ?>" method="post">
					<div class="form-group">
						<label for="nombre">ID:</label>
						<input type="text" class="form-control" readonly="true" value="<?php echo $records[0]->idDepartamentos ?>" name="id" id="id">
					</div>
					<div class="form-group">
						<label for="nombre">Nombre de departamento:</label>
						<input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $records[0]->nombre ?>">
					</div>
					<button type="submit" name="submit" class="btn btn-success">Modificar Departamento</button>
				</form>
			</div>
		</div>
		
	</div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>