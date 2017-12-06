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


$id = $_GET['id'];



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

 if ($conexion === TRUE){
    echo '<script language="javascript">alert("Datos guardados");</script>';

 }else{
    echo '<script language="javascript">alert("Error al intentar agregar parametros");</script>';
 }
    
 
 mysqli_close($conexion);
?>