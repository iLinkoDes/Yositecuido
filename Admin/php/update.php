<?php 
	echo $_POST['id'];

	require('../../php/db_conf/conn.php');

	$opciones = [
	    'cost' => 15,
	];

	$pass = $_POST['password'];
	$crypt_pass = password_hash($pass, PASSWORD_BCRYPT, $opciones);

	if ($_POST['password']=="") {
		if ($query = $conn->prepare("UPDATE `backend_usuarios` SET `nombre` = ?, `apellidos` = ?, `usuario` = ?, `permisosUsuario` = ?, `activo` = ? WHERE `backend_usuarios`.`id` = ?")) {
		$query->bind_param('ssssss',$_POST['nombre'],$_POST['apellidos'],$_POST['usuario'],$_POST['permisosUsuario'],$_POST['activo'],$_POST['id']);
		$query->execute();
		
		};
	}else{
		if ($query = $conn->prepare("UPDATE `backend_usuarios` SET `nombre` = ?, `apellidos` = ?, `usuario` = ?,`claveUsuario` = ?, `permisosUsuario` = ?, `activo` = ? WHERE `backend_usuarios`.`id` = ?")) {
		$query->bind_param('sssssss',$_POST['nombre'],$_POST['apellidos'],$_POST['usuario'],$crypt_pass,$_POST['permisosUsuario'],$_POST['activo'],$_POST['id']);
		$query->execute();
		
	};
	}

	

 ?>