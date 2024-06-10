<?php
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

$fecha = $_POST['fecha'];
$razonsocial = $_POST['nombre'];

$sql = "INSERT INTO autorizacion_licores (Fecha_registro,Numero_autorizacion,Unidad,Razon_social,Numero_rif_empresa,Direccion,Autorizacion_ejerce,Clasificacion_indice_ejerce,Administrador_representante_legal,Nacionalidad,Cedula_representante,Numero_rif_representante,Observaciones,Firmante,Segunda_firma)
VALUES ('$fecha',200,1,$razonsocial)"; 

$result = $conn->query($sql);
//echo '<span>nou</span>';
if ($result->num_rows == 1) {
  header("Location:../menu/index.html");
  exit();

} else {
  echo '<span>nou</span>';
}


$conn->close();
?>