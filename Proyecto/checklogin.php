<?php
session_start();
?>

<?php


$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "chamberos";
$tbl_name = "usuarios";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
 
$sql = "SELECT * FROM $tbl_name WHERE email = '$email'";

$result = $conexion->query($sql);

$estado = 'nuevo';

if ($result->num_rows > 0) {     
}
 $row = $result->fetch_array(MYSQLI_ASSOC);

 if (password_verify($contrasena, $row['contrasena'])) { 

  if($row['estado'] == $estado){

    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    $id = ($row['id']); 
     
    echo "<script> window.open('editarPerfil.php?id=$id','_self')</script>";
  }else{

    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);   
   
    $id = ($row['id']);  
    
    echo "<script> window.open('principalUsuarios.php?id=$id','_self')</script>";
  }   

 } else {    
   echo '<script language="javascript">alert("Email o Contraseña estan incorrectos.");</script>'; 
   echo "<script> window.open('login.php','_self')</script>";
  
   
 }
 mysqli_close($conexion); 
 ?>