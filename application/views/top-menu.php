<div class="container-fluid contenedor">
	<div class="row">
		<div class="col-sm-12 ">
			<ul class="menu-top">
				<li class="ShowMenuButton"><span class="glyphicon glyphicon-menu-hamburger" style="font-size:24px;"></span></li>
				<li class="name"><?php echo ucfirst($_SESSION['username']); ?></li>
				<li><a class="login-btn" href="<?= site_url('login/logout')?> ">Logout</a></li>
			</ul>
		</div>
	</div>
</div>