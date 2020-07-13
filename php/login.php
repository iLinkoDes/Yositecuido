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

		if($user_eval == "" or $pass_eval == ""){

			echo json_encode(array('error'=> true));
		
		}else{

			$result = $conn->query("SELECT * FROM backend_usuarios WHERE usuario = '".$user_eval."'");
			if(mysqli_num_rows($result) == 0){
				echo json_encode(array('error'=> true));
			}else{

				$conjunto_result = mysqli_fetch_assoc($result);
				if (password_verify($pass_eval, $conjunto_result['claveUsuario'])) {
					$resp = $result->fetch_array();
					echo json_encode(array('error'=> false));
				}else{
					echo json_encode(array('error'=> true));
				}
				
			}
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
