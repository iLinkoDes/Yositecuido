<?php 
session_start();

	if(isset($_SESSION['usuario'])){
		echo "<script>console.log('Logged In');</script>";


		if($_SESSION['usuario']['permisosUsuario'] == 0){
			//echo "<script>console.log('Si Admin');</script>";
			header('Location: ../Admin/AdminDashboard.php');
		}else if($_SESSION['usuario']['permisosUsuario'] == 1){
			//echo "<script>console.log('Si Admin');</script>";
			header('Location: ../Operaciones/OperacionesDashboard.php');	
		}else if($_SESSION['usuario']['permisosUsuario'] == 2){
			//echo "<script>console.log('Si Admin');</script>";
			header('Location: ../Logistica/LogisticaDashboard.php');	
		}else if($_SESSION['usuario']['permisosUsuario'] == 3){
			//echo "<script>console.log('Si Admin');</script>";
			header('Location: ../Soporte/SoporteDashboard.php');
		}else if($_SESSION['usuario']['permisosUsuario'] == 4){
			//echo "<script>console.log('Si Admin');</script>";
			//header('Location: ../Cliente/ClienteDashboard.php');
		}
	}else{
		echo "<script>console.log('Not Logged In');</script>";
		header('Location: ../index.html');
	}
 ?>