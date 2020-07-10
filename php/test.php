<html>
<body>
	

<p>Subido <?php echo $_GET["nombre"]." ".$_GET["apellidos"]." ". $_GET["user"]." ". $_GET["password"]." ". $_GET["permisosUsuario"]." ". $_GET["activo"]; ?> </p> 

</body>
<?php

$opciones = [
    'cost' => 15,
];
$pass = $_GET["password"];

echo $crypt_pass = password_hash($pass, PASSWORD_BCRYPT, $opciones);
echo "<br><br>";

if (password_verify($pass, $crypt_pass)){
	echo "zy\n<br><br>";
}else{
	echo "ño\n<br><br>";
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yocuidodeti";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo $sql = "INSERT INTO backend_usuarios (nombre, apellidos, usuario, claveUsuario, permisosUsuario, activo) VALUES ('".$_GET["nombre"]."', '".$_GET["apellidos"]."', '". $_GET["user"]."', '". $crypt_pass. "', '".$_GET["permisosUsuario"]."', '".$_GET["activo"]."')";

if ($conn->query($sql) === TRUE) {
  echo "<br><br>Successfully.";
} else {
  echo "<br><br>Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
?>

</html>