<?php
	session_start();

	if(isset($_SESSION['usuario'])){
		echo "<script>console.log('Logged In');</script>";


		if($_SESSION['usuario']['permisosUsuario'] == 0){
			//echo "<script>console.log('Si Admin');</script>";
			//header('Location: ../Admin/AdminDashboard.php');
		}else if($_SESSION['usuario']['permisosUsuario'] == 1){
			//echo "<script>console.log('Si Admin');</script>";
			header('Location: ../Logistica/LogisticaDashboard.php');	
		}else if($_SESSION['usuario']['permisosUsuario'] == 2){
			//echo "<script>console.log('Si Admin');</script>";
			header('Location: ../Soporte/SoporteDashboard.php');
		}else if($_SESSION['usuario']['permisosUsuario'] == 3){
			//echo "<script>console.log('Si Admin');</script>";
			header('Location: ../Cliente/ClienteDashboard.php');
		}
	}else{
		echo "<script>console.log('Not Logged In');</script>";
		header('Location: ../index.html');
	}
?>
<!doctype html>
<html>
<head>
	<title>#YoCuidoDeTi - Admin Dashboard</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="../css/bootstrap.min.css">
	 <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">

	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="../css/style.css">
</head>
	<body>

	<div class="container-full top-bar">
		<nav class="navbar navbar-light" style="min-height: 85px;">
		  <a id="logo" class="navbar-brand ml-5" href="AdminDashboard.php">
		    #YoCuidoDeTi
		  </a>
		  <p class="navbar-brand pr-5 mb-0 ">Panel de Administrador</p>
		  <button class="btn btn-outline-light mr-5" onclick="location.href = '../php/salir.php';"><i class="fas fa-sign-out-alt"></i><a  style="color:inherit;"> Salir</a></button> 
		</nav>
	</div>
	<div class="container-full all-container">
		<div class="d-flex row p-5" id="wrap-contenido">
			<div class="col-8 ml-auto mr-4 py-4 px-4">
				<h2 class="text-center">Contenido para Administradores</h2>
				<p class="px-3 py-3" >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet nulla facilisi morbi tempus iaculis. Mauris in aliquam sem fringilla ut morbi tincidunt. Aliquam id diam maecenas ultricies mi eget mauris pharetra et. Hac habitasse platea dictumst vestibulum. In fermentum posuere urna nec tincidunt praesent semper feugiat. Mattis pellentesque id nibh tortor id aliquet. Id diam maecenas ultricies mi eget. Integer vitae justo eget magna fermentum. Quis commodo odio aenean sed adipiscing diam. Dolor sed viverra ipsum nunc aliquet bibendum enim. <br><br>

				Eget nunc scelerisque viverra mauris in aliquam sem fringilla. Enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Ultrices mi tempus imperdiet nulla. Dui id ornare arcu odio ut sem nulla pharetra diam. Massa id neque aliquam vestibulum morbi blandit. Dui nunc mattis enim ut tellus elementum sagittis. Pellentesque habitant morbi tristique senectus et netus et malesuada. Felis imperdiet proin fermentum leo vel orci porta non. Praesent tristique magna sit amet purus gravida quis blandit turpis. Quisque sagittis purus sit amet volutpat consequat mauris nunc congue. Mauris pharetra et ultrices neque ornare aenean. Posuere urna nec tincidunt praesent semper feugiat nibh. Consequat semper viverra nam libero justo. Et ligula ullamcorper malesuada proin libero nunc consequat interdum. Et odio pellentesque diam volutpat commodo sed..</p>
			</div>
			<div class="col-3 mr-auto">
				<h4 class="text-center py-4">Agregar Usuarios</h4>
		<!-- 
				
				<form action="test.php" method="get">
					<input type="text" name="nombre" placeholder="nombre"><br>
					<input type="text" name="apellidos" placeholder="apellidos"><br>
					<input type="text" name="user" placeholder="usuario"><br>
					<input type="text" name="password" placeholder="contraseña"><br><br>
					<select id="permisosUsuario" name="permisosUsuario">
					  <option value="3">Usuario</option>
					  <option value="2">Sporte</option>
					  <option value="1">Logistica</option>
					  <option value="0">Administrador</option>
					</select>

					<select id="activo" name="activo">
					  <option value="0">Inactivo</option>
					  <option value="1">Activo</option>
					</select>
					<input type="submit">
				</form>	 -->
				<form action="../php/test.php" method="post">
				  <div class="form-group">
				    <label for="">Nombre:</label>
				    <input type="text" name="nombre" class="form-control" required>
				  </div>
				  <div class="form-group">
				    <label for="">Apellidos:</label>
				    <input type="text" class="form-control" name="apellidos" required>
				  </div>
				  <div class="form-group">
				    <label for="">Usuario:</label>
				    <input type="text" class="form-control" name="user" required>
				  </div>
				  <div class="form-group">
				    <label for="">Contraseña:</label>
				    <input type="password" class="form-control" name="password" required>
				  </div>
				  <div class="row">
				  	<div class="col-6">
				  		<label for="">Permisos:</label>
					  	<select class="custom-select" name="permisosUsuario">
						  <option value="3">Cliente</option>
						  <option value="2">Soporte</option>
						  <option value="1">Logistica</option>
						  <option value="0">Administrador</option>
						</select>
					</div>
					<div class="col-6">
						<label for="">Estado de Usuario:</label>
						<select class="custom-select" name="activo">
						  <option value="1" selected>Inactivo</option>
						  <option value="0">Activo</option>
						</select>
					</div>
				  </div>
				  <button type="submit" class="btn btn-primary float-right my-4 mr-3">Submit</button>
				</form>
			
			</div>
		</div>
	</div>
	<!-- <a href="php/salir.php">Salir</a> -->
	</body>
	<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
	<script src="https://unpkg.com/@popperjs/core@2"></script>
	<script src="../js/main.js"></script>
</html>