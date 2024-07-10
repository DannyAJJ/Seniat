<?php $tipoliq = $_GET['tipo']; $licencia = $_GET['licencia'];

$banco = $_POST['banco'];
$fechapago = $_POST['fechapago'];
$forma16 = $_POST['forma16'];
$monto = $_POST['monto'];

// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);
$ultimafecha = date('Y');
    $sql = "SELECT Fecha_renovacion FROM `renovacion_licores` WHERE Fecha_renovacion LIKE '%$ultimafecha' LIMIT 1;";    
    $ejecutada = $conn->query($sql);
    if ($ejecutada->num_rows > 0) {
        $fecha = $ejecutada-> fetch_assoc();
        $numregistro = intval($fecha["Numero_registro"]) + 1;
    }else {
        $numregistro = 1;
    }

$sql = "SELECT `Id_firmante` FROM `firmantes` ORDER by Id_firmante DESC LIMIT 1;";
$ultimofirmante = $conn->query($sql);
$row = $ultimofirmante->fetch_assoc();
$idfirmante = $row['Id_firmante'];


$sql = "SELECT `Id_firmante` FROM `segundo_firmante` ORDER by `Id_firmante` DESC LIMIT 1;";
$ultimofirmante2 = $conn->query($sql);
$row = $ultimofirmante2->fetch_assoc();
$idfirmante2 = $row['Id_firmante'];

    $fechahoy = date('d-m-Y');
    $fecha = DateTime::createFromFormat('d-m-Y',$row["Fecha_autorizacion"]);
    $fecha->modify('+1 year');
    $proxima = $fecha->format('d-m-Y');
$sql = "INSERT INTO `renovacion_licores` ( `Constancia_renovacion`, `Numero_autorizacion`, `Fecha_renovacion`, `Banco`, `Fecha_pago`, `Forma16`, `Monto_cancelado`, `Proxima_renovacion`, `Primer_firmante`, `Segundo_firmante`) VALUES ('$numregistro', \'FC-00008\', '$fechahoy', '$banco', '$fechapago', '$forma16', '$monto', '$proxima', '$idfirmante', '$idfirmante2');";
$conn->query($sql);
header("Location:../menu/index.php");
?>