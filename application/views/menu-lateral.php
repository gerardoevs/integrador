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
					<div class="panel-heading">
						<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span class="glyphicon glyphicon-briefcase iz"></span>Administración<span class="glyphicon glyphicon-chevron-right der"></span></a>
						</h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
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
			<nav class="menu-principal">
				<h3>Menu<span class="glyphicon glyphicon-remove" style="font-size:19px; float:right; top:3px;" id="btn-cerrar"></span></h3>
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