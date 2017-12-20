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
$id = $_SESSION['id'];

$nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
 
//Si existe imagen
if ($nombre_img == !NULL)
{
   //indicamos los formatos que permitimos subir a nuestro servidor
   if (($_FILES["imagen"]["type"] == "image/gif")
   || ($_FILES["imagen"]["type"] == "image/jpeg")
   || ($_FILES["imagen"]["type"] == "image/jpg")
   || ($_FILES["imagen"]["type"] == "image/png"))
   {
      // Ruta donde se guardarán las imágenes que subamos
      $directorio = $_SERVER['DOCUMENT_ROOT'].'/Proyecto/Proyecto/fotosPerfil/';
      
      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
    } 
    else 
    {
       //si no cumple con el formato
       echo "No se puede subir una imagen con ese formato ";
    }    
} 
else
{
  $nombre_img = "imgProfile.png";
}


 $query = "UPDATE `usuarios` SET nombre = '$_POST[nombre]', apellido = '$_POST[apellido]', sexo = '$_POST[sexo]', telefono = '$_POST[telefono]', idprovincia = '$_POST[id_provincia]', idcanton = '$_POST[id_canton]', iddistrito = '$_POST[id_distrito]',  foto = '$nombre_img', estado = 'activo' WHERE id = $id";


 if ($conexion->query($query) === TRUE) { 
  echo "<script>alert('Datos guardados');</script>";
  echo "<script> window.open('../principalUsuarios.php','_self')</script>";
 }

 else {
  echo "<script>alert('Hubo un error al editar');</script>";
   
 }
 mysqli_close($conexion);
?>


