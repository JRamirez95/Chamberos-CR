<?php
   session_start(); 
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Configuración de Servicio</title>

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

    <body class="serv">
        <nav class="navbar navbar-expand-lg mb-4 top-bar navbar-static-top sps sps--abv">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse1" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
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
        <br/>

        <section id="plans">
            <div class="container">
                <div class="filtros">
                    <h4 style="width:100%; text-align:center;"><strong>Seleccione los filtros para buscar</strong></h4>                    
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                <small>Provincias</small>
                                    <select class="form-control" onclick="selecCombo(this)" name="id_provincia" id="provinciaCombo">
                                        <?php
                                            echo "<option>Selecione una provincia</option>" ; 
                                            while ($row = mysqli_fetch_array($provincias)) {
                                                echo "<option value='$row[0]'>$row[1]</option>";                                                                                     			
                                            }                                    
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                <small>Cantones</small>
                                    <select class="form-control" onclick="selecCombo(this)" name="id_canton" id="cantonCombo"></select>
                                </div>
                                <div class="col-md-4">
                                <small>Distritos</small>
                                    <select class="form-control" onclick="selecCombo(this)" name="id_distrito" id="distritoCombo"></select>
                                </div>
                                
                            </div>
                        </div>                       
                    </div>
                </div>
                <br>
                <div class="row" id="card"></div>
            </div>
        </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/inicio.js"></script>    
        <script src="js/cards.js"></script> 
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
                            var dis2 = document.getElementById("distritoCombo");
                            dis2.length = 0;

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