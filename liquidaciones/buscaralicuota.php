<?php 
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_POST['iditem'];
$tipo = $_POST['tipo'];
if ($tipo == '1') {
    $codigosql ='Codigo_impuesto_produccion'; 
    $alicuotasql = 'Impuesto_produccion';
} else {
    $codigosql ='Codigo_impuesto_pvp'; 
    $alicuotasql = 'Impuesto_pvp';
}
$sql = "SELECT $codigosql as 'codigo', $alicuotasql as 'alicuota' FROM `clase_producto` WHERE `Id` = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $data = array(
    'codigo' => $row['codigo'],
    'alicuota' => $row['alicuota']
);}
echo json_encode($data);

?>