<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_horarios')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_horarios/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_horarios/update')?>">Modificar  <span class="glyphicon glyphicon-edit"></span></a></li>
			</ul>
		</div>
	</div>
	<div class="row cont" style="margin:0 0.1em;">
		<div class="col-xs-12">
			<h2>Agregar Horario</h2>
				<hr>
				<?php if(validation_errors()== TRUE){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.validation_errors().'</div>'; }?>
		</div>
		
		<div>
			<form action="<?= site_url("adm_horarios/agregar") ?>" id="form1"  enctype="multipart/form-data" method="post">
					<div class="col-xs-6 ">
						<div class="form-group">
							<label for="salida">Hora de salida:</label>
							<input type="time" class="form-control" name="salida" id="salida">
						</div>
						<div class="form-group">
							<label for="llegada">Hora de llegada:</label>
							<input type="time" class="form-control" name="llegada" id="llegada">
						</div>
					</div>
					<div class="col-xs-6 ">
						<div class="form-group">
							<label for="ruta">Ruta:</label>
							<select class="form-control" name="ruta" id="ruta">
								<option value="none">Seleccionar una Ruta</option>
								<?php 
								foreach($rutas as $r) {
								echo "<option value='$r->id'>".$r->num_ruta."</option>";
								}
								?>

							</select>
						</div>
						<div class="form-group">
							<label for="unidad">Unidad con placa:</label>
							<select class="form-control" name="unidad" id="unidad">
								<option value="none">Seleccionar unidad</option>
							</select>
						</div>
						<button type="submit" name="submit" class="btn btn-success ">Registrar Horario</button>
					</div>
				</form>
		</div>
		<script>

			        var onChangeHandler = function() {
			        	var ruta = $("option:selected", "#ruta").val();
			        	console.log(ruta);
			        	$.post("<?= base_url('assets/buscarUnidad.php')?>", {valorBusqueda: ruta}, function(mensaje) {
			            $("#unidad").html(mensaje);
			            console.log(mensaje);
			        	 }); 
			        	
			        };

			        document.getElementById('ruta').addEventListener('change', onChangeHandler);
		    </script>	
	</div>
</div>
</div>
