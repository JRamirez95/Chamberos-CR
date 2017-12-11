<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Configuración de Servicio</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
             crossorigin="anonymous">          
        <link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/estilos.css">

      <?php
         $con = mysqli_connect("localhost","root","","chamberos") or die ("Error de conexion");
         
         $consulta = "SELECT * FROM `usuarios` ";
         
         $resultado = $con->query($consulta);
         
         ?>
   </head>
   <body class = "serv">
      <nav class="navbar navbar-expand-lg mb-4 top-bar navbar-static-top sps sps--abv">
         <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse1" aria-controls="navbarCollapse"
               aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <span class="navbar-brand mx-auto" href="#" style="color: black;">Configuración de Servicio</span>
            <div class="collapse navbar-collapse" id="navbarCollapse1">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="Inicio.php" style="color: black;">Inicio</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <br>
      <br>
      <br>
      <br>
     
      <section id="plans">
        <div class="container">
            <div class="row">
      <?php 
        while($datos=$resultado->fetch_array()){           
        ?>
        
      <div class="col-md-4 text-center">
            <div class="panel panel-pricing">
                <div class="panel-heading">                
                <div class="avatar center-block img-thumbnail" style="background-image: url(fotosPerfil/<?php echo $datos[9] ?>)"  alt="..."></div>
                    <h3><?php echo $datos[1]," ", $datos[2] ?></h3>
                </div>
                <div class="panel-body text-center">
                    <p><?php echo $datos[4] ?></p>
                </div>
                <ul class="list-group text-left">
                    <li class="list-group-item"><i class="fa fa-genderless"></i> <?php echo $datos[6]?></li>
                    <li class="list-group-item"><i class="fa fa-phone"></i> <?php echo $datos[7]?></li>
                    <li class="list-group-item"><i class="fa fa-map-marker"></i> <?php echo $datos[8]?></li>                    
                </ul>
                <div class="panel-footer">
                    <a class="btn btn-lg btn-block btn-primary" href="#">Ver</a>
                </div>
            </div>
            <br>
        </div>
        
        <?php   
        }
        
        ?>

</div>
        </div>
    </section>
     
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>        
    <script src="js/bootstrap.min.js"></script>
    <script src="js/inicio.js"></script>
   </body>
</html>