<?php 
$conexion=mysqli_connect("localhost", "root", "","chamberos");
mysqli_set_charset($conexion,"utf8");
$canton = $_POST['canton'];
$sql = "SELECT distrito.* FROM distrito WHERE idcanton = $canton";
$arreglo =[];
$ejecutar= $conexion->query($sql);
if($ejecutar) {
while($row =mysqli_fetch_array($ejecutar)) {
    
	$subArreglo = array(
     "id"=>$row["id"],
     "nombre"=>$row["nombre"]
    );
    array_push($arreglo, $subArreglo);
}

$js_array = json_encode($arreglo,JSON_UNESCAPED_UNICODE);
echo $js_array;
}
?>
