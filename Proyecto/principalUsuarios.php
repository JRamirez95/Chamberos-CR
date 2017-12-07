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
    <title>Principal Usuario</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo-pUs.css">
    
    <?php

     $id = $_SESSION['id'];     

    $con = mysqli_connect("localhost","root","","chamberos") or die ("Error de conexion");
    $consulta = "SELECT * FROM `usuarios` WHERE id = '$id'";
    $ejecutar = mysqli_query($con,$consulta);
    $row = mysqli_fetch_row($ejecutar);

    $result = "SELECT nombre FROM area INNER JOIN areausuario ON area.id = areausuario.idarea WHERE idusuario = $id";
    $eje = mysqli_query($con,$result);    

    $result = "SELECT * FROM diasusuario WHERE idus = $id";
    $dias = mysqli_query($con,$result);   

    $result = "SELECT * FROM trabajousuario WHERE idusuario = $id";
    $par = mysqli_query($con,$result);
    $param = mysqli_fetch_row($par);

    ?>
    
</head>
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
                <div class="avatar"><img src="fotosPerfil/<?php echo $row[9] ?>" alt="..." class="img-fluid rounded-circle" ></div>
                <div class="title">
                    <?php echo "<h1 class='h5'</h1> $row[1] $row[2]<br/>", 
                               "<p>$row[4]</p>" ?>
                    
                </div>

            </div><span class="heading">Menu</span>
            <ul class="list-unstyled">
                <li class="active"><a href="principalUsuarios.php"><i class="fa fa-globe"></i>Presentación</a></li>
                <li>
                    <a href="Mensajes.php"> <i class="fa fa-comment"></i>Mensajes</a>
                </li>
                <li>
                    <a href="#dashvariants" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-film"></i>Multimedia </a>
                    <ul id="dashvariants" class="collapse list-unstyled">
                        <li>
                            <a href="Fotos.php"> <i class="fa fa-photo"></i>Fotos</a>
                        </li>
                        <li>
                            <a href="Videos.php"> <i class="fa fa-video-camera"></i>Videos</a>
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
                    <h2 class="h5 no-margin-bottom fa fa-globe"> Presentación</h2>
                </div>
            </div>          
            <section class="no-padding-top">
                <div class="container-fluid">                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="block">
                                    <div class="title">
                                        <strong>Bibliografía</strong>
                                    </div>
                                    <div class="block-body">
                                        <form class="form-horizontal">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Nombre :</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">   
                                                            <?php echo "<input type='text' disabled='' placeholder='$row[1] $row[2]' class='form-control'</>" ?>                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Correo :</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">   
                                                            <?php echo "<input type='email' disabled='' placeholder='$row[4]' class='form-control'</>" ?>                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Teléfono :</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">   
                                                            <?php echo "<input type='tel' disabled='' placeholder='$row[7]' class='form-control'</>" ?>                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Dirección :</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">   
                                                            <?php echo "<input type='text' disabled='' placeholder='$row[8]' class='form-control'</>" ?>                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Sexo :</label>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-group">   
                                                            <?php echo "<input type='text' disabled='' placeholder='$row[6]' class='form-control'</>" ?>                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                         
                                        </form>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                            <div class="block">
                                    <div class="title">
                                        <strong>Perfil de Trabajo</strong>
                                    </div>
                                    <div class="block-body">
                                        <form class="form-horizontal">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Areas de labor:</label>
                                                <div class="col-sm-6">
                                                <div class="i-checks" style='color:White;'>        
                                                <?php
                                                    while ($row = mysqli_fetch_array($eje)) {
                                                        echo "<label class='fa fa-spinner fa-pulse'></label> $row[0]<br>";				
                                                    }
                                                ?>                                                
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Tipo de trabajo:</label>
                                                <div class="col-sm-6">                                                    
                                                    <div class="i-checks" style='color:White;'>   
                                                        <?php echo "<label class='fa fa-clock-o'></label> $param[2]" ?>                                                       
                                                    </div>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Precio por hora:</label>
                                                <div class="col-sm-6">                                                    
                                                    <div class="i-checks" style='color:White;'>   
                                                        <?php echo "<label class='fa fa-dollar'></label> $param[3]" ?>                                                       
                                                    </div>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Disponibilidad:</label>
                                                <div class="col-sm-6">
                                                <div class="i-checks" style='color:White;'>        
                                                <?php
                                                    while ($row = mysqli_fetch_array($dias)) {                                                       
                                                        echo "<label class='fa fa-check'></label> $row[2]<br>";				
                                                    }
                                                ?>                                                
                                                </div>
                                                </div>
                                            </div>                                         
                                        </form>
                                    </div>
                                </div> 
                            </div>                           
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js">
    </script>
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/usuario.js"></script>
</body>

</html>