<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">

</head>

<?php
// Consultar la base de datos
$con = mysqli_connect("127.0.0.1","root","","chamberos") or die ("Error de conexion");
$consulta = "SELECT * FROM `usuarios`";
$ejecutar = mysqli_query($con,$consulta);

 ?>
<body class="login">

    <nav class="navbar navbar-top hidden-xs">
        <!-- left nav top -->
        <ul class="nav navbar-nav pull-left">

            <li>
                <a href="Inicio.html">
                    <span class="glyphicon glyphicon-chevron-left text-white"></span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="text-white">REPORTES? Llamenos:
                        <b>+506 000000000</b>
                    </span>
                </a>
            </li>
        </ul>
        <div class="dividline light-grey"></div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Iniciar Sesión</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Registrarse</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="principal.html" method="post" role="form" style="display: block;">
                                    <div class="or-box">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <a href="#" class="btn btn-primary btn-block">
                                                    <i class="icon-facebook"></i>    Login with Facebook
                                                </a>
                                            </div>
                                            <hr/>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Usuario" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Recordarme</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Iniciar Sesión">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Olvidó su contraseña?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="principalUsuario.html" tabindex="5" class="forgot-password">Principal Usuario</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-form" action="" method="post" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Nombre de Usuario" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" tabindex="2" class="form-control" placeholder="Nombre" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="lastname" id="lastname" tabindex="3" class="form-control" placeholder="Apellidos" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" id="phone" tabindex="4" class="form-control" placeholder="Telefono" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="" class="form-control" placeholder="Email" value="">
                                    </div>
                                    <div class="form-group">
                                        <div class="myform-middle">
                                            <h2><strong>Tipo de cuenta</strong></h2>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group-combo">
                                            <select id="comboboxTipoCuenta" name="accountType">
                                                <option>Cuenta usuario</option>
                                                <option>Cuenta de servicio </option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <div class="myform-middle">
                                               <h2><strong>Provincia</strong></h2>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group-combo">
                                                <select id="comboboxProvincia" name="province">

                                                    <option>Alajuela</option>
                                                    <option>San José</option>
                                                    <option>Cartago</option>
                                                    <option>Heredia</option>
                                                    <option>Guanacaste</option>
                                                    <option>Puntarenas</option>
                                                    <option>Limón</option>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="" class="form-control" placeholder="Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirm-password" id="confirm-password" tabindex="" class="form-control" placeholder="Confirme Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="" class="form-control btn btn-register" value="Registrarse">
                                                </div>
                                            </div>
                                        </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/login.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>

</html>