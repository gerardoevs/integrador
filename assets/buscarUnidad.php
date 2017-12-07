<?php 
	
	$servidor = "localhost";
	$user = "root";
	$pass = "";
	$bd = "integrador";
	$con = mysqli_connect($servidor,$user,$pass,$bd)or die("No fue posible la conexion");
	$consultaBusqueda = $_POST['valorBusqueda'];
	$resultado ="";
	$consulta = mysqli_query($con,"SELECT * FROM unidades WHERE idRuta=$consultaBusqueda");
	while ($gps = mysqli_fetch_row($consulta)) {
    	$resultado = $resultado . "<option value=".$gps[0].">".$gps[2]."</option>";   
    }

	echo $resultado;
?>