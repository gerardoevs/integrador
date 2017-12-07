
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
	<div class="row cont">
		<div class="col-xs-12">
			<h2>Buscar conductor</h2>
			<hr>
		</div>
		<div class="col-xs-12 ">

			<form accept-charset="utf-8" method="POST">
			<input type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();" />
			</form>
			<div id="resultadoBusqueda"></div>
			<script>

			

			function buscar() {
			    var textoBusqueda = $("input#busqueda").val();
			 
			     if (textoBusqueda != "") {
			        $.post("http://localhost/integrador/assets/buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
			            $("#resultadoBusqueda").html(mensaje);
			         }); 
			     } 
			};
			</script>	
				
		</div>
		
		
	</div>
</div>


	
