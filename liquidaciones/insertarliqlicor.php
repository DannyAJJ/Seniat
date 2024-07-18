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
    $numregistro = intval($fecha["Secuencial"]) + 1;
} else {
    $numregistro = 1;
}




$fechamanifiesto = substr($datos['cabecera']['fechamanifiesto'], -2)."-".substr($datos['cabecera']['fechamanifiesto'],  5, 2)."-".substr($datos['cabecera']['fechamanifiesto'],  0, 4)/*."-".substr($datos['cabecera']['fechamanifiesto'],  0, 4)*/;

$sql = "INSERT INTO `liquidacion_licores` (`Secuencial`, `Licencia`, `Fecha_liquidacion`, `Numero_manfiesto`, `Fecha_manifiesto`, `Firmante`) VALUES ($numregistro, '".$datos['cabecera']['licencia']."', '".date('d-m-Y')."', '".$datos['cabecera']['manifiesto']."', '$fechamanifiesto', '".$datos['cabecera']['firmante']."');";
$conn->query($sql);

$sql = "SELECT `N_liquidacion` FROM `liquidacion_licores` ORDER BY `N_liquidacion` DESC LIMIT 1;";
$ejecutada = $conn->query($sql);
if ($ejecutada->num_rows > 0) {
    $nliquidaciones = $ejecutada->fetch_assoc();
    $nliq = intval($nliquidaciones["N_liquidacion"]) ;
} else {
    $nliq = 1;
}
foreach ($datos['detalles'] as $key => $value) {
    if ( floatval($value['total_detalle']) > 0) {
        $sql = "INSERT INTO `detalle_produccion_licores`( `Id_liquidacion`, `Clase`, `Litrovr`, `Frgl`, `Litroaa`, `Aa`, `Total_detalle`)
         VALUES ($nliq,'".$value['idmarca']."','".$value['litrovr']."','".$value['fr']."','".$value['laa']."','".$value['aa']."','".$value['total_detalle']."')";
        $conn->query($sql);
    }
}

echo "../pdf/crear_liquidacion_pago_impuestos_derechos_licores.php?secuencial=$numregistro&fecha=".date('d-m-Y')."&tipo=".$datos['cabecera']['liquidacion'];



?>