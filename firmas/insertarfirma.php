<?php 
$nombre = $_POST['nombre'];
$cargo = $_POST['cargo'];
$providencia = $_POST['providencia'];
$gaceta = $_POST['gaceta'];


// Parámetros de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expendiobd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "INSERT INTO `firmantes` (`Nombre_firmante`,`Segunda_linea`,`Tercera_linea`,`Cuarta_linea`) VALUES ('$nombre','$cargo','$providencia','$gaceta')";
$siglas = $conn->query($sql);
header("Location:../menu/index.php");




?>