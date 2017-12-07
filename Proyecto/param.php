<?php
session_start();
?>

<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "chamberos";
$tbl_name = "trabjaousuario"; 


 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}


$id = $_SESSION['id'];

if(isset($_POST['idarea'])){

    $data = $_POST['idarea'];
    foreach( $data as $row) {
        $conexion->query("INSERT INTO areausuario (idusuario, idarea) VALUES ($id, $row)");
    } 
}

if(isset($_POST['dia'])){

    $data = $_POST['dia']; 
    foreach($data as $row) {
      $conexion->query("INSERT INTO diasusuario (idus, dia) VALUES ($id, '$row')");       
    }        
 }

 $query = "INSERT INTO trabajousuario (idusuario, tipo, precio)
            VALUES ($id, '$_POST[tipo]', $_POST[precio])";
 
  if ($conexion->query($query) === TRUE) { 
   echo '<script language="javascript">alert("Parámetros agregados");</script>';
   echo "<script> window.open('principalUsuarios.php','_self')</script>";
  }
 
 
 mysqli_close($conexion);
?>