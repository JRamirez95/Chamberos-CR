<?php
session_start();

    $para = $_POST["para"];
    $de = $_POST['de'];
    $name = $_POST['nombre'];    
    $apellido = $_POST['apellido'];
    $asun = $_POST['asunto'];
    $tel = $_POST['telefono']; 
    $direccion = $_POST['direccion'];
    $desc = $_POST['descripcion'];  

$nombre_origen    = "Chamberos CR"; 
$email_origen     = $de; 
//$email_copia      = "aaaaaaa@aa.com"; 
//$email_ocultos    = "aaaaaaa@aa.com"; 
$email_destino    = $para;   

$asunto= "$asun"; 

$mensaje= '<table width="629" border="0" cellspacing="1" cellpadding="2"> 
  <tr> 
    <td width="623" align="left"></td> 
  </tr> 
  <tr> 
    <td bgcolor="#2EA354"><div style="color:#FFFFFF; font-size:14; font-family: Arial, Helvetica, sans-serif; text-transform: capitalize; font-weight: bold;"><strong> Datos de la persona solicitante.</div></td> 
  </tr> 
  <tr> 
    <td height="95" align="left" valign="top"><div style=" color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px; margin-bottom:3px;"><br><br>  
          <strong>NOMBRE : '.$name.'</strong><br><br> 
          <strong>DIRECCIÓN : '.$direccion.'</strong><br> 
          <strong>EMAIL : '.$de.'</strong><br><br>
          <strong>TELÉFONO : '.$tel.'</strong><br><br>
          <strong>DESCRIPCIÓN DEL TRABAJO : '.$desc.'</strong><br><br><br>        
           
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

echo "<script>alert('Correo Enviado')</script>";
echo "<script> window.open('../principal.php','_self')</script>";
?>