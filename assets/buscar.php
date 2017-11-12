<?php
		
		//Archivo de conexión a la base de datos
		define('HOST_DB', 'localhost');  //Nombre del host, nomalmente localhost
		define('USER_DB', 'root');       //Usuario de la bbdd
		define('PASS_DB', '');           //Contraseña de la bbdd
		define('NAME_DB', 'integrador');

		global $conexion;  //Definición global para poder utilizar en todo el contexto
		$conexion = mysqli_connect(HOST_DB, USER_DB, PASS_DB)
		or die ('NO SE HA PODIDO CONECTAR AL MOTOR DE LA BASE DE DATOS');
		mysqli_select_db($conexion,NAME_DB)
		or die ('NO SE ENCUENTRA LA BASE DE DATOS ' . NAME_DB);

		//Variable de búsqueda
		$consultaBusqueda = $_POST['valorBusqueda'];

		//Filtro anti-XSS
		$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
		$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
		$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

		//Variable vacía (para evitar los E_NOTICE)
		$mensaje = "";


		//Comprueba si $consultaBusqueda está seteado
		if (isset($consultaBusqueda)) {

			//Selecciona todo de la tabla mmv001 
			//donde el nombre sea igual a $consultaBusqueda, 
			//o el apellido sea igual a $consultaBusqueda, 
			//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
			$consulta = mysqli_query($conexion, "SELECT * FROM conductores
			WHERE nombre COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%' AND estado=1
			OR apellido  COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%' AND estado=1
			OR CONCAT(nombre,' ',apellido)  COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%'    AND estado=1
			");

			//Obtiene la cantidad de filas que hay en la consulta
			$filas = mysqli_num_rows($consulta);

			//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
			if ($filas === 0) {
				$mensaje = "<p>No hay ningún usuario con ese nombre y/o apellido</p>";
			} else {
				//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
				

				//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
				while($resultados = mysqli_fetch_array($consulta)) {
					$nombre = utf8_encode($resultados['nombre']);
					$apellido = utf8_encode($resultados['apellido']);
					$dui = utf8_encode($resultados['dui']);
					$numLic = utf8_encode($resultados['numLicencia']);
					$tipo = utf8_encode($resultados['tipoLicencia']);
					
					//Output
					$mensaje .= '<tr>
					<td>'.$nombre.'</td>'.'
					<td>'.$apellido.'</td>'.'
					<td>'.$dui.'</td>'.'
					<td>'.$numLic.'</td>'.'
					<td>'.$tipo.'</td></tr>';

				};//Fin while $resultados

			}; //Fin else $filas

		};//Fin isset $consultaBusqueda

		//Devolvemos el mensaje que tomará jQuery
		echo $mensaje ;

?>