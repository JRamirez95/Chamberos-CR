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
$id = $_GET['id'];

 $query = "UPDATE `usuarios` SET nombre = '$_POST[nombre]', apellido = '$_POST[apellido]', sexo = '$_POST[sexo]', telefono = '$_POST[telefono]', direccion = '$_POST[direccion]', estado = 'activo' WHERE id = $id";

 if ($conexion->query($query) === TRUE) { 
  echo '<script language="javascript">alert("Datos guardados");</script>';
  echo "<script> window.open('editarPerfil.php?id=$id','_self')</script>";
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   
 }
 mysqli_close($conexion);
?>


