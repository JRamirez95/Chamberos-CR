<?php
session_start();

$conexion=mysqli_connect('localhost','root','','chamberos')or die ('Ha fallado la conexión: '.mysqli_error());

while(true){
  
$sql1 = ("SELECT * FROM trabajos WHERE estado ='0' ");
$result1 = mysqli_query($conexion, $sql1);

$sql2 = ("SELECT usuarios.*,areausuario.idarea FROM usuarios INNER JOIN areausuario ON usuarios.id = areausuario.idusuario ");
$result2 = mysqli_query($conexion, $sql2);

//$trabajos = mysqli_fetch_array($result1);
//$usuarios = mysqli_fetch_array($result2);



$bretes = [];
while($trabajos = mysqli_fetch_array($result1)) { 
    array_push($bretes,$trabajos);
}
$chamberos=[];
while($usuarios = mysqli_fetch_array($result2)){
    array_push($chamberos,$usuarios);
}

for ($i=0; $i < count($bretes) ; $i++) { 
    for ($j=0; $j <count($chamberos) ; $j++) { 
        if($chamberos[$j]['idarea'] == $bretes[$i]['categoria'] ){           
           
            //$path="localhost/Proyecto/Proyecto/log/"; //creamos nuestra direccion, con las carpetas que sean si hay 
            //armamos nuestro link para enviar por mail en la variable $activateLink 
           // $activateLink=$path."activar.php?id=".$row['id']."&activateKey=".$activate.""; 
                    
                             // Datos del email 
   
   $nombre_origen    = "Chamberos CR"; 
   $email_origen     = "info@chamberoscr.com"; 
   //$email_copia      = "aaaaaaa@aa.com"; 
   //$email_ocultos    = "aaaaaaa@aa.com"; 
   $email_destino    = "".$chamberos[$j]['email']."";   
   
   $asunto= "Persona solicita trabajo en el area de ".$bretes[$i]['categoria'].""; 
     
   $mensaje= '<table width="629" border="0" cellspacing="1" cellpadding="2"> 
     <tr> 
       <td width="623" align="left"></td> 
     </tr> 
     <tr> 
       <td bgcolor="#2EA354"><div style="color:#FFFFFF; font-size:14; font-family: Arial, Helvetica, sans-serif; text-transform: capitalize; font-weight: bold;"><strong> Datos de la persona solicitante.</div></td> 
     </tr> 
     <tr> 
       <td height="95" align="left" valign="top"><div style=" color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px; margin-bottom:3px;"><br><br>  
             <strong>NOMBRE : '.$bretes[$i]['nombre'].'</strong><br><br> 
             <strong>DIRECCIÓN : '.$bretes[$i]['direccion'].'</strong><br> 
             <strong>EMAIL : '.$bretes[$i]['email'].'</strong><br><br>
             <strong>DESCRIPCIÓN DEL TRABAJO : '.$bretes[$i]['descripcion'].'</strong><br><br><br>        
              
             <strong>GRACIAS POR ELEGIR NUESTRA PLATAFORMA CHAMBEROS CR.</strong><br><br><br> 
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

    $sql3 = ("UPDATE trabajos SET estado = 1 WHERE estado = '0' ");
    $result3 = mysqli_query($conexion, $sql1);
        }
     else{
       echo '<strong>ERROR AL ENVIAR LOS CORREOS</strong>';
     }   
        
    }
}

sleep(10);
}


?>