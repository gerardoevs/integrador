
	
<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="banner-cdelmes">
				<li><strong>Conductor del mes:</strong></li>
				<li><?= $conductor[0]->nombre ?></li>
				<!-- <li class="motivo" style="width:60%;"><marquee>ASDASDASDASD alskdnalsdknaklsd anlskn</marquee></li> -->
			</ul>
			
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
		<script>
		var latitud = new Array();
		var longitud = new Array();
		var punto = new Array();
		var autobuses = new Array();
		var paradasBuses = new Array();
		var circulos = new Array();
		var inicio = new Array();
		var map;

	function initMap() {
	

	var iconBase = '<?= base_url("/assets/img/"); ?>';
    var icons = {
      autobus: iconBase + "autobus.png",
      parada: iconBase + "parada.png"
    };

	screen = new Ajax.PeriodicalUpdater('', '<?= base_url("/assets/gps_data_reader.php"); ?>', { method: 'get', frequency: 3.0, onSuccess: function(t) {
	var data = t.responseText.evalJSON();

	for (var i = 0; i <= data.length-1; i++) {

		var teamData = data[i].toString().split("_");
		latitud[i] = teamData[0];
		longitud[i] = teamData[1];
		punto[i] = {lat: parseFloat(latitud[i]), lng: parseFloat(longitud[i])};
	    
	};	

	if (typeof(map) === "undefined") {

		map = new google.maps.Map(document.getElementById('map'), {
	    zoom: 12,
	    center:punto[0]
	    });
		//crea los marcadores de los buses en el mapa
	    for (var i = 0 ; i <= latitud.length; i++) {
	    	autobuses[i] = new google.maps.Marker({
			position:punto[i],
			map: map,
			title: "Unidad " + i,
			icon: icons.autobus
		     });
	    };

	    <?php 
	    	foreach ($paradas as $k) {
	    		echo "for (var i = 1 ; i <= ".count($paradas)."; i++) {
	    				paradasBuses[i] = new google.maps.Marker({
						position:{lat: ".$k->latitud." , lng: ".$k->longitud." },
						map: map,
						title: '".$k->nombre."',
						icon: icons.parada
					     });
				    };";
				 
				// echo "for (var i = 1 ; i <= ".count($paradas)."; i++) {
				//       circulos[i] = new google.maps.Circle({
				//       strokeColor: '#FFFFFF',
				//       strokeOpacity: 0.2,
				//       strokeWeight: 2,
				//       fillColor: '#FFFFFF',
				//       fillOpacity: 0.2,
				//       map: map,
				//       center: {lat: ".$k->latitud." , lng: ".$k->longitud." },
				//       radius: 75
				//     });
				//     };";

	    	};
	    ?>

			
	       
	}

 }});






setInterval(function(){ 

			changeMarkerPosition();

	}, 10000);


function changeMarkerPosition() {

	var data; 
	$.getJSON('<?= base_url("/assets/gps_data_reader.php"); ?>',  function(jsonData) {
	    data = jsonData;
	     for (var i = 0; i <= data.length-1; i++) {

			var teamData = data[i].toString().split("_");
			latitud[i] = teamData[0];
			longitud[i] = teamData[1];
			var latlng = new google.maps.LatLng(parseFloat(latitud[i]), parseFloat(longitud[i]));
    		autobuses[i].setPosition(latlng);

		};

		
	}); 

    
	}
}

      
</script>
    		
			<div id="map"  class="cont-maps" >
			</div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-12 cont-aside">
			<h3>Unidades en el Mapa</h3>
			<table class="table table-bordered " id="table-aside">
				<thead>
					<tr>
						<th>Ruta</th>
						<th>Destino</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
					foreach ($unidades as $r) {
						echo '<tr>';
						echo '<td>'.$r->num_ruta.'</td>';
						echo '<td>'.$r->destino.'</td>';
						echo '</tr>';
					}
					?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>