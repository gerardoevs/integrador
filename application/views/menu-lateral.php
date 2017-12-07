<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2 menu-lateral" >
			<nav class="menu-principal">
				<h3>Menu</h3>
			</nav>
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
						<a href="<?= site_url('main')?>"><span class="glyphicon glyphicon-home iz"></span>Mapa</a>
						</h4>
					</div>
				</div>
				<div class="panel panel-default">
					<span id="popBarra" style="float:right;" data-toggle="popover" title="Administración" data-trigger="focus" data-content="Haz click para mostrar las demas opciones"></span>
					<div class="panel-heading" >
						<h4 class="panel-title" >
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span class="glyphicon glyphicon-briefcase iz"></span>Administración <span class="glyphicon glyphicon-chevron-right der"></span></a>
						</h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
						<div class="panel-body">
							<nav class="menu-principal">
								<ul>
									<script>
										$(document).ready(function(){

											if (document.cookie != 1) {
												
												$('[data-toggle="popover"]').popover('toggle');
												document.cookie = 1;
											}else{
												$('[data-toggle="popover"]').popover('hide');
											}
											
											
										    
										});
										</script>
									<li ><a href="<?= site_url('adm_conductor')?>">Conductores</a></li>
									<li><a href="<?= site_url('adm_unidades')?>">Unidades</a></li>
									<li><a href="<?= site_url('adm_rutas')?>">Rutas</a></li>
									<li><a href="<?= site_url('adm_usuarios')?>">Usuarios</a></li>
									<li><a href="<?= site_url('adm_terminal')?>">Terminal</a></li>
									<li><a href="<?= site_url('adm_departamentos')?>">Departamentos</a></li>
									<li><a href="<?= site_url('adm_paradas')?>">Paradas</a></li>
									<li><a href="<?= site_url('adm_horarios')?>">Horarios</a></li>
								</ul>
							</nav>
							
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
						<a href="<?= site_url('login/logout')?> "><span class="glyphicon glyphicon-log-out iz"></span>Logout</a>
						</h4>
					</div>
				</div>
			</div>
		</div>

		<div id="menu-escondido" class="col-sm-2 " >
			
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<nav class="menu-principal">
				<h3>Menu<span class="glyphicon glyphicon-remove" style="font-size:19px; float:right; top:3px; cursor: pointer;" id="btn-cerrar"></span></h3>
			</nav>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
						<a href="<?= site_url('main')?>"><span class="glyphicon glyphicon-home iz"></span>Mapa</a>
						</h4>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span class="glyphicon glyphicon-briefcase iz"></span>Administración<span class="glyphicon glyphicon-chevron-right der"></span></a>
						</h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse">
						<div class="panel-body">
							<nav class="menu-principal">
								<ul>
									<li><a href="<?= site_url('adm_conductor')?>">Conductores</a></li>
									<li><a href="<?= site_url('adm_unidades')?>">Unidades</a></li>
									<li><a href="<?= site_url('adm_rutas')?>">Rutas</a></li>
									<li><a href="<?= site_url('adm_usuarios')?>">Usuarios</a></li>
									<li><a href="<?= site_url('adm_terminal')?>">Terminal</a></li>
									<li><a href="<?= site_url('adm_departamentos')?>">Departamentos</a></li>
									<li><a href="<?= site_url('adm_paradas')?>">Paradas</a></li>
									<li><a href="<?= site_url('adm_horarios')?>">Horarios</a></li>
								</ul>
							</nav>
							
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
						<a href="<?= site_url('login/logout')?> "><span class="glyphicon glyphicon-log-out iz"></span>Logout</a>
						</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>