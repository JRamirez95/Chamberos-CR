<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Registrarse</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
	    crossorigin="anonymous">
	<link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/estilos.css">

</head>

	<?php
	// Consultar la base de datos
	$con = mysqli_connect("localhost","root","","chamberos") or die ("Error de conexion");
	$consulta = "SELECT * FROM `usuarios`";
	$ejecutar = mysqli_query($con,$consulta);

	?>

<body class="registrarse">

<div class="container">
<div class="row-fluid main">
<div class="main-register main-center">
<h1 class="text-center title"><strong>Registrarse</strong></h1>
  <form method = "POST" action = "Registrarse.php" class="form-horizontal">
	<fieldset>
 
      <form id="register-form" action="" method="post" role="form" style="display: none;">      
     
      <div class="form-group">
          <input type="text" name="nombre" id="name" tabindex="2" class="form-control" placeholder="Nombre" required value="">
      </div>
      <div class="form-group">
          <input type="text" name="email" id="lastname" tabindex="3" class="form-control" placeholder="Email" value="">
      </div>

      <form id="register-form" action="" method="post" role="form" style="display: none;">
      <div class="form-group">
          <input type="text" name="usuario" id="username" tabindex="4" class="form-control" placeholder="Nombre de Usuario" required value="">
      </div>  
      
       
          <div class="form-group">
              <input type="password" name="contrasena" id="password" tabindex="5" class="form-control" placeholder="Contraseña" required>
          </div>
		 
		  <div class="form-group">
              <input type="password" name="contrasena1" id="password" tabindex="5" class="form-control" placeholder="Confirme la contraseña" required>
          </div>
  </form>
	  <!-- Submit -->
	  <div class="control-group">
		<div class="controls">
		<button type="submit" name="insert" class="btn btn-primary btn-block register-button">Registrarse</button>
		</div>
      </div>     
	 
	  

	 <?php

	if(isset($_POST['insert'])){			
			$nombre = $_POST['nombre'];
			$usuario = $_POST['usuario'];
			$email = $_POST['email'];            
			$contrasena = $_POST['contrasena'];
			$estado = 'nuevo';            

		$insert = "INSERT INTO usuarios(nombre, usuario, email, contrasena, estado) VALUES ('$nombre','$usuario','$email','$contrasena','$estado')";		

		$ejecutar = mysqli_query($con, $insert);		
		if($ejecutar){
		echo ("Sea ha registrado exitosamente");
		
        echo "<script> window.open('Registrarse.php','_self')</script>";
		}

		}

	?>
 
	</fieldset>
  </form>

  
</div>
	</div>
</div>
   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>