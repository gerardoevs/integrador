<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-adm">
				<li><a class="login-btn " href="<?= site_url('adm_conductor')?>">Ver todos  <span class="glyphicon glyphicon-th-list"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_conductor/add')?>">Agregar <span class="glyphicon glyphicon-plus-sign"></span></a></li>
				<li><a class="login-btn" href="<?= site_url('adm_conductor/update')?>">Modificar  <span class="glyphicon glyphicon-edit"></span></a></li>
				<li class="login-btn-a"><a class="login-btn" href="<?= site_url('login/logout')?> ">imprimir</a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="cont">
				<h2>Modificar conductor</h2>
				<hr>
				<?php if(isset($success)){echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$success.'</p></div>';} ?>
				<?php if(isset($mensaje)){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$success.'</p></div>';} ?>
				<?php if(isset($successdel)){echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$successdel.'</p></div>';} ?>
				<table class="table">
					<thead class="thead-inverse">
						<?php
						$i = 1;
						echo "<th>ID</th>";
						echo "<th>Nombre</th>";
						echo "<th>Apellido</th>";
						echo "<th>Dui</th>";
						echo "<th>Licencia</th>";
						echo "<th>Editar</th>";
						echo "<th>Eliminar</th>";
					echo "</thead>";
						$k=0;
					foreach($records as $r) {
						$k++;
						
							echo "<tr>";
							echo "<td>".$r->id."</td>";
							echo "<td>".$r->nombre."</td>";
							echo "<td>".$r->apellido."</td>";
							echo "<td>".$r->dui."</td>";
							echo "<td>".$r->numLicencia."</td>";
							echo "<td><a href = '".site_url()."adm_conductor/update_view/"
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
								        	'."<a href = '".site_url("adm_conductor/eliminar/")
								.$r->id."' class='btn btn-danger'>Eliminar</a>"."   "."<a href = '".site_url("adm_conductor/update")."' class='btn btn-default'>Cancelar</a>".'
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