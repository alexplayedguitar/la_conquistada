

<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Esta es una llamada al archivo CSS -->
	<link rel="stylesheet" href="css/style.css" />
	<!-- Esta es una llamada al archivo JS -->
	<script src="js/eventos.js"></script>
</head>
<style>
</style>

<body>

	<div class="row">
		<div class="col-sm">
			<nav class="navbar navbar-expand-md navbar-light fixed-top sticky-top nav-menu">
				<div class="col-md-2 col-xs-12 p-left p-right">
					<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle">
						<i class="fas fa-bars"></i>
					</button>
					<div class="logo">
						<a href="#">
							<img src="images/logo.png" alt="logo">
						</a>
					</div>
				</div>
				<!-- Navbar -->
			</nav>
		</div>
	</div>
	<div id="todocontenido container-fluid" class="container-fluid">
		<div class="row">
			<div id="menu" class="col-sm-2">
				<ul class="sidebar navbar-nav">
					<li class="nav-item active ">
						<h5><a href="index.html"><img src="images/Homeicon.png" title="" alt=""> Home </a></h5>
					<li>
						<h5><a href="resenias.html"><img src="images/Categoryicon.png" title="" alt="">Reseñas</a></h5>
					<li>
						<h5><a href="login.html"><img src="images/flag.png" title="" alt="">Login</a></h5>
					<li>
						<h5><a href="registrousuarios.html"><img src="images/Categoryicon.png" title="" alt="">Registro
								Usuarios</a>
						</h5>
					</li>
				</ul>
			</div>
			<div class="col-sm-10">
				<div id="content-wrapper">
					<div class="container-fluid">
						<!-- Inicio Banner -->
						<div class="row">
							<div class="advertisment-banner col-md-12" align="center">
								<img src="images\Ad_banner.jpg" alt="" title="">
								<div class="clearfix"></div>
							</div>
						</div>
						<!-- Fin Banner-->
						<!-- cierre de menu  de contenido-->
						<!-- Inicio contenerdor registro de noticias-->
						<div>
							<form action="include/noticias_controller.php" method="post" onsubmit="return ValidacionFormularioRegistro()">
								<h3>Registro Noticias</h3>
								<label>Titulo :</label>
								<input id="titulo" name="titulo" placeholder="titulo" type="text">
								<label>Descripcion :</label>
								<input id="descripcion" name="descripcion" placeholder="descripcion" type="text">
								<label>Fecha de Emision :</label> <br>
								<input id="date" type="date" name="fecha" > <br>
								<input type="submit" value="Registrar">
							</form>
						</div>
						<!-- Inicio contenerdor registro de usuarios-->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm">
					<i class="fa fa-map-marker" aria-hidden="true"></i><?php echo date("Y"); ?> - Todos los derechos reservados - La Conquistada.
				</div>
			</div>
</body>
</html>