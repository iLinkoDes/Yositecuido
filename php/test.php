<?php

$opciones = [
    'cost' => 15,
];
$pass = $_POST["password"];

echo $crypt_pass = password_hash($pass, PASSWORD_BCRYPT, $opciones);
echo "<br><br>";

if (password_verify($pass, $crypt_pass)){
	echo "zy\n<br><br>";
}else{
	echo "ño\n<br><br>";
}

require("db_conf/conn.php");

$sql = "INSERT INTO backend_usuarios (nombre, apellidos, usuario, claveUsuario, permisosUsuario, activo) VALUES ('".$_POST["nombre"]."', '".$_POST["apellidos"]."', '". $_POST["user"]."', '". $crypt_pass. "', '".$_POST["permisosUsuario"]."', '".$_POST["activo"]."')";

if ($conn->query($sql) === TRUE) {
  echo "<br><br>Successfully.";
} else {
  echo "<br><br>Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();

header('Location: ../redirect.php');
?>