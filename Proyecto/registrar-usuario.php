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

 $verificarEmail = "SELECT * FROM $tbl_name
 WHERE email = '$_POST[email]' ";

$verificarUsuario = "SELECT * FROM $tbl_name
WHERE usuario = '$_POST[usuario]' ";

 $result = $conexion->query($verificarEmail);

 $a = $conexion->query($verificarUsuario);

 $count = mysqli_num_rows($result);

 $c = mysqli_num_rows($a);

 if ($count == 1) {
    echo '<script language="javascript">alert("Correo en uso");</script>';
    echo "<script> window.open('Registrarse.php','_self')</script>";
 }else if($c == 1){
    echo "<br />". "El Nombre de Usuario ya está en uso." . "<br />";    
    echo "<a href='Registrarse.php'>Por favor escoga otro Nombre</a>";
 }
 else{

 $query = "INSERT INTO usuarios (nombre, email, usuario, contrasena, estado)
           VALUES ('$_POST[nombre]', '$_POST[email]', '$_POST[usuario]', '$hash', 'nuevo')";

 if ($conexion->query($query) === TRUE) {
 
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h3>" . "Bienvenido: " . $_POST['email'] . "</h3>" . "\n\n";
 echo "<h4>" . "Hacer Login: " . "<a href='login.php'>Login</a>" . "</h4>"; 
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);
?>