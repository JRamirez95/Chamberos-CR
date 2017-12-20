<?php 
   session_start();   
   $conexion=mysqli_connect('localhost','root','','chamberos')or die ('Ha fallado la conexión: '.mysql_error()); 

   if (isset($_POST["nombre"])) { 
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $email = $_POST["email"];
    $desc = $_POST["descripcion"];    
    $categoria = $_POST["categoria"]; 
    
    if($nombre==NULL|$apellido==NULL|$direccion==NULL|$email==NULL|$desc==NULL|$categoria==NULL) { 
        echo "Debe de completar todos los campos"; 
        //formRegistro(); 
    }else{
            $estado=0;
        $query = 'INSERT INTO trabajos (nombre, apellido, direccion, email, fecha, descripcion, categoria, estado) 
            VALUES (\''.$nombre.'\',\''.$apellido.'\',\''.$direccion.'\',\''.$email.'\',\''.date("Y-m-d").'\',\''.$desc.'\', \''.$categoria.'\', \''.$estado.'\')'; 
            $conexion->query($query); 

            echo "<script>alert('Datos guardados');</script>";
            echo "<script>location.href = '../principal.php'</script>";
   }
}
mysqli_close($conexion); 
?>   
   