<?php
session_start();
if (!isset($_SESSION['nivel'])) {
    header('location: ../index.html');
}else {
    if (intval($_SESSION['nivel'])<1) {
        header('location: ../menu/index.php');
    }
}
?>

<?php
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

$mes = $_POST['mes'];
$ano = $_POST['ano'];
$tipo = $_POST['tipo'];


switch ($tipo) {
    case 'prolicor':
        $tablas = 'detalle_produccion_licores d, liquidacion_licores l';
        break;
    
    case 'pvplicor':
        $tablas = 'detalle_pvp_licores d, liquidacion_licores l';
        break;
        
    case 'pvptabaco':
        $tablas = 'detalle_tabaco d, liquidacion_tabaco l';
        break;
}
$sql = "SELECT SUM(d.Total_detalle) as 'suma', COUNT(d.Total_detalle) as 'cant' FROM $tablas WHERE l.Fecha_liquidacion like '%$mes-$ano' AND l.N_liquidacion = d.Id_liquidacion;;";
$sentencia = $conn->query($sql);
$resultados = $sentencia->fetch_assoc();
if ($resultados['suma']) {
    $lista = [
        'cantidad' => $resultados['cant'],
        'suma' => $resultados['suma'],
    ];
}else {
    $lista = [
        'cantidad' => $resultados['cant'],
        'suma' => 0,
    ];
}

echo json_encode($lista);
?>