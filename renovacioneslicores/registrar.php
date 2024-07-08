<?php $tipoliq = $_GET['tipo']; $licencia = $_GET['licencia'];
// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";
// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "";
?>