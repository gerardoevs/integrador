<?php
	
$latitud =0;
$longitud=0;
$contador=$_POST['valContador'];

$servidor = "localhost";
$user = "root";
$pass = "";
$bd = "integrador";
$conex = mysqli_connect($servidor,$user,$pass,$bd)or die("No fue posible la conexion");
$consulta = mysqli_query($conex,"SELECT lat, lon FROM ubicacion WHERE id=$contador");
while ($posicion = mysqli_fetch_row($consulta)) {
	$latitud = $posicion[0];
	$longitud = $posicion[1];
}
mysqli_close($conex);

//consulta a al web service
$servidor = "johnny.heliohost.org:3306";
$user = "gevs_001";
$pass = "maki141414";
$bd = "gevs_integrador";
$con = mysqli_connect($servidor,$user,$pass,$bd)or die("No fue posible la conexion");
$latlon = array();
$latlon1 = array();
$consulta1 = mysqli_query($con,"UPDATE ubicacion_unidades SET lat=$latitud, lon=$longitud WHERE idUnidad=1");
mysqli_close($con);


?>