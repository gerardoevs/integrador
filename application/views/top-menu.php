<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-top">
				<li class="ShowMenuButton"><span class="glyphicon glyphicon-menu-hamburger" style="font-size:24px;"></span></li>
				<li class="name"><button onclick="cerrar()" data-toggle="modal" data-target="#myModal" style="margin-right: 1em; background: white; border-style: none;"><span class="glyphicon glyphicon-question-sign"><center><span data-toggle="popover" title="Mostrar-Ayuda" data-placement="bottom" data-trigger="focus" data-content="Haz click para mostrar la Ayuda" ></span></center></span></button><?php echo ucfirst($_SESSION['username']); ?></li>
				<li><a class="login-btn" href="<?= site_url('login/logout')?> ">Logout</a></li>
				<script>
					function cerrar(){
						$('[data-toggle="popover"]').popover('hide');
					}
				</script>
			</ul>
		</div>
	</div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="width: 90%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ayuda: Areas del sistema</h4>
        </div>
        <div class="modal-body">
          <div class="row" style="margin: 1em; "> 
          	<div class="col-sm-2" style="background: #263238; height: 400px; border: solid white 5px; padding: 4em;"> 
          		<center><h4 style="color: white;">Menu</h4><hr><button class="btn btn-default" onclick="mostrarInfo(1)"><span class="glyphicon glyphicon-plus"></span></button></center>
          	</div>

          	<div class="col-sm-9" style="background: #fbb5ba; height: 50px; border: solid white 5px; padding: 0.3em;" >
          		<center><button class="btn btn-default" onclick="mostrarInfo(3)"><span class="glyphicon glyphicon-plus"></span></button></center>
          	</div>
          	<div class="col-sm-1" style="background: #f3d9fd; width:50px; height: 50px; border: solid white 5px; padding-left: 5px; padding-top:5px;" >
          		<button class="btn btn-default" onclick="mostrarInfo(4)" style="width: 30px; height: 30px; "><span style="margin: 0;" class="glyphicon glyphicon-plus"></span></button>
          	</div>
          	<div class="col-sm-9" style="background: #dddddd; height: 350px; border: solid white 5px;" >
          		<center><button class="btn btn-default" onclick="mostrarInfo(5)" style="margin-top: 2em;"><span class="glyphicon glyphicon-plus"></span></button></center>

          		<center>
          			<div id="info" style="background: white; padding: 1em; margin: 1em; border-radius: 15px;">
          				<p>Haz click a los signos <span class="glyphicon glyphicon-plus" ></span> para obtener informacion del area</p>
          				
          			</div>
          		</center>
          	</div>
          	
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  	$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
  		
  	function mostrarInfo(btn){
  		switch (btn){
  			case 1:
  				$("#info").html("<h4>Menu de opciones administrativas:</h4><hr><p>En esta barra se encuentran todas las opciones administrativas del sistema, tambien la opcion de ver el mapa y deslogueo.</p><ul><li>Mapa</li><li>Administracion</li><li>Logout</li></ul>");
  			break;
  			case 3:
  				$("#info").html("<h4>Barra de opciones:</h4><hr><p>Esta barra muestra las diferentes opciones de cada area de administracion y lo que se puede hacer en esta tales como: </p><ul><li>Agregar</li><li>Modificar</li><li>Eliminar</li><li>Asignar</li><li>Imprimir</li></ul>");
  			break;
  			case 5:
  				$("#info").html("<h4>Area de informacion y Mapa:</h4><hr><p>En esta area se muestra toda la informacion referente a cada area administrativa del sistema, asi como tambien el mapa de monitoreo, tablas de datos y formularios de relleno.</p>");
  			break;
  			case 4:
  				$("#info").html("<h4>Menu de unidades en el mapa:</h4><hr><p>Este menu nuestra todas las unidades en el mapa, con su respectivos datos. <strong>¡Solo en area Mapa!</strong> </p>");
  			break;
  		}
  	}
  </script>