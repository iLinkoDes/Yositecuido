<?php 

/*

Codigo Obsoleto, uso solamente referencial

// Consulta a base de datos
$result = $conn->query("SELECT * FROM backend_usuarios WHERE usuario = '".$user_eval."'");

// Si la consulta no arroja resultados, activar error para prevenir inicio de sesion
if(mysqli_num_rows($result) == 0){
	echo json_encode(array('error'=> true));
}else{
	// En caso de que haya resultado, asociar el resultado a una variable para evaluar contraseña
	$conjunto_result = mysqli_fetch_assoc($result);

	// Evaluar si la contraseña enviada concuerda con la cifrada dentro de la base de datos
	if (password_verify($pass_eval, $conjunto_result['claveUsuario'])) {
		$resp = $result->fetch_array();
		echo json_encode(array('error'=> false));
	}else{
		echo json_encode(array('error'=> true));
	}
	
}*/

// Evaluacion de consulta iniciada tipo AJAX e Inicia consulta limpia de SQL Injection
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	// Conexion a Base de Datos
	require("db_conf/conn.php");
	
	session_start();
	// Charset de datos arrojados por la base de datos
	$conn->set_charset('utf8');

	// Inicializando variables para validar con datos provenientes de formulario
	$user_eval = $conn->real_escape_string($_POST["usuario"]);
	$pass_eval = $conn->real_escape_string($_POST["clave"]);

	// Inicia Consulta 
	if($consulta = $conn->prepare("SELECT * FROM backend_usuarios WHERE usuario = ?")){
		$consulta->bind_param('s',$user_eval);
		$consulta->execute();

		// Analizar resultado de consulta
		$resultado_consulta = $consulta->get_result();
		// Si la consulta no arroja resultado, devuelve error => true
		if ($resultado_consulta->num_rows == 0) {
			echo json_encode(array('error'=> true));

			// Si la consulta obtuvo coincidencias, evaluar la contraseña enviada.
		} else {
			$conjunto_resultado = mysqli_fetch_assoc($resultado_consulta);
			if (password_verify($pass_eval, $conjunto_resultado['claveUsuario'])) {

				$resp = $resultado_consulta->fetch_array();
				$_SESSION['usuario'] = $conjunto_resultado;
				unset($_SESSION['usuario']['claveUsuario']);
				unset($_SESSION['usuario']['activo']);

				echo json_encode(array('error'=> false));
			}else{
				echo json_encode(array('error'=> true));
			}
		}
	}
}

// Cerrar Conexion a base de datos
$conn->close();
?>
