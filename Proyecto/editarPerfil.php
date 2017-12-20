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
        <title>Editar Perfil</title>
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
      mysqli_set_charset($con,"utf8");
      $consulta = "SELECT u.nombre, u.apellido, u.usuario, u.email, u.sexo, u.telefono, p.provincia, c.canton, d.distrito, u.foto FROM usuarios u, provincia p, canton c, distrito d WHERE u.idprovincia = p.idp AND u.idcanton = c.id AND u.iddistrito = d.id AND u.id = '$id'";
      
      $ejecutar = mysqli_query($con,$consulta);
      $row = mysqli_fetch_row($ejecutar);  

      $provincia=$row[6]; $canton=$row[7]; $distrito=$row[8];

      $consult = "SELECT * FROM provincia";         
      $provincias = mysqli_query($con,$consult); 
      ?>

        <body>
            <header class="header">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid d-flex align-items-center justify-content-between">
                        <div class="navbar-header">
                            <a href="principalUsuarios.php" class="navbar-brand">
                                <div class="brand-text brand-big visible text-uppercase">
                                    <strong class="text-primary">Cham</strong><strong>Bero</strong>
                                </div>
                                <div class="brand-text brand-sm">
                                    <strong class="text-primary">C</strong>
                                    <strong>B</strong>
                                </div>
                            </a>
                            <button class="sidebar-toggle">
                                <i class="fa fa-long-arrow-left"></i>
                            </button>
                        </div>
                        <ul class="right-menu list-inline no-margin-bottom">
                            <li class="list-inline-item logout">
                                <a id="logout" href="cerrarSesion.php" class="nav-link">Cerrar Sesion
                     <i class="fa fa-sign-out"></i>
                     </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <div class="d-flex align-items-stretch">
                <nav id="sidebar">
                    <div class="sidebar-header d-flex align-items-center">
                        <div class="avatar center-block img-thumbnail" style="background-image: url(fotosPerfil/<?php echo $row[9] ?>)" alt="..."></div>
                        <div class="title">
                            <?php echo "<h1 class='h5'</h1> $row[0] $row[1]<br/>", 
                        "<p>$row[3]</p>" ?>
                        </div>
                    </div>
                    <span class="heading">Menu</span>
                    <ul class="list-unstyled">
                        <li><a href="principalUsuarios.php"><i class="fa fa-globe"></i>Presentación</a></li>                        
                        <li>
                            <a href="#dashvariants" aria-expanded="false" data-toggle="collapse"><i class="fa fa-film"></i>Multimedia </a>
                            <ul id="dashvariants" class="collapse list-unstyled">
                                <li>
                                    <a href="Fotos.php"> <i class="fa fa-photo"></i>Fotos</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li><a href="Parametros.php"><i class="fa fa-cog"></i>Parámetros</a></li>
                        <li class="active"><a href="editarPerfil.php"><i class="fa fa-edit"></i>Editar Información</a></li>
                        <li>
                            <a href="cambiarContrasena.php"> <i class="fa fa-exchange"></i>Cambiar Contraseña</a>
                        </li>
                        <li><a href="cerrarSesion.php"><i class="fa fa-sign-out"></i>Cerrar Sesion</a></li>
                    </ul>
                </nav>
                <div class="page-content">
                    <div class="page-header">
                        <div class="container-fluid">
                            <h2 class="h5 no-margin-bottom fa fa-edit"> Editar Perfil</h2>
                        </div>
                    </div>
                    <ul class="breadcrumb">
                        <div class="container-fluid">
                            <li class="breadcrumb-item"><a href="principalUsuarios.php">Perfil</a></li>
                            <li class="breadcrumb-item active">Editar Información</li>
                        </div>
                    </ul>
                    <section class="no-padding-top">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="block">
                                        <div class="title">
                                            <strong>Edite su información</strong>
                                        </div>
                                        <div class="block-body">
                                            <form method="POST" action="log/editar.php" enctype="multipart/form-data" class="form-horizontal">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 form-control-label">Nombre :</label>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon fa fa-user"></span>
                                                                <input type="text" name="nombre" placeholder="" value="<?php echo $row[0] ?>" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 form-control-label">Apellidos :</label>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon fa fa-user"></span>
                                                                <input type="text" name="apellido" placeholder="" value="<?php echo $row[1] ?>" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 form-control-label">Nombre de Usuario :</label>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon fa fa-users"></span>
                                                                <input type="text" disabled="" placeholder="<?php echo $row[2] ?>" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 form-control-label">Correo :</label>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon fa fa-at"></span>
                                                                <input type="email" disabled="" placeholder="<?php echo $row[3] ?>" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 form-control-label">Sexo :</label>
                                                    <div class="col-sm-8">
                                                        <div>
                                                            <input name="sexo" id="optionsRadios1" type="radio" value="Hombre" <?php if($row[4]=="Hombre" ){ echo "checked=checked";} ?> />
                                                            <label for="optionsRadios1">Hombre</label>
                                                        </div>
                                                        <div>
                                                            <input name="sexo" id="optionsRadios2" type="radio" value="Mujer" <?php if($row[4]=="Mujer" ){ echo "checked=checked";} ?> />
                                                            <label for="optionsRadios2">Mujer</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 form-control-label">Teléfono :</label>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon fa fa-phone"></span>
                                                                <input type="tel" name="telefono" placeholder="" value="<?php echo $row[5] ?>" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 form-control-label">Provincia :</label>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon fa fa-map-marker"></span>
                                                                <select class="form-control" name="id_provincia" id="provinciaCombo">
                                                                    <option value=''> <?php echo $provincia ?></option>
                                                                    <?php
                                                                        while ($row = mysqli_fetch_array($provincias)) {                                                                                                               
                                                                        echo "<option value='$row[0]'> $row[1] </option>";                                                        
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 form-control-label">Cantón :</label>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon fa fa-map-marker"></span>
                                                                <select class="form-control" name="id_canton" id="cantonCombo">                                                                    
                                                                    <option value=""><?php echo $canton ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 form-control-label">Distrito :</label>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon fa fa-map-marker"></span>
                                                                <select class="form-control" name="id_distrito" id="distritoCombo">
                                                                <option value=''><?php echo $distrito ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 form-control-label">Subir Foto :</label>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon fa fa-image"></span>
                                                                <input class="form-control" name="imagen" type="file" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="line"></div>
                                                <div class="form-group row">
                                                    <div class="col-sm-9 ml-auto">
                                                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                        <button type="reset" class="btn btn-secondary">Cancelar</button>
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
            <script src="css/bootstrap/js/bootstrap.min.js"></script>
            <script src="js/usuario.js"></script>
            <script>               
                var comboProvincia = document.getElementById('provinciaCombo');
                comboProvincia.onchange = function() {
                    $.post("log/buscarCanton.php", {
                            provincia: document.getElementById('provinciaCombo').value
                        },
                        function(mensaje) {
                            var lista = JSON.parse(mensaje);
                            var dis = document.getElementById("cantonCombo");
                            dis.length = 0;

                            for (var i = 0; i < lista.length; i++) {
                                var option = document.createElement('option');
                                option.setAttribute("value", lista[i].id);
                                option.innerHTML = lista[i].nombre;
                                dis.appendChild(option);
                            }
                        });
                }
            </script>
            <script>
                var comboCanton = document.getElementById('cantonCombo');
                comboCanton.onchange = function() {
                    $.post("log/buscarDistrito.php", {
                            canton: document.getElementById('cantonCombo').value
                        },
                        function(mensaje) {
                            var lista = JSON.parse(mensaje);
                            var dis = document.getElementById("distritoCombo");
                            dis.length = 0;

                            for (var i = 0; i < lista.length; i++) {
                                var option = document.createElement('option');
                                option.setAttribute("value", lista[i].id);
                                option.innerHTML = lista[i].nombre;
                                dis.appendChild(option);
                            }
                        });
                }
            </script>
        </body>

    </html>