<?php
   session_start();
   
   if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
   
   } else {
      echo "Esta pagina es solo para usuarios registrados.<br>";
      echo "<br><a href='login.php'>Login</a>";
      echo "<br><br><a href='Registrarse.php'>Registrarme</a>";
   
   exit;
   }
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Fotos</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="robots" content="all,follow">
      <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
      <link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/estilo-pUs.css">
   </head>
   <?php
      $id = $_SESSION['id']; 
      $con = mysqli_connect("localhost","root","","chamberos") or die ("Error de conexion");
      
      $result = "SELECT * FROM `usuarios` WHERE id = '$id'";
      $eje = mysqli_query($con,$result);
      $row = mysqli_fetch_row($eje);

      $resultados = "SELECT * FROM fotos WHERE idus = '$id'";        
      $resultado = $con->query($resultados);
      
       ?>
   <body>
      <header class="header">
         <nav class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex align-items-center justify-content-between">
               <div class="navbar-header">
                  <a href="principalUsuarios.php" class="navbar-brand">
                     <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Cham</strong><strong>Bero</strong></div>
                     <div class="brand-text brand-sm"><strong class="text-primary">C</strong><strong>B</strong></div>
                  </a>
                  <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
               </div>
               <ul class="right-menu list-inline no-margin-bottom">
                  <li class="list-inline-item logout"><a id="logout" href="cerrarSesion.php" class="nav-link">Cerrar Sesion <i class="fa fa-sign-out"></i></a></li>
               </ul>
            </div>
         </nav>
      </header>
    <div class="d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="sidebar-header d-flex align-items-center">
               <div class="avatar center-block img-thumbnail" style="background-image: url(fotosPerfil/<?php echo $row[11] ?>)"  alt="..."></div>
               <div class="title">
                  <?php echo "<h1 class='h5'</h1> $row[1] $row[2]<br/>", 
                     "<p>$row[4]</p>" ?>
               </div>
            </div>
            <span class="heading">Menu</span>
            <ul class="list-unstyled">
               <li><a href="principalUsuarios.php"><i class="fa fa-globe"></i>Presentación</a></li>
               
               <li>
                  <a href="#dashvariants" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-film"></i>Multimedia </a>
                  <ul id="dashvariants" class="collapse list-unstyled">
                     <li class="active">
                        <a href="Fotos.php"> <i class="fa fa-photo"></i>Fotos</a>
                     </li>
                     
                  </ul>
               </li>
               <li>
                  <a href="Parametros.php"> <i class="fa fa-cog"></i>Parámetros</a>
               </li>
               <li>
                  <a href="editarPerfil.php"> <i class="fa fa-pencil"></i>Editar Perfil</a>
               </li>
               <li> 
                  <a href="cambiarContrasena.php"> <i class="fa fa-exchange"></i>Cambiar Contraseña</a>
               </li>
               <li>
                  <a href="cerrarSesion.php"> <i class="fa fa-sign-out"></i>Cerrar Sesion</a>
               </li>
            </ul>
        </nav>

        <div class="page-content">
            <div class="page-header">
               <div class="container-fluid">
                  <h2 class="h5 no-margin-bottom fa fa-photo"> Fotos</h2>
               </div>
            </div>
            <ul class="breadcrumb">
                <div class="container-fluid">
                  <li class="breadcrumb-item"><a href="principalUsuarios.php">Perfil</a></li>
                  <li class="breadcrumb-item active">Multimedia</li>
                  <li class="breadcrumb-item active">Foto</li>
                </div>
            </ul>
            
            <section id="portfolio-container" class="padding-60">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <h1 class="padding-b-25" style="color:white;">Galeria</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">      
                            <div style="clear:both;"></div>   
                            <div id="portfolio">

                                <?php
                                    while($datos=$resultado->fetch_array()){                                                    
                                ?>
                                    <div class="tile scale-anm web all flyers">
                                        <img src="fotos/<?php echo $datos[1] ?>" class="img-responsive">
                                    </div>
                                <?php   
                                    }                  
                                ?>                                                         
                        </div>
                    <div style="clear:both;"></div>   
                    </div>
                </div>
            </section>   
        </div>
    </div>
      
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
      <script src="css/bootstrap/js/bootstrap.min.js"></script>
      <script src="js/usuario.js"></script>
   </body>
</html>                             