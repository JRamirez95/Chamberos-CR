<?php
   session_start();   
        $provincia = $_POST['id_provincia'];   
   ?>
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
         mysqli_set_charset($con,"utf8");
         $consulta = "SELECT * FROM usuarios WHERE idprovincia = $provincia";         
         $resultado = $con->query($consulta); 
         
         $result = "SELECT * FROM canton WHERE idprovincia = $provincia";         
         $cantones = mysqli_query($con,$result);
         
         $res = "SELECT * FROM distrito ";         
         $distritos = mysqli_query($con,$res);
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
      <br/>     
      
      <section id="plans">
        <div class="container">
            <div class="form-group row">                        
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="form-control" name="id_canton" id="cantonCombo">                                                                           
                                <?php
                                    while ($row = mysqli_fetch_array($cantones)) {
                                    echo "<option value='$row[0]'>$row[1]</option>";                                                   			
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <select class="form-control" name="id_distrito" id="distritoCombo"></select>  
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-success" type="submit">
                                <span class="fa fa-search" aria-hidden="true"><span style="margin-left:10px;">Buscar</span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

                <br>
                <br>

            <div class="row">
                <?php 
                  while($datos=$resultado->fetch_array()){                    
                ?>
               <div class="col-md-4 text-center">
                  <div class="panel panel-pricing">
                     <div class="panel-heading">
                        <div class="avatar center-block img-thumbnail" style="background-image: url(fotosPerfil/<?php echo $datos[11] ?>)"  alt="..."></div>
                        <h3><?php echo $datos[1]," ", $datos[2] ?></h3>
                     </div>
                     <div class="panel-body text-center">
                        <p><?php echo $datos[4] ?></p>
                     </div>
                     <ul class="list-group text-left">
                        <li class="list-group-item"><i class="fa fa-genderless"></i> <?php echo $datos[6]?></li>
                        <li class="list-group-item"><i class="fa fa-phone"></i> <?php echo $datos[7]?></li>
                        <li class="list-group-item"><i class="fa fa-map-marker"></i> <?php echo $datos[8]?></li>
                        <!--
                        <li class="list-group-item"  name="idus" id="idus">
                            <form action="vistaPerfil.php" method="post">
                                <input type="text" value="" style="display:none;" name="id_user">
                                <button class="btn btn-lg btn-block btn-primary" type="submit">Enviar</button>
                            </form>
                        </li>
                        -->
                     </ul>
                     <div class="panel-footer">
                     <li class="list-group-item"  name="idus" id="idus">                     
                            <form action="vistaPerfil.php" method="post">
                                <input type="text" value="<?php echo $datos[0]?>" style="display:none;" name="id_user">
                                <button class="btn btn-lg btn-block btn-primary" type="submit">Ver</button>
                            </form>
                        </li>
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>        
      <script src="js/bootstrap.min.js"></script>
      <script src="js/inicio.js"></script>

      <script>  
       
        var comboCanton = document.getElementById('cantonCombo');     
        comboCanton.onchange = function (){           
            $.post("buscarDistrito.php", {canton: document.getElementById('cantonCombo').value},
                function (mensaje) {                    
                    var lista = JSON.parse(mensaje);                                     
                    var dis = document.getElementById("distritoCombo");
                    dis.length = 0;

                    
                    for (var i = 0; i < lista.length; i++){ 
                        var option = document.createElement('option');
                        option.setAttribute("value",lista[i].id);
                        option.innerHTML = lista[i].nombre;
                        dis.appendChild(option);                          
                    }                        
                });                  
        }
        
      </script>
   </body>
</html>