<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_paradas')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_paradas/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="cont">
				<h2>Lista de paradas</h2>
				<hr>
				<?php if(isset($mensaje)){echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$mensaje.'</p></div>';} ?>

				<form accept-charset="utf-8" method="POST">
					<strong>Buscar:</strong>  <input type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();" class="form-control" style="width: 25%; display: inline-block;" />
				</form><br>

				<script>

				function buscar() {
				    var textoBusqueda = $("input#busqueda").val();
				 	var area= "paradas";
				     if (textoBusqueda != "") {
				        $.post("<?= base_url('assets/buscar.php')?>", {valorBusqueda: textoBusqueda, valorArea: area}, function(mensaje) {
				        	var table = '<thead class="thead-inverse"><th>Nombre</th><th>Latitud</th><th>Longitud</th><th>Editar</th><th>Eliminar</th></thead>';
				            $("#resultadoBusqueda").html(table+mensaje);
				         }); 
				     }else{
				     	var table = '<table><?php echo "<th>Nombre</th>";
							echo "<th>Latitud</th>"; echo "<th>Longitud</th>";
						echo "</thead>";$k=1; foreach($records as $r) {$k++;echo "<tr>";
								echo "<td>".$r->nombre."</td>";
								echo "<td>".$r->latitud."</td>";
								echo "<td>".$r->longitud."</td>";
								
								} ?> </table>';
				     	$("#resultadoBusqueda").html(table);
				     }
				};
				</script>
				

				<table class="table" id="resultadoBusqueda">
					<thead class="thead-inverse" >
						<?php
						echo "<th>Nombre de la Parada</th>";
						echo "<th>Latitud</th>";
						echo "<th>Longitud</th>";
						echo "<th>Editar</th>";
						echo "<th>Eliminar</th>";
					echo "</thead>";
						$k=0;
					foreach($records as $r) {
						$k++;
					echo "<tr>";
						echo "<td>".$r->nombre."</td>";
						echo "<td>".$r->latitud."</td>";
						echo "<td>".$r->longitud."</td>";
						echo "<td><a href = '".site_url()."adm_paradas/update_view/"
							.$r->id."' class='btn btn-success btn-xs' role='button'><span class='glyphicon glyphicon-edit'></span></a></td>";
								echo "<td><button class='btn btn-danger btn-xs' role='button' data-toggle='modal' data-target='#myModal".$k."'><span class='glyphicon glyphicon-trash'></span></a></td>";
								echo '<div class="modal fade" id="myModal'.$k.'" role="dialog">
								    <div class="modal-dialog">
								      <!-- Modal content-->
								      <div class="modal-content">
								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal">&times;</button>
								          <h4 class="modal-title">¿Esta seguro de eliminar?</h4>
								        </div>
								        <div class="modal-body">
								        	'."<a href = '".site_url("adm_paradas/eliminar/")
								.$r->id."' class='btn btn-danger'>Eliminar</a>"."   "."<a href = '".site_url("adm_paradas")."' class='btn btn-default'>Cancelar</a>".'
								        </div>
								      </div>
								    </div>';
								echo "<tr>";
									}
									$k=0;
									?>
								</table>
								
							</div>
						</div>
					</div>
				</div>
				<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>