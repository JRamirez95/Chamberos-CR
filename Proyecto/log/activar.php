<?php  

$conexion=mysqli_connect('localhost','root','','chamberos')or die ('Ha fallado la conexión: '.mysqli_error());

//recogemos los valores enviados por el link de activacion que mandamos por mail 
if (isset($_GET['id'])) { 

$idval=$_GET['id']; 
$activate2=$_GET['activateKey'];

//y aqui es donde cambiamos el valor 1=desactivado  por valor 0=activado
$query = "UPDATE usuarios SET statu = '0' WHERE id = '$idval' AND activate ='$activate2' " ; 
                $conexion->query($query);

?>
             
<SCRIPT LANGUAGE="javascript"> 
    location.href = "../login.php"; 
</SCRIPT> 
         
<?php

}else{ 
    echo "<script> alert('Activación Incompleta')</script>";
} 
         

?>