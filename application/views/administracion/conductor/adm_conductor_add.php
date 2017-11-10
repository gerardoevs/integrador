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
		<div class="col-xs-12 col-lg-8">
				
				<?php if(validation_errors()== TRUE){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.validation_errors().'</div>'; }?>
            	<?php if(isset($mensaje)){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$error.'</p></div>';} ?>
				<form action="<?= site_url("adm_conductor/agregar") ?>"   method="post">
					
					<!-- <div class="form-group" >
						<label for="nombre">Agregar imagen de conductor:</label>
						<label class="btn btn-primary btn-file " style="display: block;">
						    Buscar... <input type="file" id="imagen" name="imagen" size="30" style="display: none;">
						</label>
					</div> -->
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
					<button type="submit" name="submit" class="btn btn-success">Registrar Conductor</button>
				</form>
		</div>
		<div class="col-xs-12 col-lg-4">
			<br>
			<h4>Agregar imagen de conductor: </h4><hr>
			<div id="my-dropzone" class="dropzone" >
			</div>
			<center style="margin: 1em;">
				<button  id="submit-all" class="btn btn-success btn-block">
				Subir foto </button>
			</center>
			<script type="text/javascript">
				
				Dropzone.options.myDropzone = {

					  // Prevents Dropzone from uploading dropped files immediately
					  url:"<?= site_url("adm_conductor/add_photo") ?>",
					  autoProcessQueue: false,

					  init: function() {
					    var submitButton = document.querySelector("#submit-all")
					        myDropzone = this; // closure

					    submitButton.addEventListener("click", function() {
					      myDropzone.processQueue(); // Tell Dropzone to process all queued files.
					    });

					    // You might want to show the submit button only when 
					    // files are dropped here:
					    this.on("addedfile", function() {
					      // Show submit button here and/or inform user to click it.
					    });

					  }
					};
			</script>
		</div>
		
	</div>
</div>
