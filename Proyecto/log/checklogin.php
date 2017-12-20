<?php 
session_start(); 
//datos para establecer la conexion con la base de mysql. 
$conexion=mysqli_connect('localhost','root','','chamberos')or die ('Ha fallado la conexión: '.mysqli_error());

function quitar($mensaje) 
{ 
    $nopermitidos = array("'",'\\','<','>',"\""); 
    $mensaje = str_replace($nopermitidos, "", $mensaje); 
    return $mensaje; 
} 
$estado= "0";  //creo la variable $estado=0 para compararla despues con el campo de la BD estado y si son cero le dejara pasar 
if ($_POST['usuario']) { 

    $usuario = strtolower(htmlentities($_POST["usuario"], ENT_QUOTES)); 
    $password = $_POST["contrasena"]; 
    $result = $conexion->query('SELECT * FROM usuarios WHERE usuario=\''.$usuario.'\''); 
    if($row = mysqli_fetch_array($result)){ 
        if($row["contrasena"] == $password){ 
			$_SESSION['loggedin'] = true;			
			$_SESSION['id'] = $row['id'];
			
			 
            if(  $estado == $row['statu']){  //aqui es donde comprovamos que el campo activado sea cero, si lo es pasara, si no, no. 
                //el siguiente scripy de java nos redirige donde le digamos, so no os hace falta ,lo borrais. 
        ?> 
            <SCRIPT LANGUAGE="javascript"> 
            location.href = "../principalUsuarios.php"; 
			</SCRIPT> 
			
            <?php 
         
        }else{ 
            echo "<script> alert('Contraseña incorrecta o cuenta sin activar')</script>";
            echo "<script> location.href= '../login.php'</script>"; 
        session_destroy();} 
    }else{ 
        echo "<script> alert('Contraseña incorrecta')</script>";}
        echo "<script> location.href= '../login.php'</script>"; 
        } 
    else{ 
        echo "<script> alert('Usuario no registrado')</script>";}
        echo "<script> window.location.href= '../login.php'</script>"; 
		} 
		
    mysqli_close($conexion); 
	
?>