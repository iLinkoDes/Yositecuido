<?php
	require('../php/sub-redirects/op-redirect.php');
?>
<!doctype html>
<html>
<head>
	<title>#YoCuidoDeTi - Operaciones Dashboard</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="../css/bootstrap.min.css">
	 <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">

	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="../css/style.css">
</head>
	<body>

	<div class="container-full top-bar">
		<nav class="navbar navbar-light" style="min-height: 85px;">
		  <a id="logo" class="navbar-brand ml-5" href="index.html">
		    #YoCuidoDeTi
		  </a>
		  <p class="navbar-brand pr-5 mb-0 ">Panel de Operaciones</p>
		  <button class="btn btn-outline-light mr-5" onclick="location.href = '../php/salir.php';"><i class="fas fa-sign-out-alt"></i><a  style="color:inherit;"> Salir</a></button> 
		</nav>
	</div>
	<div class="container-full all-container">
		<div class="d-flex row p-5" id="wrap-contenido">
			<div class="col-10 mx-auto py-3 px-4">
			
			<!-- CONTENIDO AQUI -->
			<table class="table table-striped table-bordered">
			        	
					  <thead>
					    <tr class="text-center">
					      <th scope="col">ID</th>
					      <th scope="col">Pedido</th>
					      <th scope="col">SKU</th>
					      <th scopr="col">Opciones</th>
					    </tr>
					  </thead>
					  <tbody class="text-center">
					  	<?php
			        	 require('../php/db_conf/conn.php');
			        	 $query = $conn->query("SELECT * FROM pedido_details");
			        	  while($results = mysqli_fetch_array($query)){
			        	  	 ?>
					    <tr>

					      <th scope="row"><?php echo $results['id']; ?></th>

					      <td class="text-center"><?php echo $results['pedidoNumero']; ?></td>
					      <td><?php echo $results['sku']; ?></td>
						
						<td>
							<div class="btn-group" role="group" aria-label="Basic example">
							  <button type="button" class="btn btn-danger" onClick="deleteOPFunction(this.id)" id="<?php echo $results['id']; ?>"><i class="far fa-trash-alt"></i></button>
							</div></td>
					    </tr>
						<?php }  ?>
					  </tbody>
					</table>
			</div>
		</div>
	</div>
	<!-- <a href="php/salir.php">Salir</a> -->
	</body>
	<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
	<script src="https://unpkg.com/@popperjs/core@2"></script>
	<script src="../js/main.js"></script>

	<script>
		function deleteOPFunction(element_id){

			var id = element_id;

			
			$.post('php/deleteOP.php', { id_post: element_id}).done(function(data){
				alert("Producto Eliminado");
				location.reload();

			});
		};
	</script>
</html>

