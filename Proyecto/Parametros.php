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
    <title>Parametros</title>
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
    $consulta = "SELECT * FROM `area`";
    $ejecutar = mysqli_query($con,$consulta);

    $result = "SELECT * FROM `usuarios` WHERE id = '$id'";
    $eje = mysqli_query($con,$result);
    $row = mysqli_fetch_row($eje);
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
                <li class="active">
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
                    <h2 class="h5 no-margin-bottom fa fa-cog"> Parámetros</h2>
                </div>
            </div>

            <ul class="breadcrumb">
                <div class="container-fluid">
                    <li class="breadcrumb-item"><a href="principalUsuarios.php">Perfil</a></li>
                    <li class="breadcrumb-item active">Parámetros</li>
                </div>
             </ul>

            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="block">
                                <div class="title">
                                    <strong>Agregue sus parámatros de trabajo</strong>
                                </div>
                                <div class="block-body">
                                    <form method="POST" class="form-horizontal" action="param.php">
                                                
                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label">Areas de labor :</label>
                                            <div class="col-sm-3">
                                                <div class="i-checks">        
                                                    <?php
                                                        while ($row = mysqli_fetch_array($ejecutar)) {
                                                            echo "<label><input type='checkbox' name='idarea[]' value='$row[0]'/> $row[1] </label><br>";				
                                                        }
                                                    ?>                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                        <label class="col-sm-2 form-control-label">Tipo de trabajo :</label>
                                            <div class="col-sm-3">
                                                <div class="i-checks">
                                                    <input onclick="activar()" id="radioCustom1" type="radio" value="Por hora" name="tipo" class="radio-template">
                                                    <label for="radioCustom1">Por hora</label>
                                                </div>
                                                <div class="i-checks">
                                                    <input onclick="activar()" id="radioCustom2" type="radio"  value="Por contrato" name="tipo" class="radio-template">
                                                    <label for="radioCustom2">Por contrato</label>
                                                </div>
                                                <div class="i-checks">
                                                    <input onclick="activar()" id="radioCustom3" type="radio"  value="Ambas" name="tipo" class="radio-template">
                                                    <label for="radioCustom3">Ambas</label>
                                                </div>
                                            </div> 
                                        </div> 
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label">Precio por hora :</label>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon fa fa-dollar"></span>
                                                        <input type="number" name="precio" id="precio" disabled="" placeholder="" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                        <!--
                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label">Días disponibles :</label>
                                            <div class="col-sm-4">                                                
                                                <div class="i-checks">
                                                    <input id="lunes" type="checkbox" value="" class="checkbox-template">
                                                        <label for="lunes">Lunes</label>
                                                </div>
                                                <div class="i-checks">        
                                                    <input id="martes" type="checkbox" value="" class="checkbox-template">
                                                        <label for="martes">Martes</label>
                                                </div>
                                                <div class="i-checks">        
                                                    <input id="miercoles" type="checkbox" value="" class="checkbox-template">
                                                        <label for="miercoles">Miercoles</label>
                                                </div>       
                                                <div class="i-checks">        
                                                    <input id="jueves" type="checkbox" value="" class="checkbox-template">
                                                        <label for="jueves">Jueves</label>
                                                </div>
                                                <div class="i-checks">        
                                                    <input id="viernes" type="checkbox" value="" class="checkbox-template">
                                                        <label for="viernes">Viernes</label>
                                                </div>
                                                <div class="i-checks">        
                                                    <input id="sabado" type="checkbox" value="" class="checkbox-template">
                                                        <label for="sabado">Sabádo</label>
                                                </div>
                                                <div class="i-checks">        
                                                    <input id="domingo" type="checkbox" value="" class="checkbox-template">
                                                        <label for="domingo">Domingo</label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                                    -->
                                        <div class="form-group row">
                                            <label class="col-sm-2 form-control-label">Días disponibles :</label>
                                            <div class="col-sm-9" >
                                                <label class="checkbox-inline">
                                                    <input id="inlineCheckbox1" name="dia[]" type="checkbox" value="Lunes"> Lunes 
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input id="inlineCheckbox2" name="dia[]" type="checkbox" value="Martes"> Martes
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input id="inlineCheckbox3" name="dia[]" type="checkbox" value="Miercoles"> Miercoles
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input id="inlineCheckbox3" name="dia[]" type="checkbox" value="Jueves"> Jueves
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input id="inlineCheckbox3" name="dia[]" type="checkbox" value="Viernes"> Viernes
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input id="inlineCheckbox3" name="dia[]" type="checkbox" value="sabado"> Sabado
                                                </label>
                                                <label class="checkbox-inline">
                                                    <input id="inlineCheckbox3" name="dia[]" type="checkbox" value="Domingo"> Domingo
                                                </label>
                                            </div>
                                        </div>     

                                        <div class="line"></div>

                                        <div class="form-group row">
                                            <div class="col-sm-9 ml-auto">
                                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                <button onclick="activar()" type="reset" class="btn btn-secondary">Cancelar</button>
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
    <script src="js/param.js"></script>
</body>

</html>