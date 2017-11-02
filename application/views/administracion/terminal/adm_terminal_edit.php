<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_terminal')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_terminal/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
			</ul>
		</div>
	</div>

	<div class="row cont" style="margin:0 0.05em;">
		<div class="col-xs-12 ">
				<h1>Modificar Terminal</h1>
				<hr>
				<?php if(validation_errors()== TRUE){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.validation_errors().'</div>'; }?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9" >
				<div id="map" style="height:400px; margin-bottom:2em;"></div>
				<script>
					var marker;
			      function initMap() {
			        var map = new google.maps.Map(document.getElementById('map'), {
			          zoom: 9,
			          center: {lat: <?= $records[0]->lat ?>, lng: <?= $records[0]->lon ?>}
			        });

			        marker = new google.maps.Marker({
			          position: {lat: <?= $records[0]->lat ?>, lng: <?= $records[0]->lon ?>},
			          map: map
			        });

			        map.addListener('click', function(e) {
			          moveMarkerAndPanTo(e.latLng, map);
			          markerLatLng = marker.getPosition();
			          $("#lat").attr("value",markerLatLng.lat());
			          $("#lon").attr("value",markerLatLng.lng());
			        });
			      }

			      function moveMarkerAndPanTo(latLng, map) {
			        marker.setPosition(latLng);
			        map.panTo(latLng);

			      }


			    </script>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3" style="background:white;">
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
								<label>Latitud:</label>
								<input type="decimal" class="form-control" name="lat_terminal" id="lat" value="<?= $records[0]->lat ?>" >
						</div>
						<div class="form-group">
							<label>Longitud:</label>
							<input type="decimal" class="form-control" name="lon_terminal" id="lon" value="<?= $records[0]->lon ?>">
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
						<button type="submit" name="submit" class="btn btn-success btn-block">Modificar Terminal</button>
					</form>	
			</div>
	
	</div>

</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>


