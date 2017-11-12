<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_conductor')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_conductor/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_conductor/update')?>">Modificar  <span class="glyphicon glyphicon-edit"></span></a></li>
				<li class="login-btn-a"><a class="login-btn" href="<?= site_url('login/logout')?> ">imprimir</a></li>
			</ul>
		</div>
	</div>
	<div class="row cont">
		<div class="col-xs-12">
			<h2>Agregar conductor</h2>
			<hr>
		</div>
		<div class="col-xs-12 ">
			<?php if(validation_errors()== TRUE){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.validation_errors().'</div>'; }?>
            	<?php if(isset($mensaje)){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$error.'</p></div>';} ?>
				<div class="row">
				<form action="<?= site_url("adm_conductor/agregar") ?>" id="form1"  enctype="multipart/form-data" method="post">
					<div class="col-xs-6 ">
						
						<div class="form-group">
							<label for="nombre">Nombres:</label>
							<input type="text" class="form-control" name="nombre" id="nombre">
						</div>
						<div class="form-group">
							<label for="apellido">Apellidos:</label>
							<input type="text" class="form-control" name="apellido" id="apellido">
						</div>
						<div class="form-group">
							<label for="edad">Edad:</label>
							<input type="number" class="form-control" name="edad" id="edad">
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
								<label for="dui">Dui:</label>
								<input type="text" class="form-control" name="dui" id="dui">
							</div>
							<div class="form-group">
								<label for="nit">Nit:</label>
								<input type="text" class="form-control" name="nit" id="nit">
							</div>
					</div>
					<div class="col-xs-6 ">
							
							<div class="form-group">
								<label for="n-licencia">N° de Licencia de conducir:</label>
								<input type="text" class="form-control" name="numLicencia"id="n-licencia">
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
							<div class="form-group" >
							<label>Agregar imagen de conductor:</label>
							<div class="panel panel-default">
						    	<div class="panel-body">
									<input id="uploadFile" placeholder="Seleccionar Imagen" disabled="disabled"  class="form-control" />
									<div class="fileUpload btn btn-primary">
									    <span>Seleccionar</span>
									    <input id="uploadBtn" type="file" name="file"  class="upload" />
									</div>
						    	</div>
						  	</div>
						</div>
						<button type="submit" name="submit" class="btn btn-success ">Registrar Conductor</button>
					</div>
				</form>
				</div>
				
				
		</div>
		
		
	</div>
</div>
<script type="text/javascript">
	document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>
