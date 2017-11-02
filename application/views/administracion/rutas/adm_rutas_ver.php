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
			<h2><strong>Ruta:</strong><?= $records[0]->num_ruta ?> </h2>
				<hr>
				<?php if(isset($error)){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$error.'</p></div>';} ?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3">
				<div style="margin-bottom:2em;">
					<form action="<?= site_url("adm_rutas/modificar") ?>" method="post">
						<div class="form-group">
							<label for="num_ruta">Numero de ruta:</label>
							<input type="text" class="form-control" readonly="true" name="num_ruta" id="num_ruta" value="<?= $records[0]->num_ruta ?>">
						</div>
						<div class="form-group">
							<label>Terminal de Origen:</label>
							<input type="text" class="form-control" readonly="true" valor="<?php  echo $origen[0]->lat; echo ','.$origen[0]->lon  ?>" id="origen" value="<?= $origen[0]->terminalnombre ?>">	
						</div>
						<div class="form-group">
							<label>Terminal de Destino:</label>
							<input type="text" class="form-control" readonly="true" valor="<?php  echo $destino[0]->lat; echo ','.$destino[0]->lon  ?>" id="destino" value="<?= $destino[0]->terminalnombre ?>">
						</div>
						<a  href="<?= site_url('adm_rutas/update_view/').$records[0]->id ?>" class="btn btn-success btn-block">Modificar Ruta</a>
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
			        calculateAndDisplayRoute(directionsService, directionsDisplay);

			      }

			      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
			        directionsService.route({
			          origin: $("#origen").attr("valor"),
			          destination: $("#destino").attr("valor"),
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



















