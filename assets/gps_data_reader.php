<?php
header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header( "Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . " GMT" ); 
header( "Cache-Control: no-cache, must-revalidate" ); 
header( "Pragma: no-cache" );

//consulta a al web service
$servidor = "johnny.heliohost.org:3306";
$user = "gevs_001";
$pass = "maki141414";
$bd = "gevs_integrador";
$con = mysqli_connect($servidor,$user,$pass,$bd)or die("No fue posible la conexion");
$latlon = array();
$latlon1 = array();
$consulta = mysqli_query($con,"SELECT lat, lon, idUnidad FROM ubicacion_unidades");
mysqli_close($con);

//consulta a la db local
$servidor = "localhost";
$user = "root";
$pass = "";
$bd = "integrador";
$conn = mysqli_connect($servidor,$user,$pass,$bd)or die("No fue posible la conexion");
$ids = array();
$origenes = array();
$destinos = array();

if ($consulta) {
	$k=0;
	while ($gps = mysqli_fetch_row($consulta)) {
        $latlon[] = $gps[0]."_".$gps[1]."_".$gps[2];
        $ids[$k] = $gps[2];
        $k++;
    }

    for ($i=0; $i < sizeof($ids) ; $i++) {

    	if($ids[$i]=="0"){

    	}else{
    		$consultaLocal = mysqli_query($conn,"SELECT unidades.idRuta, ruta.origen, ruta.destino, ruta.num_ruta FROM `unidades` INNER JOIN ruta on unidades.idRuta=ruta.id WHERE unidades.id = $ids[$i] ");
	    	$datoUnidad = mysqli_fetch_row($consultaLocal);
	    	$origenes[$i] = $datoUnidad[1];
	    	$destinos[$i] = $datoUnidad[2];
	    	$latlon[$i] = $latlon[$i]."_".$datoUnidad[3];
    	}
    	
    }
    mysqli_close($conn);
    for ($i=0; $i < sizeof($ids) ; $i++) {
    	$conn = mysqli_connect($servidor,$user,$pass,$bd)or die("No fue posible la conexion");
    	if($ids[$i]=="0"){
    		
    	}else{
    		if($origenes[$i] == ""){

	    	}else{
	    		$consultaTerminal = mysqli_query($conn,"SELECT terminalnombre,lon,lat FROM terminales WHERE id = $origenes[$i]");
		    	$terminalOrigen = mysqli_fetch_row($consultaTerminal);
		    	$latlon[$i] = $latlon[$i]."_".$terminalOrigen[0]."_".$terminalOrigen[2]."_".$terminalOrigen[1];
	    	}
    	}
    	
    	
    }
    mysqli_close($conn);
	for ($i=0; $i < sizeof($ids) ; $i++) {
    	$conn = mysqli_connect($servidor,$user,$pass,$bd)or die("No fue posible la conexion");
    	if($ids[$i]=="0"){
    		
    	}else{
    		if($destinos[$i] == ""){

	    	}else{
	    		$consultaTerminal = mysqli_query($conn,"SELECT terminalnombre,lon,lat FROM terminales WHERE id = $destinos[$i]");
		    	$terminalDestino = mysqli_fetch_row($consultaTerminal);
		    	$latlon[$i] = $latlon[$i]."_".$terminalDestino[0]."_".$terminalDestino[2]."_".$terminalDestino[1];
	    	}
    	}
    	
    	
    }
    mysqli_close($conn);


}else{
	echo "error";
}






require_once('json.php');
$json = new Services_JSON();
print $json->encode($latlon);

?>