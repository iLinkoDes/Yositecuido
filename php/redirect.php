<?php 
	session_start();

	if($_SESSION['usuario']['permisosUsuario'] == 0){

			header('Location: ../Admin/AdminDashboard.php');

		}else if($_SESSION['usuario']['permisosUsuario'] == 1){
			header('Location: ../Operaciones/OperacionesDashboard.php');
		{
		else if($_SESSION['usuario']['permisosUsuario'] == 2)
		{
			header('Location: ../Logistica/LogisticaDashboard.php');
		}else
		if($_SESSION['usuario']['permisosUsuario'] == 3){

			header('Location: ../Soporte/SoporteDashboard.php');

		}else
		if($_SESSION['usuario']['permisosUsuario'] == 4){

			header('Location: ../Cliente/ClienteDashboard.php');
		}
 ?>