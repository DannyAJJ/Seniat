<?php
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$datos =  json_decode($_POST['datos'], true);


$ultimafecha = date('Y');
$sql = "SELECT `Secuencial` FROM `liquidacion_licores` WHERE `Fecha_liquidacion` LIKE '%$ultimafecha' ORDER BY Secuencial DESC LIMIT 1;";
$ejecutada = $conn->query($sql);
if ($ejecutada->num_rows > 0) {
    $fecha = $ejecutada->fetch_assoc();
    $numregistro = intval($fecha["Numero_registro"]) + 1;
} else {
    $numregistro = 1;
}

$sql = "SELECT `Id_firmante` FROM `firmante_liquidacion` ORDER BY Id_firmante DESC LIMIT 1;";
$ultimofirmante = $conn->query($sql);
$row = $ultimofirmante->fetch_assoc();
$idfirmante = $row['Id_firmante'];


$fechamanifiesto = substr($datos['cabecera']['fechamanifiesto'], -2)."-".substr($datos['cabecera']['fechamanifiesto'],  5, 2)."-".substr($datos['cabecera']['fechamanifiesto'],  0, 4)/*."-".substr($datos['cabecera']['fechamanifiesto'],  0, 4)*/;

$sql = "INSERT INTO `liquidacion_licores` (`Secuencial`, `Licencia`, `Fecha_liquidacion`, `Numero_manfiesto`, `Fecha_manifiesto`, `Firmante`) VALUES ($numregistro, '".$datos['cabecera']['licencia']."', '".date('d-m-Y')."', '".$datos['cabecera']['manifiesto']."', '$fechamanifiesto', '$idfirmante');";
/*foreach ($datos['detalles'] as $key => $value) {
    echo " " . $value['litrovr'];
}*/



echo $sql;

?>