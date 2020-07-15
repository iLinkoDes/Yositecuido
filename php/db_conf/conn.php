<?php 
// Datos de Base de Datos

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yocuidodeti";

// Conexion a Base de Datos
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificacion de Conexion
if ($conn->connect_error) {
	// En caso de Conexion fallida, enviar error de conexion a consola
  die("Connection failed: " . $conn->connect_error);
}
 ?>