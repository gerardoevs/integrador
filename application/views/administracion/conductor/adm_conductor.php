<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_conductor')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_conductor/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_conductor/update')?>">Modificar  <span class="glyphicon glyphicon-edit"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_conductor/conductorMes')?>">Conductor Del Mes  <span class="glyphicon glyphicon-star"></span></a></li>
				<li class="login-btn-a"><a class="login-btn" href="<?= site_url('login/logout')?> ">imprimir</a></li>
			</ul>
		</div>

	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="cont">
				<h2>Listado de conductores</h2>
				<hr>
				<?php if(isset($mensaje)){echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$mensaje.'</p></div>';} ?>
				<?php if(isset($error)){echo '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$error.'</p></div>';} ?>


			<form accept-charset="utf-8" method="POST">
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<strong>Buscar:</strong>  <input type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();" class="form-control" style="display: inline-block;" />
					</div>		
					<div class="col-xs-12 col-sm-6">
						
					</div>				
				</div>
				
			</form><br>

			<script>

			function buscar() {
			    var textoBusqueda = $("input#busqueda").val();
			 	var area= "conductores";
			     if (textoBusqueda != "") {
			        $.post("<?= base_url('assets/buscar.php')?>", {valorBusqueda: textoBusqueda, valorArea: area}, function(mensaje) {
			        	var table = '<thead class="thead-inverse"><th>Nombre</th><th>Apellido</th><th>Dui</th><th>Numero de licencia</th><th>Tipo licencia</th></thead>';
			            $("#resultadoBusqueda").html(table+mensaje);
			         }); 
			     }else{
			     	var table = '<table><?php $i = 1; echo "<th>Nombre</th>";
						echo "<th>Apellido</th>"; echo "<th>Dui</th>";
						echo "<th>Numero de licencia</th>";
						echo "<th>Tipo licencia</th>";
					echo "</thead>"; foreach($records as $r) {echo "<tr>";
							echo "<td>".$r->nombre."</td>";
							echo "<td>".$r->apellido."</td>";
							echo "<td>".$r->dui."</td>";
							echo "<td>".$r->numLicencia."</td>";
							echo "<td>".$r->tipoLicencia."</td>";
							echo "<tr>";
							} ?> </table>';
			     	$("#resultadoBusqueda").html(table);
			     }
			};
			</script>
				<table class="table"  id="resultadoBusqueda">
					<thead class="thead-inverse">
						<?php
						$i = 1;
						echo "<th>Nombre</th>";
						echo "<th>Apellido</th>";
						echo "<th>Dui</th>";
						echo "<th>Numero de licencia</th>";
						echo "<th>Tipo licencia</th>";
					echo "</thead>";
					foreach($records as $r) {
						
							echo "<tr>";
							echo "<td>".$r->nombre."</td>";
							echo "<td>".$r->apellido."</td>";
							echo "<td>".$r->dui."</td>";
							echo "<td>".$r->numLicencia."</td>";
							echo "<td>".$r->tipoLicencia."</td>";
							echo "<tr>";
							}
						
						?>
						</table>
					</div>
				</div>
				
			</div>
		</div>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>