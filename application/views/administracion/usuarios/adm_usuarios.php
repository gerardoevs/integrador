<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_usuarios')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_usuarios/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="cont">
				<h2>Lista de Usuario</h2>
				<hr>
				<table class="table">
					<thead class="thead-inverse">
						<?php
						$i = 1;
						echo "<th>Nombre Usuario</th>";
						echo "<th>Editar</th>";
						echo "<th>Eliminar</th>";
					echo "</thead>";
					$k=0;
					foreach($records as $r) {
						$k++;
						echo "<tr>";
						echo "<td>".$r->usr."</td>";
						if($_SESSION['username'] != "admin"){
							echo "<td><a href = '".site_url()."adm_usuarios/update_view/"
							.$r->userID."' class='btn btn-success btn-xs' role='button'><span class='glyphicon glyphicon-edit'></span></a></td>";
						}else{
							if($r->usr=="admin"){
								echo "<td><a href = '".site_url()."adm_usuarios/update_view/"
								.$r->userID."' class='btn btn-success btn-xs' role='button'><span class='glyphicon glyphicon-edit'></span></a></td>";
							}else{
								echo "<td><a href = '".site_url()."adm_usuarios/update_view/"
								.$r->userID."' class='btn btn-success btn-xs' role='button'><span class='glyphicon glyphicon-edit'></span></a></td>";
								echo "<td><button class='btn btn-danger btn-xs' role='button' data-toggle='modal' data-target='#myModal".$k."'><span class='glyphicon glyphicon-trash'></span></td>";
								echo '<div class="modal fade" id="myModal'.$k.'" role="dialog">
								    <div class="modal-dialog">
								      <!-- Modal content-->
								      <div class="modal-content">
								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal">&times;</button>
								          <h4 class="modal-title">¿Esta seguro de eliminar?</h4>
								        </div>
								        <div class="modal-body">
								        	'."<a href = '".site_url("adm_usuarios/eliminar/")
								.$r->userID."' class='btn btn-danger'>Eliminar</a>"."   "."<a href = '".site_url("adm_usuarios")."' class='btn btn-default'>Cancelar</a>".'
								        </div>
								      </div>
								    </div>';
							}
							
						}
					}
					$k=0;
					?>
								</table>
							</div>
						</div>
						
					</div>
				</div>
				<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvom9m9ei731UXYAIWd9a7imG8jI1MkF0&callback=initMap"></script>