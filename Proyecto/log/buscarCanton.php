<?php 
$conexion=mysqli_connect("localhost", "root", "","chamberos");
mysqli_set_charset($conexion,"utf8");
$provincia = $_POST['provincia'];
$sql = "SELECT canton.* FROM canton WHERE idprovincia = $provincia";
$arreglo =[];
$ejecutar= $conexion->query($sql);
if($ejecutar) {
while($row =mysqli_fetch_array($ejecutar)) {
    
	$subArreglo = array(
     "id"=>$row["id"],
     "nombre"=>$row["canton"] 
     
    );
    array_push($arreglo, $subArreglo);
}

$js_array = json_encode($arreglo,JSON_UNESCAPED_UNICODE);
echo $js_array;
}
?>
