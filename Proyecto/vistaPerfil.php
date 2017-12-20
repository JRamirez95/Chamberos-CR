<?php
   session_start();
   $id = $_POST['id_user'];
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Vista Perfil</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/vperfil.css">

      <?php            
         $con = mysqli_connect("localhost","root","","chamberos") or die ("Error de conexion");
         mysqli_set_charset($con,"utf8");
         $consulta = "SELECT u.nombre, u.apellido, u.email, u.sexo, u.telefono, p.provincia, c.canton, d.distrito, u.foto FROM usuarios u, provincia p, canton c, distrito d WHERE u.idprovincia = p.idp AND u.idcanton = c.id AND u.iddistrito = d.id AND u.id = '$id'";
         $ejecutar = mysqli_query($con,$consulta);
         $row = mysqli_fetch_row($ejecutar); 
         
         $email = $row[2];
         $result = "SELECT nombre FROM area INNER JOIN areausuario ON area.id = areausuario.idarea WHERE idusuario = $id";
         $areas = mysqli_query($con,$result);

         $result = "SELECT * FROM diasusuario WHERE idus = $id";
         $dias = mysqli_query($con,$result); 
      ?>
   </head>
   <body>

   <a class="btn btn-default" style="margin-top: 1%; margin-left: 2%;" href="configurarServicio.php">Volver</a>
              
        

      <div class="container">
         <div class="row">
            <!-- Contenedor -->
            <ul id="accordion" class="accordion">
               <li>
                  <div class="col col_4 iamgurdeep-pic">
                     <img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="fotosPerfil/<?php echo $row[8] ?>">
                     <div class="edit-pic">
                        <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" class="fa fa-facebook"></a>
                        <a href="https://www.instagram.com/gurdeeposahan/" target="_blank" class="fa fa-instagram"></a>
                        <a href="https://twitter.com/gurdeeposahan1" target="_blank" class="fa fa-twitter"></a>
                        <a href="https://plus.google.com/u/0/105032594920038016998" target="_blank" class="fa fa-google"></a>
                     </div>
                     <div class="username">
                        <h2><?php echo $row[0], " " , $row[1] ?>  <small><i class="fa fa-map-marker"></i> <?php echo $row[5] ?></small></h2>
                        <p><i class="fa fa-briefcase"></i> ChamBero</p>              
                        <button type="button" class="btn btn-primary btn-o" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i> Enviar Correo</button>                        
                        <ul class="nav navbar-nav">
                           <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-ellipsis-v pull-right"></span></a>
                              <ul class="dropdown-menu pull-right">
                                 <li><a href="#">Video Call <i class="fa fa-video-camera"></i></a></li>
                                 <li><a href="#">Poke <i class="fa fa-hand-o-right"></i></a></li>
                                 <li><a href="#">Report <i class="fa fa-bug"></i></a></li>
                                 <li><a href="#">Block <i class="fa fa-lock"></i></a></li>
                              </ul>
                           </li>
                        </ul>
                     </div>
                  </div>
               </li>
               <li  class="default open">
                  <div class="link"><i class="fa fa-globe"></i>Bibliografía<i class="fa fa-chevron-down"></i></div>
                  <ul class="submenu">
                     <li><a>Sexo : <?php echo $row[3] ?></a></li>
                     <li><a>Dirección : <?php echo $row[5], ',', ' ' , $row[6], ',' , ' ', $row[7] ?></a></li>
                     <li><a>Email : <?php echo $row[2] ?></a></li>
                     <li><a>Teléfono : (+506) <?php echo $row[4] ?></a></li>
                  </ul>
               </li>
               <li>
                  <div class="link"><i class="fa fa-code"></i>Aréas de Trabajo<i class="fa fa-chevron-down"></i></div>
                  <ul class="submenu">
                 
                     <li><a> 
                     <?php
                     while ($row = mysqli_fetch_array($areas)) {
                     echo "<span class='tags' style='margin-left:1%;'> $row[0]</span>";				
                     }
                     ?>                     
                     </a>
                     </li>
                  </ul>
               </li>
               <li>
                  <div class="link"><i class="fa fa-calendar-check-o"></i>Días Disponibles<i class="fa fa-chevron-down"></i></div>
                  <ul class="submenu">
                     <li><a>
                        <?php
                        while ($row = mysqli_fetch_array($dias)) {                                                       
                         echo "<span class='tags fa fa-check'> $row[2]</span>";				
                        }
                        ?>
                        </a> 
                     </li>                     
                  </ul>
               </li>
               <li>
              
               </li>
            </ul>
         </div>
      </div>

      <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enviar correo electronico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form action="log/enviar.php" method="POST">
      <div class="modal-body"> 
            <div class="form-group">
                <label for="para">Para:</label>
                <input type="email" class="form-control" id="para" name="para" value="<?php echo $email ?>">
            </div>
            <div class="form-group">
                <label for="de">De:</label>
                <input type="email" class="form-control" id="de" name="de" placeholder="Email" required>
            </div> 
            <div class="form-group">
                <label for="asunto">Asunto:</label>
                <input type="text" class="form-control" id="asunto" name="asunto" placeholder="" required>
            </div> 
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="">
            </div>
            <div class="form-group">
            <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="">
            </div>
            <div class="form-group">
            <label for="tel">Teléfono:</label>
                <input type="tel" class="form-control" id="tel" name="telefono" placeholder="">
            </div>
            <div class="form-group">
            <label for="de">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="" required>
            </div>     
          
            <div class="form-group">
            <label for="desc">Descripción:</label>                
                <textarea  class="form-control" id="desc" name="descripcion" placeholder="" required></textarea>
            </div>                        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </div>
      </form>
    </div>
  </div>
</div>
      <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> 
      <script src="js/bootstrap.min.js"></script>
      <script src="js/vperfil.js"></script>
   </body>
</html>