<?php
	if (isset($_GET['submit'])) {
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
	}
	?>


<form action="?" method="get">
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
</form>	
