<?php
	require('../php/sub-redirects/admin-redirect.php');
?>
<!doctype html>
<html>
<head>
	<title>#YoCuidoDeTi - Admin Dashboard</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="../css/bootstrap.min.css">
	 <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">

	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="../css/style.css">
	<style>
		#success_message{
			visibility: hidden;
			width: 800px;
			position: fixed;
			z-index: 10;
			right: 30%;
			bottom: 0;
		}
	</style>
</head>
	<body>
	<div id="success_message" class="ajax_response alert alert-success text-center">Usuario Actualizado</div>
	<div class="container-full top-bar">
		<nav class="navbar navbar-light" style="min-height: 85px;">
		  <a id="logo" class="navbar-brand ml-5" href="AdminDashboard.php">
		    #YoCuidoDeTi
		  </a>
		  <p class="navbar-brand pr-5 mb-0 ">Panel de Administrador</p>
		  <button class="btn btn-outline-light mr-5" onclick="location.href = '../php/salir.php';"><i class="fas fa-sign-out-alt"></i><a  style="color:inherit;"> Salir</a></button> 
		</nav>
	</div>
	<div class="container-full all-container">
		<div class="d-flex row p-5" id="wrap-contenido">
			<!--<div class="col-8 ml-auto mr-4 py-4 px-4">
				<h2 class="text-center">Contenido para Administradores</h2>
				<p class="px-3 py-3" >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sit amet nulla facilisi morbi tempus iaculis. Mauris in aliquam sem fringilla ut morbi tincidunt. Aliquam id diam maecenas ultricies mi eget mauris pharetra et. Hac habitasse platea dictumst vestibulum. In fermentum posuere urna nec tincidunt praesent semper feugiat. Mattis pellentesque id nibh tortor id aliquet. Id diam maecenas ultricies mi eget. Integer vitae justo eget magna fermentum. Quis commodo odio aenean sed adipiscing diam. Dolor sed viverra ipsum nunc aliquet bibendum enim. <br><br>

				Eget nunc scelerisque viverra mauris in aliquam sem fringilla. Enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Ultrices mi tempus imperdiet nulla. Dui id ornare arcu odio ut sem nulla pharetra diam. Massa id neque aliquam vestibulum morbi blandit. Dui nunc mattis enim ut tellus elementum sagittis. Pellentesque habitant morbi tristique senectus et netus et malesuada. Felis imperdiet proin fermentum leo vel orci porta non. Praesent tristique magna sit amet purus gravida quis blandit turpis. Quisque sagittis purus sit amet volutpat consequat mauris nunc congue. Mauris pharetra et ultrices neque ornare aenean. Posuere urna nec tincidunt praesent semper feugiat nibh. Consequat semper viverra nam libero justo. Et ligula ullamcorper malesuada proin libero nunc consequat interdum. Et odio pellentesque diam volutpat commodo sed..</p>
			</div> -->
			
			<!--Accordion wrapper-->
			<div class="accordion md-accordion col-8  mr-4 px-0" id="accordionEx" role="tablist" aria-multiselectable="true">

			  <!-- Administradores -->
			  <div class="card">

			    <!-- Card header -->
			    <div class="card-header" role="tab" id="headingOne1">
			      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
			        aria-controls="collapseOne1">
			        <h5 class="mb-0">
			          Contenido para Administradores <i class="float-right fas fa-angle-down rotate-icon"></i>
			        </h5>
			      </a>
			    </div>

			    <!-- Card body -->
			    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
			      data-parent="#accordionEx">
			      <div class="card-body">
			      	<table class="table table-striped table-bordered">
			        	
					  <thead>
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Nombre</th>
					      <th scope="col">Apellido</th>
					      <th scope="col">Usuario</th>
					      <th scopr="col">Contraseña</th>
					      <th scopr="col">Permiso</th>
					      <th scopr="col">Estado</th>
					      <th scope="col">Opciones</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
			        	 require('../php/db_conf/conn.php');
			        	 $query = $conn->query("SELECT * FROM backend_usuarios");
			        	  while($results = mysqli_fetch_array($query)){
			        	  	 ?>
					    <tr>
						<form class="update" action="" method="POST">
					      <td><input name="id" value="<?php echo $results['id']; ?>" onlyread style="border: none; background: inherit; width: 30px; color: #000; cursor: default;" ></td>
					      <td><input type="text" name="nombre" value="<?php echo $results['nombre']; ?>" class="grid-filter" required></td>
					      <td><input type="text" name="apellidos" value="<?php echo $results['apellidos']; ?> " class="grid-filter" required> </td>
					      <td><input type="text" name="usuario" value="<?php echo $results['usuario']; ?>" class="grid-filter" required></td>
					      <td><input type="password" name="password" value="" placeholder="Contraseña" class="grid-filter"></td>
					      <td><select class="custom-select" name="permisosUsuario" required>
						  <option value="4" <?php if ($results['permisosUsuario']==4)echo "selected"; ?>>Cliente</option>
						  <option value="3" <?php if ($results['permisosUsuario']==3)echo "selected"; ?>>Soporte</option>
						  <option value="2" <?php if ($results['permisosUsuario']==2)echo "selected"; ?>>Logistica</option>
						  <option value="1" <?php if ($results['permisosUsuario']==1)echo "selected"; ?>>Operaciones</option>
						  <option value="0" <?php if ($results['permisosUsuario']==0)echo "selected"; ?>>Administrador</option>
						</select></td>
						<td><select class="custom-select" name="activo" required>
						  <option value="1" <?php if ($results['activo']==1)echo "selected"; ?>>Activo</option>
						  <option value="0" <?php if ($results['activo']==0)echo "selected"; ?>>Inactivo</option>
						  
						</select></td>
						<td>
							<div class="btn-group" role="group" aria-label="Basic example">
							  <button type="submit" class="update btn btn-warning" id="<?php echo $results['id']; ?>"><i class="far fa-edit"></i></button>
							  <button type="submit" class="btn btn-danger" id="<?php echo $results['id']; ?>" onClick="deleteFunction(this.id)"><i class="far fa-trash-alt"></i></button>
							</div></td>
						</form>
					    </tr>
						<?php }  ?>
					  </tbody>
					</table>
			        
			      </div>
			    </div>

			  </div>
			  <!-- END Administradores -->

			  <!-- Operaciones -->
			  <div class="card">

			    <!-- Card header -->
			    <div class="card-header" role="tab" id="headingTwo2">
			      <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
			        aria-expanded="false" aria-controls="collapseTwo2">
			        <h5 class="mb-0">
			          Contenido para Operaciones <i class="float-right fas fa-angle-down rotate-icon"></i>
			        </h5>
			      </a>
			    </div>

			    <!-- Card body -->
			    <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
			      data-parent="#accordionEx">
			      <div class="card-body">
			        <table class="table table-striped table-bordered">
			        	
					  <thead>
					    <tr class="text-center">
					      <th scope="col">ID</th>
					      <th scope="col">Pedido</th>
					      <th scope="col">SKU</th>
					      <th scope="col">Opciones</th>
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
			  <!-- END Operaciones -->

			  <!-- Logistica -->
			  <div class="card">

			    <!-- Card header -->
			    <div class="card-header" role="tab" id="headingThree3">
			      <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
			        aria-expanded="false" aria-controls="collapseThree3">
			        <h5 class="mb-0">
			          Contenido para Logistica <i class="float-right fas fa-angle-down rotate-icon"></i>
			        </h5>
			      </a>
			    </div>

			    <!-- Card body -->
			    <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
			      data-parent="#accordionEx">
			      <div class="card-body">
			        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
			        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
			        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
			        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
			        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
			        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
			        labore sustainable VHS.
			      </div>
			    </div>

			  </div>
			  <!-- END Logistica -->

			  <!-- Accordion card -->
			  <div class="card">

			    <!-- Card header -->
			    <div class="card-header" role="tab" id="headingThree3">
			      <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree4"
			        aria-expanded="false" aria-controls="collapseThree3">
			        <h5 class="mb-0">
			          Contenido para Soporte <i class="float-right fas fa-angle-down rotate-icon"></i>
			        </h5>
			      </a>
			    </div>

			    <!-- Card body -->
			    <div id="collapseThree4" class="collapse" role="tabpanel" aria-labelledby="headingThree4"
			      data-parent="#accordionEx">
			      <div class="card-body">
			        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
			        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
			        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
			        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
			        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
			        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
			        labore sustainable VHS.
			      </div>
			    </div>

			  </div>
			  <!-- Accordion card -->

			  <!-- Accordion card -->
			  <div class="card">

			    <!-- Card header -->
			    <div class="card-header" role="tab" id="headingThree3">
			      <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree5"
			        aria-expanded="false" aria-controls="collapseThree3">
			        <h5 class="mb-0">
			          Contenido para Cliente <i class="float-right fas fa-angle-down rotate-icon"></i>
			        </h5>
			      </a>
			    </div>

			    <!-- Card body -->
			    <div id="collapseThree5" class="collapse" role="tabpanel" aria-labelledby="headingThree5"
			      data-parent="#accordionEx">
			      <div class="card-body">
			        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
			        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
			        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
			        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
			        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
			        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
			        labore sustainable VHS.
			      </div>
			    </div>

			  </div>
			  <!-- Accordion card -->

			</div>
<!-- Accordion wrapper -->

			<div class="col-3 mr-auto">
				<h4 class="text-center py-4">Agregar Usuarios</h4>
				<form id="add_users" action="" method="post">
				  <div class="form-group">
				    <label for="">Nombre:</label>
				    <input type="text" name="nombre" class="form-control" required pattern="[A-Za-z0-9_-]{1,20}">
				  </div>
				  <div class="form-group">
				    <label for="">Apellidos:</label>
				    <input type="text" class="form-control" name="apellidos" required pattern="[A-Za-z0-9_-]{1,20}">
				  </div>
				  <div class="form-group">
				    <label for="">Usuario:</label>
				    <input type="text" class="form-control" name="user" required pattern="[A-Za-z0-9_-]{1,20}">
				  </div>
				  <div class="form-group">
				    <label for="">Contraseña:</label>
				    <input type="password" class="form-control" name="password" required pattern="[A-Za-z0-9_-]{1,20}">
				  </div>
				  <div class="row">
				  	<div class="col-6">
				  		<label for="">Permisos:</label>
					  	<select class="custom-select" name="permisosUsuario" required>
					  	  <option value="" default>-- Selecciona --</option>
						  <option value="4">Cliente</option>
						  <option value="3">Soporte</option>
						  <option value="2">Logistica</option>
						  <option value="1">Operaciones</option>
						  <option value="0">Administrador</option>
						</select>
					</div>
					<div class="col-6">
						<label for="">Estado de Usuario:</label>
						<select class="custom-select" name="activo" required>
						  <option value="" default>-- Selecciona --</option>
						  <option value="0">Inactivo</option>
						  <option value="1">Activo</option>
						</select>
					</div>
				  </div>
				  <input id="submit" type="submit" class="btn btn-primary float-right my-4 mr-3 mb-0" value="Submit">
				</form>
			
			</div>
		</div>
		
		<div class="error alert alert-success text-center" role="alert" style="position: fixed; z-index: 9; top:100%; width: 100%;">
		 	Se ha agregado un nuevo usuario con exito.
		</div>
	</div>

	
	</body>
	<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
	<script src="https://unpkg.com/@popperjs/core@2"></script>
	<script src="../js/form.js"></script>

	<script>

	$( document ).ready(function() {

	  $('.update').submit(function (event) {
	  	event.preventDefault();

	  	jQuery.ajax({
		  url: 'php/update.php',
		  type: 'POST',
		  dataType: 'json',
		  data: $(this).serialize(),
		  beforeSend: function(){
		  	}
		  })
		  .done(function(resp) {
		   	alert("Usuario Actualizado");
		  })
		  .fail(function(resp) {
		    console.log(resp.responseText);
		  })
		  .always(function() {
		  	
		  });
		});

	});

	function deleteOPFunction(element_id){

			var id = element_id;

			
			$.post('php/deleteOP.php', { id_post: element_id}).done(function(data){
				alert("Producto eliminado");
				location.reload();

			});
		};

		function deleteFunction(element_id){

			var id = element_id;

			
			$.post('php/delete.php', { id_post: element_id}).done(function(data){
				alert("Usuario eliminado");
				location.reload();

			});
		};

	</script>
</html>