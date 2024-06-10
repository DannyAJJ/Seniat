<?php
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

$Cedula = $_POST['Cedula'];
$Contraseña = $_POST['Contraseña'];
$sql = "SELECT * FROM usuarios where Cedula_funcionario = '$Cedula' AND Contraseña = '$Contraseña'"; 

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