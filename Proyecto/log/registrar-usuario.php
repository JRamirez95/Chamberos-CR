<?php 
   session_start(); 
   //datos para establecer la conexion con la base de mysql. 
   $conexion=mysqli_connect('localhost','root','','chamberos')or die ('Ha fallado la conexión: '.mysql_error()); 
   
   
   
   //añadimos la funcion que se encargara de generar un numero aleatorio 
   function genera_random($longitud){  
       $exp_reg="[^A-Z0-9]";  
       return substr(preg_replace($exp_reg, "", md5(rand())) .  
          preg_replace($exp_reg, "", md5(rand())) .  
          preg_replace($exp_reg, "", md5(rand())),  
          0, $longitud);  
   }
   
   
   // verificamos si se han enviado ya las variables necesarias, las que tenemos en nuestro form cambialo, como sea el tuyo. 
   if (isset($_POST["nombre"])) { 
       $name = $_POST["nombre"];
       $email = $_POST["email"]; 
       $usuario = $_POST["usuario"];
       $password = $_POST["contrasena"]; 
       $password2 = $_POST["contrasena1"]; 
        
       // Hay campos en blanco 
       if($usuario==NULL|$password==NULL|$password2==NULL|$email==NULL) { 
           echo "un campo está vacio."; 
           //formRegistro(); 
       }else{ 
           // ¿Coinciden las contraseñas? 
           if($password!=$password2) { 
               echo "Las contraseñas no coinciden"; 
                
           }else{ 
               // Comprobamos si el nombre de usuario o la cuenta de correo ya existían 
               $checkuser = $conexion->query("SELECT usuario FROM usuarios WHERE usuario='$usuario'"); 
               $username_exist = mysqli_num_rows($checkuser); 
               $checkemail = $conexion->query("SELECT email FROM usuarios WHERE email='$email'"); 
               $email_exist = mysqli_num_rows($checkemail); 
               if ($email_exist>0) { 
                   echo "<script>alert('La cuenta de correo estan ya en uso')</script>"; 
                    
           }else{ 
                   if ($username_exist>0) { 
                   echo "<script>alert('El nombre de usuario  esta ya en uso')</script>";           
                    
               }else{ 
                
                     //agregamos la variable $activate que es un numero aleatorio de  
                     //20 digitos crado con la funcion genera_random de mas arriba 
                      
                     $activate = genera_random(20);   
                      
                     //aqui es donde insertamos los nuevos valosres en la BD  activate y el valor 1 que es desactivado 
                      $foto= "imgProfile.png";
                      $provincia = $_POST['id_provincia'];
                      $canton = $_POST['id_canton'];
                      $distrito = $_POST['id_distrito'];

                   $query = 'INSERT INTO usuarios (nombre ,usuario, contrasena, email, fecha, activate, statu, foto, idprovincia, idcanton, iddistrito) 
                   VALUES (\''.$name.'\',\''.$usuario.'\',\''.$password.'\',\''.$email.'\',\''.date("Y-m-d").'\',\''.$activate.'\', 1 ,\''.$foto.'\' , \''.$provincia.'\' , \''.$canton.'\' , \''.$distrito.'\')'; 
                   $conexion->query($query); 
                    
                                        
                   echo "<table width=70%><tr bgcolor= #61e877 class= estilo30><div align=center>"; 
                   echo 'Ha sido registrado en Chamberos CR como: <b>'.$usuario.' </b>de manera satisfactoria.<br />'; 
                   echo ' Gracias. Le enviaremos ahora un email<br />'; 
                   echo 'para activar su cuenta, al correo que nos facilito.<br />'; 
                   echo "</div></tr>"; 
                   echo "</table>"; 
                    
                    
                    
                   $query   = "SELECT * FROM usuarios WHERE usuario='$usuario'"; 
            $result = $conexion->query($query); 
            $row   = mysqli_fetch_array($result); 
             
            $path="localhost/Proyecto/Proyecto/log/"; //creamos nuestra direccion, con las carpetas que sean si hay 
            //armamos nuestro link para enviar por mail en la variable $activateLink 
   $activateLink=$path."activar.php?id=".$row['id']."&activateKey=".$activate.""; 
                    
                             // Datos del email 
   
   $nombre_origen    = "Chamberos CR"; 
   $email_origen     = "info@chamberoscr.com"; 
   //$email_copia      = "aaaaaaa@aa.com"; 
   //$email_ocultos    = "aaaaaaa@aa.com"; 
   $email_destino    = "".$row['email']."";   
   
   
   
   $asunto= "Datos de registro en Chamberos CR, guarde este email."; 
   
   $mensaje= '<table width="629" border="0" cellspacing="1" cellpadding="2"> 
     <tr> 
       <td width="623" align="left"></td> 
     </tr> 
     <tr> 
       <td bgcolor="#2EA354"><div style="color:#FFFFFF; font-size:14; font-family: Arial, Helvetica, sans-serif; text-transform: capitalize; font-weight: bold;"><strong> Estos son sus datos de registro.</div></td> 
     </tr> 
     <tr> 
       <td height="95" align="left" valign="top"><div style=" color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px; margin-bottom:3px;"> 
             <strong>USUARIO : '.$row['usuario'].'</strong><br><br> 
             <strong>SU CLAVE : '.$row['contrasena'].'</strong><br><br> 
             <strong>SU EMAIL : '.$row['email'].'</strong><br><br> 
             <strong>SU LINK DE ACTIVACION:<br><a href="'.$activateLink.'">'.$activateLink.' </strong></a><br><br><br> 
             <strong>POR FAVOR HAGA CLICK EN LINK DE ARRIBA PARA ACTIVAR SU CUENTA Y ACCEDER A LA PAGINA SIN RESTRICCIONES</strong><br><br><br> 
             <strong>SI EL LINK NO FUNCIONA ALA PRIMERA INTENTELO UNA SEGUNDA, EL SERVIDOR A VECES TARDA EN PROCESAR LA PRIMERA ORDEN</strong><br><br><br> 
              
             <strong>GRACIAS POR REGISTRARSE EN CHAMBEROS CR.</strong><br><br><br> 
       </div> 
       </td> 
     </tr> 
   </table>'; 
   
   
   
   $formato = "html"; 
   
   //*****************************************************************// 
   $headers  = "From: $nombre_origen <$email_origen> \r\n"; 
   $headers .= "Return-Path: <$email_origen> \r\n"; 
   $headers .= "Reply-To: $email_origen \r\n"; 
   
   
   $headers .= "X-Sender: $email_origen \r\n"; 
   
   $headers .= "X-Priority: 3 \r\n"; 
   $headers .= "MIME-Version: 1.0 \r\n"; 
   $headers .= "Content-Transfer-Encoding: 7bit \r\n"; 
   
   //*****************************************************************// 
     
   if($formato == "html") 
    { $headers .= "Content-Type: text/html; charset=iso-8859-1 \r\n";  } 
      else 
       { $headers .= "Content-Type: text/plain; charset=iso-8859-1 \r\n";  } 
   
   @mail($email_destino, $asunto, $mensaje, $headers) ;      
                    
                    
                   } 
               } 
           } 
       } 
   }else{ 
        
   } 
   
   ?>