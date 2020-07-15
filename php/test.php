<?php

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	require("db_conf/conn.php");

	$opciones = [
	    'cost' => 15,
	];

 	// Charset de datos arrojados por la base de datos
	$conn->set_charset('utf8');

	$nombre = $conn->real_escape_string($_POST["nombre"]);
	$apellidos = $conn->real_escape_string($_POST["apellidos"]);
	$usuario = $conn->real_escape_string($_POST["user"]);
	$pass = $conn->real_escape_string($_POST["password"]);
	$permiso = $conn->real_escape_string($_POST["permisosUsuario"]);
	$activo = $conn->real_escape_string($_POST["activo"]);

	$crypt_pass = password_hash($pass, PASSWORD_BCRYPT, $opciones);

	$insercion = $conn->prepare("INSERT INTO backend_usuarios (nombre, apellidos, usuario, claveUsuario, permisosUsuario, activo) VALUES (?, ?, ?, ?, ?, ?)");
	$insercion->bind_param('ssssii', $nombre, $apellidos, $usuario, $crypt_pass, $permiso, $activo);
	if(!$insercion->execute()){
		echo json_encode(array('error'=> true));
	}else{
		echo json_encode(array('error'=> false));
	}

}



/*

$sql = "INSERT INTO backend_usuarios (nombre, apellidos, usuario, claveUsuario, permisosUsuario, activo) VALUES ('".$_POST["nombre"]."', '".$_POST["apellidos"]."', '". $_POST["user"]."', '". $crypt_pass. "', '".$_POST["permisosUsuario"]."', '".$_POST["activo"]."')";

if ($conn->query($sql) === TRUE) {
  echo "<br><br>Successfully.";
} else {
  echo "<br><br>Error: " . $sql . "<br>" . $conn->error;
}

*/

$conn->close();
?>