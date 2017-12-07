<?php


$servidor = "johnny.heliohost.org:3306";
$user = "gevs_001";
$pass = "maki141414";
$bd = "gevs_integrador";

$con = mysqli_connect($servidor,$user,$pass,$bd)or die("No fue posible la conexion");


$lat = $_GET["lat"];
$lon = $_GET["lon"];
$fecha = date("Y-m-d H:i:s");

if($lat == 0 || $lon == 0 ){

}else{
	if( mysqli_query($con,"UPDATE ubicacion_unidades SET lat='$lat', lon='$lon', fecha='$fecha' WHERE idUnidad=35") )
	{
		echo "ok";
	}else{
		echo "Error en la comunicacion con el gps";
	}
}



