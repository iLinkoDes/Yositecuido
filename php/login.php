<html>
<head>
	<meta charset="utf-8">
</head>
	<body>

		<p>Subido <?php echo $_GET["usuario"]." ". $_GET["clave"]; ?> </p> 
		

	<?php 

		$user_eval= $_GET["usuario"];
		$pass_eval= $_GET["clave"];


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

		$result = $conn->query("SELECT * FROM backend_usuarios WHERE usuario = '".$user_eval."'") or die(mysqli_connect_error());
		if($result->num_rows == 0){
			echo "No";
		}else{
				$row = mysqli_fetch_array($result);
			$db_user = $row['usuario'];
			$db_pass = $row['claveUsuario'];


			if($user_eval==$db_user && password_verify($pass_eval, $db_pass)) {
			     
			    	echo "Si";
			}else{
				echo "no";
			}
		}
		
		$conn->close();

		/*if(mysql_num_rows($validation) == 0){
			echo "Usuario o Contraseña invalidos.";
		}else{

			if(password_verify($_GET["clave"], $validation['claveUsuario'])){
				echo "Bienvenido ".$validation["nombre"].".";
			}else{
				echo "Usuario o Contraseña invalidos.";
			}
		}
*/
		

		
	 
	?>
</body>
</html>
