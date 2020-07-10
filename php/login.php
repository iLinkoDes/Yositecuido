<?php 

		$user_eval= $_POST["usuario"];
		$pass_eval= $_POST["clave"];


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

		$result = $conn->query("SELECT * FROM backend_usuarios WHERE usuario = '".$user_eval."' AND claveUsuario = '".$pass_eval."'");
		if($result->num_rows == 1){
			
			$resp = $result->mysqli_fetch_array();
			echo json_encode(array('error'=> false));
			
		}else{
			echo json_encode(array('error'=> true));
		}
		
		$conn->close();

		/*if(mysql_num_rows($validation) == 0){
			echo "Usuario o Contraseña invalidos.";
		}else{

			if(password_verify($_POST["clave"], $validation['claveUsuario'])){
				echo "Bienvenido ".$validation["nombre"].".";
			}else{
				echo "Usuario o Contraseña invalidos.";
			}
		}
*/
		

		
	 
?>
