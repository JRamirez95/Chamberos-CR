<?php
$conexion=mysqli_connect("localhost", "root", "","chamberos");
mysqli_set_charset($conexion,"utf8");

 $valor=$_POST['valor'];

if ($_POST['tipo'] == "provinciaCombo" ){
    $sql ="SELECT u.id, u.nombre, u.apellido, u.email, u.sexo, u.telefono, p.provincia, c.canton, d.distrito, u.foto, p.idp FROM usuarios u, provincia p, canton c, distrito d WHERE u.idprovincia = p.idp AND u.idcanton = c.id AND u.iddistrito = d.id AND u.idprovincia = '$valor'";     
}
if ($_POST['tipo'] == "cantonCombo" ){
    $sql = "SELECT u.id, u.nombre, u.apellido, u.email, u.sexo, u.telefono, p.provincia, c.canton, d.distrito, u.foto, p.idp FROM usuarios u, provincia p, canton c, distrito d WHERE u.idprovincia = p.idp AND u.idcanton = c.id AND u.iddistrito = d.id AND u.idcanton = '$valor'";     
}
if ($_POST['tipo'] == "distritoCombo" ){
    $sql = "SELECT u.id, u.nombre, u.apellido, u.email, u.sexo, u.telefono, p.provincia, c.canton, d.distrito, u.foto, p.idp FROM usuarios u, provincia p, canton c, distrito d WHERE u.idprovincia = p.idp AND u.idcanton = c.id AND u.iddistrito = d.id AND u.iddistrito = '$valor'";     
}

$arreglo =[];
$ejecutar= $conexion->query($sql);
if($ejecutar) {
while($row =mysqli_fetch_array($ejecutar)) {
    
	$subArreglo = array(
     "id"=>$row["id"],
     "nombre"=>$row["nombre"],
     "apellido"=>$row["apellido"],
     "email"=>$row["email"],
     "sexo"=>$row["sexo"],
     "telefono"=>$row["telefono"],
     "provincia"=>$row["provincia"],
     "canton"=>$row["canton"],
     "distrito"=>$row["distrito"],
     "foto"=>$row["foto"],
     "idprovincia" =>$row["idp"]

    );
    array_push($arreglo, $subArreglo);
}

$js_array = json_encode($arreglo,JSON_UNESCAPED_UNICODE);
echo $js_array;
}