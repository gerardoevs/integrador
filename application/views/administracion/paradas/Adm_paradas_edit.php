<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_paradas')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_paradas/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
			</ul>
		</div>
	</div>

	<div class="row cont" style="margin:0 0.05em;">
		<div class="col-xs-12 ">
				<h1>Agregar Parada</h1>
				<hr>
				<?php if(validation_errors()== TRUE){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.validation_errors().'</div>'; }?>
		</div>
		<div class="col-xs-12 col-sm-9" >
				<div id="map" style="height:300px; margin-bottom:2em;"></div>
				<script>
					var marker;
			      function initMap() {
			        var map = new google.maps.Map(document.getElementById('map'), {
			          zoom: 15,
			          center: {lat: <?= $records[0]->latitud ?>, lng: <?=$records[0]->longitud ?> }
			        });

			        marker = new google.maps.Marker({
			          position: {lat: <?= $records[0]->latitud ?>, lng: <?=$records[0]->longitud ?> },
			          map: map
			        });

			        map.addListener('click', function(e) {
			          moveMarkerAndPanTo(e.latLng, map);
			          markerLatLng = marker.getPosition();
			          $("#lat_parada").attr("value",markerLatLng.lat());
			          $("#lon_parada").attr("value",markerLatLng.lng());
			        });
			      }

			      function moveMarkerAndPanTo(latLng, map) {
			        marker.setPosition(latLng);
			        map.panTo(latLng);

			      }


			    </script>
			</div>
			<div class="col-xs-12 col-sm-3 " style="background:white;">
				
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
					<button type="submit" name="submit" class="btn btn-success btn-block">Modificar Parada</button>
						</form>	

				</div>
	
	</div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>
