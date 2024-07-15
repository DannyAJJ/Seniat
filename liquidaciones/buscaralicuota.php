<?php 
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_POST['iditem'];
if ($_POST['tipo'] == '0') {
    $codigosql ='`Codigo_impuesto_produccion`'; 
    $alicuotasql = '`Impuesto_produccion`';
} else {
    $codigosql ='`Codigo_impuesto_pvp`'; 
    $alicuotasql = '`Impuesto_pvp`';
}
$sql = "SELECT $codigosql as 'codigo' , $alicuotasql as 'alicuta' FROM `clase_producto` WHERE `Id` = $id;";
$productos = $conn->query($sql);
$row = $productos->fetch_assoc();
$data = [
    'codigo' => $row['codigo'],
    'alicuota' => $row['alicuota']
];

echo json_encode($data);

?>