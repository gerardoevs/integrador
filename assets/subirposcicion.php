<?php
	
$servidor = "localhost";
$user = "root";
$pass = "";
$bd = "integrador";
$con = mysqli_connect($servidor,$user,$pass,$bd)or die("No fue posible la conexion");
$lat = $_POST['valorBusqueda'];
$lon = $_POST['valorArea'];
$consulta = mysqli_query($con,"INSERT INTO ubicacion (lat, lon)  VALUES ($lat, $lon)");
mysqli_close($con);


?>