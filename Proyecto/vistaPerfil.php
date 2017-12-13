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
         $consulta = "SELECT * FROM `usuarios` WHERE id = '$id'";
         $ejecutar = mysqli_query($con,$consulta);
         $row = mysqli_fetch_row($ejecutar); 
         
         $result = "SELECT nombre FROM area INNER JOIN areausuario ON area.id = areausuario.idarea WHERE idusuario = $id";
         $areas = mysqli_query($con,$result);

         $result = "SELECT * FROM diasusuario WHERE idus = $id";
         $dias = mysqli_query($con,$result); 
      ?>
   </head>
   <body>
      <div class="container">
         <div class="row">
            <!-- Contenedor -->
            <ul id="accordion" class="accordion">
               <li>
                  <div class="col col_4 iamgurdeep-pic">
                     <img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="fotosPerfil/<?php echo $row[9] ?>">
                     <div class="edit-pic">
                        <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" class="fa fa-facebook"></a>
                        <a href="https://www.instagram.com/gurdeeposahan/" target="_blank" class="fa fa-instagram"></a>
                        <a href="https://twitter.com/gurdeeposahan1" target="_blank" class="fa fa-twitter"></a>
                        <a href="https://plus.google.com/u/0/105032594920038016998" target="_blank" class="fa fa-google"></a>
                     </div>
                     <div class="username">
                        <h2><?php echo $row[1], " " , $row[2] ?>  <small><i class="fa fa-map-marker"></i> <?php echo $row[8] ?></small></h2>
                        <p><i class="fa fa-briefcase"></i> ChamBero</p>
                        <a href="envioMensajes.php" class="btn-o"> <i class="fa fa-envelope"></i> Enviar Mensaje </a>
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
                     <li><a href="#">Sexo : <?php echo $row[6] ?></a></li>
                     <li><a href="#">Dirección : <?php echo $row[8] ?></a></li>
                     <li><a href="mailto:<?php echo $row[4] ?>">Email : <?php echo $row[4] ?></a></li>
                     <li><a href="#">Teléfono : (+506) <?php echo $row[7] ?></a></li>
                  </ul>
               </li>
               <li>
                  <div class="link"><i class="fa fa-code"></i>Aréas de Trabajo<i class="fa fa-chevron-down"></i></div>
                  <ul class="submenu">
                 
                     <li><a href="#"> 
                     <?php
                     while ($row = mysqli_fetch_array($areas)) {
                     echo "<span class='tags'> $row[0]</span> <br/>";				
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
                         echo "<span class='tags fa fa-check'> $row[2]</span> <br/>";				
                        }
                        ?>
                        </a> 
                     </li>                     
                  </ul>
               </li>
               <li>
                  <div class="link"><i class="fa fa-users"></i>Friends <small>1,053</small><i class="fa fa-chevron-down"></i></div>
                  <ul class="submenu">
                     <li class="photosgurdeep"><a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://www.webncc.in/images/gurdeeposahan.jpg">                 
                        </a>
                        <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://www.webncc.in/images/gurdeeposahan.jpg">                 
                        </a>
                        <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://www.webncc.in/images/gurdeeposahan.jpg">                 
                        </a>
                        <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://www.webncc.in/images/gurdeeposahan.jpg">                 
                        </a>
                        <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://www.webncc.in/images/gurdeeposahan.jpg">                 
                        </a>
                        <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://www.webncc.in/images/gurdeeposahan.jpg">                 
                        </a>
                        <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://www.webncc.in/images/gurdeeposahan.jpg">                 
                        </a>
                        <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://www.webncc.in/images/gurdeeposahan.jpg">                 
                        </a>
                        <a href="#"><img class="img-responsive iamgurdeeposahan" alt="iamgurdeeposahan" src="http://www.webncc.in/images/gurdeeposahan.jpg">                 
                        </a>
                        <a class="view-all" href="https://web.facebook.com/iamgurdeeposahan" target="_blank">50+
                        </a>
                     </li>
                  </ul>
               </li>
            </ul>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> 
      <script src="js/bootstrap.min.js"></script>
      <script src="js/vperfil.js"></script>
   </body>
</html>