<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_rutas')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_rutas/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
			</ul>
		</div>
	</div>
	<div class="row cont" style="margin:0 0.1em;">
		<div class="col-xs-12">
			<h2>Agregar Ruta</h2>
				<hr>
				<?php if(isset($error)){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$error.'</p></div>';} ?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3">
				<div style="margin-bottom:2em;">
					<form action="<?= site_url("adm_rutas/agregar") ?>" method="post">
					<div class="form-group">
						<label for="num_ruta">Numero de ruta:</label>
						<input type="text" class="form-control" name="num_ruta" id="num_ruta">
					</div>
					<div class="form-group">
					<label>Terminal de Origen:</label>
						<select class="form-control" name="Origen" id="origen">
							<option value="13.4841464,-88.1712753">Seleccionar una Terminal</option>
							<?php 
							foreach($terminales as $r) {
						echo "<option value='$r->id' valor='$r->lat, $r->lon'>".$r->terminalnombre."</option>";
							}
							?>

						</select>
					</div>
					<div class="form-group">
					<label>Terminal de Destino:</label>
						<select class="form-control" name="Destino" id="destino">
						<option value="13.4841464,-88.1712753">Seleccionar una Terminal</option>
							<?php 
							foreach($terminales as $r) {
						echo "<option value='$r->id' valor='$r->lat, $r->lon'>".$r->terminalnombre."</option>";
							}
							?>
						</select>
					</div>		
					<button type="submit" name="submit" class="btn btn-success">Registrar Ruta</button>
				</form>
				</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9">
			<div id="map" style="height:400px;"></div>
				<script>
			      function initMap() {
			        var directionsService = new google.maps.DirectionsService;
			        var directionsDisplay = new google.maps.DirectionsRenderer;
			        var map = new google.maps.Map(document.getElementById('map'), {
			          zoom: 9,
			          center: {lat: 13.623165, lng:  -88.800392}
			        });
			        directionsDisplay.setMap(map);

			        var onChangeHandler = function() {
			          calculateAndDisplayRoute(directionsService, directionsDisplay);
			        };
			        document.getElementById('origen').addEventListener('change', onChangeHandler);
			        document.getElementById('destino').addEventListener('change', onChangeHandler);
			      }

			      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
			        directionsService.route({
			          origin: $("option:selected", "#origen").attr("valor"),
			          destination: $("option:selected", "#destino").attr("valor"),
			          travelMode: 'DRIVING'
			        }, function(response, status) {
			          if (status === 'OK') {
			            directionsDisplay.setDirections(response);
			          } else {
			            window.alert('Directions request failed due to ' + status);
			          }
			        });
			      }
		    </script>
		    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>
		</div>
	</div>
</div>
</div>
