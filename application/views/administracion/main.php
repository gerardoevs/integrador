
	
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
		var infoMarker = new Array();
		var id= new Array();
		var num_ruta= new Array();
		var origen= new Array();
		var destino= new Array();
		var origenlatlon= new Array();
		var destinolatlon= new Array();
		var nombreConductor = new Array();
		var map;
		var contador=1;
		var random =random = Math.floor((Math.random() * 15000) + 8000);
		

	setInterval(function(){ 
		random = Math.floor((Math.random() * 12000) + 8000);
			$.post("<?= base_url('assets/cambiarposicion.php')?>", {valContador: contador}); 
			if(contador < 888){
				contador++;
			}else{
				contador=888;
			}
			console.log(random);
	}, random);

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
		id[i] = teamData[2];
		num_ruta[i] = teamData[3];
		origen[i] = teamData[4];
		origenlatlon[i] = {lat:parseFloat(teamData[5]), lng:+parseFloat(teamData[6])};
		destino[i] = teamData[7];
		destinolatlon[i] = {lat:parseFloat(teamData[8]), lng:+parseFloat(teamData[9])};
		nombreConductor[i] = teamData[10];
		punto[i] = {lat: parseFloat(latitud[i]), lng: parseFloat(longitud[i])};
	    
	};	

	if (typeof(map) === "undefined") {

		map = new google.maps.Map(document.getElementById('map'), {
	    zoom: 9,
	    center:{lat:13.7413339,lng:-88.7263767}
	    });
		//crea los marcadores de los buses en el mapa
	    for (var i = 0 ; i <= latitud.length; i++) {

	    	infoMarker[i] = new google.maps.InfoWindow({
	          content: '<h5>Unidad '+id[i]+'</h5><hr><p><strong>Conductor:</strong> '+ nombreConductor[i] +'<br><strong>Origen:</strong> '+ origen[i] +'<br><strong>Destino:</strong> '+destino[i]+'<br><strong>Ruta:</strong> '+num_ruta[i]+'</p>'
	        });

	    	autobuses[i] = new google.maps.Marker({
			position:punto[i],
			map: map,
			title: "Unidad " + i,
			icon: icons.autobus
			
		     });

	    	doInfo(autobuses[i], infoMarker[i],i);


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

	var directionsService = new google.maps.DirectionsService;
	var directionsDisplay = new google.maps.DirectionsRenderer;
	directionsDisplay.setMap(map);

	function doInfo(marker, windowName,id) {
        google.maps.event.addListener(marker, 'click', function() {
            windowName.open(map, marker);
            calculateAndDisplayRoute(directionsService, directionsDisplay,id);
        });
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay,id) {
        directionsService.route({
          origin: origenlatlon[id],
          destination: destinolatlon[id],
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }

 }});






setInterval(function(){ 

			changeMarkerPosition();

	}, 2000);


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
					$this->load->database();
					foreach ($unidades as $r) {
						echo '<tr>';
						echo '<td>'.$r->num_ruta.'</td>';
						$query = $this->db->query("SELECT terminalnombre FROM terminales WHERE id = $r->destino");
	        			$resultado = $query->result();
						echo '<td>'.$resultado[0]->terminalnombre.'</td>';
						echo '</tr>';
					}
					?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>