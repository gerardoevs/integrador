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
		<div class="col-sm-9">
			<div class="cont">
				<h2>Agregar conductor del mes</h2>
				<hr>
				<?php if(isset($success)){echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$success.'</p></div>';} ?>
				<?php if(validation_errors()== TRUE){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.validation_errors().'</div>'; }?>
            	<?php if(isset($mensaje)){echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><p>'.$error.'</p></div>';} ?>
				<form action="<?= site_url("adm_conductor/AddConductorMes") ?>" method="post">
					<div class="form-group">
						<label for="nombre">Conductores:</label>
						<select class="form-control" name="condutor" id="sel1">
						<option value="none">Seleccione Conductor</option>
							<?php
							foreach ($records as $c) {
								echo "<option value=".$c->id.">".$c->nombre."</option>";
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="motivo">Motivo:</label>
						<textarea type="text" class="form-control" name="motivo" id="motivo" ></textarea>
					</div>
					<button type="submit" name="submit" class="btn btn-success">Registrar Conductor del mes</button>
				</form>
			</div>
		</div>
		<div class="col-sm-3 cont-aside">
			<h3 style="text-align:center;">Conductor del mes</h3>
			<img src="<?= base_url('assets/img/avatar.jpg')?>" style="width:150px; display:block; margin:auto;" >
			<h5><strong>Nombre: </strong></h5>
			<h5><?= $conductor[0]->nombre ?> </h5>
			
		</div>
		
	</div>
</div>