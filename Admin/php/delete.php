<?php
	echo $_POST['id_post']; 

	require('../../php/db_conf/conn.php');

	if ($query = $conn->prepare("DELETE FROM backend_usuarios WHERE id = ?")) {
		$query->bind_param('s',$_POST['id_post']);
		$query->execute();

	};


 ?>