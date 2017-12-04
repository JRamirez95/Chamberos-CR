<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "chamberos";
$tbl_name = "usuarios"; 
 

$form_pass = $_POST['contrasena'];
$hash = password_hash($form_pass, PASSWORD_BCRYPT);

 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
$id = $_GET['id'];

$contraA = $_POST['contraA'];
$contrasena = $_POST['contrasena'];
$contrasenna = $_POST['contrasenna'];

$sql = "SELECT * FROM $tbl_name WHERE id = '$id'";
$result = $conexion->query($sql);

$row = $result->fetch_array(MYSQLI_ASSOC);

 if (password_verify($contraA, $row['contrasena'])) {
    if ($contrasena == $contrasenna){
        $query = "UPDATE $tbl_name SET contrasena = '$hash' WHERE id = $id"; 
        if ($conexion->query($query) === TRUE) {            
            echo '<script language="javascript">alert("Cambio de contraseña realizado");</script>';
            echo "<script> window.open('cambiarContrasena.php?id=$id','_self')</script>"; 
            }else {
            echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
             } 
            
    }else{
        echo '<script language="javascript">alert("Las contraseñas no coinciden");</script>';
        echo "<script> window.open('cambiarContrasena.php?id=$id','_self')</script>";  
    }

 }else{
    echo '<script language="javascript">alert("La contraseña anterior no coinciden");</script>';
    echo "<script> window.open('cambiarContrasena.php?id=$id','_self')</script>";  
 }

 mysqli_close($conexion);
?>


