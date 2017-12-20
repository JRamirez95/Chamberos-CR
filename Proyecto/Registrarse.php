<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarse</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    
    <?php
    $con = mysqli_connect("localhost","root","","chamberos") or die ("Error de conexion");
    mysqli_set_charset($con,"utf8"); 
    $consult = "SELECT * FROM provincia";         
    $provincias = mysqli_query($con,$consult); 
    ?>

</head>

    <body class="registrarse">

    <nav class="navbar navbar-expand-lg mb-4 top-bar navbar-static-top sps sps--abv">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse1" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mx-auto" href="Inicio.php" style="color: white;">Cham-<span>-Beros</span></a>
            <div class="collapse navbar-collapse" id="navbarCollapse1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" style="color: white;">Volver</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <div class="container">
            <div class="row-fluid main">
                <div class="main-register main-center">
                    <h1 class="text-center title"><strong>Registrarse</strong></h1>
                    <form method="POST" action="log/registrar-usuario.php" class="form-horizontal">
                        <fieldset>                    

                            <div class="form-group">
                                <input type="text" name="nombre" tabindex="2" class="form-control" placeholder="Nombre" required value="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" tabindex="3" class="form-control" placeholder="Email" value="">
                            </div>

                            <div class="form-group">
                                <input type="text" name="usuario" tabindex="4" class="form-control" placeholder="Nombre de Usuario" required value="">
                            </div>

                            <div class="form-group">
                                <input type="password" name="contrasena" tabindex="5" class="form-control" placeholder="Contraseña" required>
                            </div>

                            <div class="form-group">
                                <input type="password" name="contrasena1" tabindex="5" class="form-control" placeholder="Confirme la contraseña" required>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="id_provincia" id="provinciaCombo"> 
                                    <option value="">Provincia</option>                                   
                                  <?php
                                    while ($row = mysqli_fetch_array($provincias)) {                                                                                                               
                                        echo "<option value='$row[0]'> $row[1] </option>";                                                        
                                    }
                                   ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="id_canton" id="cantonCombo">                                                                    
                                    <option value="">Canton</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="id_distrito" id="distritoCombo">
                                    <option value=''>Distrito</option>
                                </select>
                            </div>
                               
                                <!-- Submit -->
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn btn-primary btn-block register-button">Registrarse</button>
                                </div>
                            </div>                             

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
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