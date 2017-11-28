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
                        <a id="logout" href="login.php" class="nav-link">Cerrar Sesion
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
                <div class="avatar">
                    <img src="img/f.jpg" alt="..." class="img-fluid rounded-circle">
                </div>
                <div class="title">
                    <h1 class="h5">Jonathan Ramírez</h1>
                    <p>Web Designer</p>
                </div>

            </div>
            <span class="heading">Menu</span>
            <ul class="list-unstyled">
                <li><a href="principalUsuarios.php"><i class="fa fa-info-circle"></i>Bibliografía</a></li>
                <li><a href="Mensajes.php"><i class="fa fa-comment"></i>Mensajes</a></li>
                <li><a href="#dashvariants" aria-expanded="false" data-toggle="collapse"><i class="fa fa-film"></i>Multimedia </a>
                    <ul id="dashvariants" class="collapse list-unstyled">
                        <li><a href="#"><i class="fa fa-photo"></i>Fotos</a></li>
                        <li><a href="#"><i class="fa fa-video-camera"></i>Videos</a></li>
                    </ul>
                </li>
                <!-- <li> <a href="#"> <i class="fa fa-photo"></i>Fotos</a></li>-->
                <li><a href="Parametros.php"><i class="fa fa-cog"></i>Parametros</a></li>
                <li class="active"><a href="#"><i class="fa fa-edit"></i>Editar Información</a></li>
                <li><a href="login.php"><i class="fa fa-sign-out"></i>Cerrar Sesion</a></li>
            </ul>
        </nav>

        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom fa fa-edit"> Editar Perfil</h2>
                </div>
            </div>

            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Form Elements -->
                        <div class="col-lg-12">
                            <div class="block">
                                <div class="title">
                                    <strong>Edite su información</strong>
                                </div>
                                <div class="block-body">
                                    <form class="form-horizontal">
                                       
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Nombre :</label>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon fa fa-user"></span>
                                                        <input type="text" placeholder="" required class="form-control">
                                                    </div>
                                                </div>                                  
                                            </div>                                            
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Apellidos :</label>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon fa fa-user"></span>
                                                        <input type="text" placeholder="" class="form-control">
                                                    </div>
                                                </div>                                  
                                            </div>                                            
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Nombre de Usuario:</label>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon fa fa-users"></span>
                                                        <input type="text" disabled="" placeholder="jona" class="form-control">
                                                    </div>
                                                </div>                                  
                                            </div>                                            
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Correo :</label>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon fa fa-at"></span>
                                                        <input type="email" disabled="" placeholder="jona@gmail.com" class="form-control">
                                                    </div>
                                                </div>                                  
                                            </div>                                            
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Contraseña :</label>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon fa fa-key"></span>
                                                        <input type="password" placeholder="" class="form-control">
                                                    </div>
                                                </div>                                  
                                            </div>                                            
                                    </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label">Sexo :</label>
                                            <div class="col-sm-9">                                               
                                                <div>
                                                    <input id="optionsRadios2" type="radio" value="Hombre" name="optionsRadios">
                                                    <label for="optionsRadios2">Hombre</label>
                                                </div>
                                                <div>
                                                    <input id="optionsRadios2" type="radio" value="Mujer" name="optionsRadios">
                                                    <label for="optionsRadios2">Mujer</label>
                                                </div>
                                            </div>
                                        </div>                                      
                                        
                                        <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Dirección :</label>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon fa fa-map-marker"></span>
                                                        <textarea type="textarea" placeholder="" class="form-control"></textarea>
                                                    </div>
                                                </div>                                  
                                            </div>                                            
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Bibliografía :</label>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon fa fa-info-circle"></span>
                                                        <textarea type="textarea" placeholder="" class="form-control"></textarea>
                                                    </div>
                                                </div>                                  
                                            </div>                                            
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 form-control-label">Area :</label>
                                            <div class="col-sm-5 select">
                                                <select name="account" class="form-control">
                                                    <option></option>
                                                    <option>Jardinero</option>
                                                    <option>Plomero</option>
                                                    <option>Albañíl</option>
                                                    <option>Pintor</option>
                                                </select>
                                            </div>                                            
                                        </div>                               

                                        <div class="form-group row">
                                        <label class="col-sm-3 form-control-label">Subir Foto :</label>
                                            <div class="col-sm-9 ml-auto">                                  
                                            <input type="file" />                                                                                     
                                            </div>
                                        </div>

                                        <div class="line"></div>

                                        <div class="form-group row">
                                            <div class="col-sm-9 ml-auto">
                                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                <button type="submit" class="btn btn-secondary">Cancelar</button>                                                
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
</body>

</html>